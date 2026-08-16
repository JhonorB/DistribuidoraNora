<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function checkout()
    {
        return view('pages.cart.checkout');
    }

    public function pago(Request $request)
    {
        // Store contact details from checkout into session or pass forward
        $checkoutData = $request->only([
            'nombre', 'apellido', 'correo', 'celular',
            'direccion', 'departamento', 'provincia', 'distrito', 'costo_envio'
        ]);

        session(['checkout_data' => $checkoutData]);

        return view('pages.cart.pago', compact('checkoutData'));
    }

    public function procesarOrder(Request $request)
    {
        $checkoutData = session('checkout_data', []);
        
        if (empty($checkoutData)) {
            return redirect()->route('products.index')->with('error', 'El carrito está vacío o faltan datos de facturación.');
        }

        // We expect items as a JSON string from client-side localstorage submitted via form
        $itemsJson = $request->input('cart_items', '[]');
        $items = json_decode($itemsJson, true);

        if (empty($items)) {
            return redirect()->route('products.index')->with('error', 'No hay productos en tu orden.');
        }

        $paymentMethod = $request->input('payment_method', 'Transferencia');

        DB::beginTransaction();
        try {
            // Calculate totals
            $subtotal = 0;
            foreach ($items as $item) {
                $subtotal += $item['precio'] * $item['cantidad'];
            }
            $shippingCost = floatval($checkoutData['costo_envio'] ?? 0);
            $total = $subtotal + $shippingCost;

            // Create Order
            $order = Order::create([
                'customer_name' => $checkoutData['nombre'] . ' ' . $checkoutData['apellido'],
                'customer_email' => $checkoutData['correo'],
                'customer_phone' => $checkoutData['celular'],
                'shipping_address' => $checkoutData['direccion'],
                'department' => $checkoutData['departamento'],
                'province' => $checkoutData['provincia'],
                'district' => $checkoutData['distrito'],
                'shipping_cost' => $shippingCost,
                'subtotal' => $subtotal,
                'total' => $total,
                'payment_method' => $paymentMethod,
                'status' => 'pendiente',
            ]);

            // Create OrderItems
            foreach ($items as $item) {
                // Find or default product
                $productId = $item['id'];
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['cantidad'],
                    'price' => $item['precio'],
                    'price_type' => $item['tipoPrecio'] ?? 'unidad', // unidad, docena, cuarto
                ]);
            }

            DB::commit();

            // Clear session checkout data
            session()->forget('checkout_data');

            // Pass order ID to frontend so it can clear localStorage
            return redirect()->route('cart.resumen', $order->id)->with('clear_cart', true);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Hubo un error al procesar tu pedido: ' . $e->getMessage());
        }
    }

    public function resumen($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('pages.cart.resumen', compact('order'));
    }
}
