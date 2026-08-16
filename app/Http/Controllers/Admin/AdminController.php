<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\ContactMessage;
use App\Models\Claim;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $claimsCount = Claim::count();
        $messagesCount = ContactMessage::count();
        
        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'productsCount', 'ordersCount', 'claimsCount', 'messagesCount', 'latestOrders'
        ));
    }

    public function productos()
    {
        $products = Product::latest()->get();
        return view('admin.productos.index', compact('products'));
    }

    public function registroProducto()
    {
        return view('admin.productos.create');
    }

    public function guardarProducto(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price_unit' => 'required|numeric|min:0',
            'price_dozen' => 'required|numeric|min:0',
            'price_quarter' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image_file' => 'nullable|image|max:2048', // optional image upload
        ]);

        $imagePath = 'assets/img/default-product.png';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Store directly in public/assets/img/uploads for simplicity and immediate visibility
            $file->move(public_path('assets/img/uploads'), $filename);
            $imagePath = 'assets/img/uploads/' . $filename;
        }

        Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category' => $validated['category'],
            'price_unit' => $validated['price_unit'],
            'price_dozen' => $validated['price_dozen'],
            'price_quarter' => $validated['price_quarter'],
            'price' => $validated['price_unit'],
            'description' => $validated['description'],
            'images' => [$imagePath],
            'stock' => 100,
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto registrado exitosamente.');
    }

    public function pedidos()
    {
        $orders = Order::latest()->get();
        return view('admin.pedidos.index', compact('orders'));
    }

    public function detallePedido($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.pedidos.show', compact('order'));
    }

    public function actualizarPedido(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->input('status', 'pendiente')
        ]);

        return back()->with('success', 'Estado del pedido actualizado.');
    }

    public function contactos()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contactos', compact('messages'));
    }

    public function reclamaciones()
    {
        $claims = Claim::latest()->get();
        return view('admin.reclamaciones', compact('claims'));
    }
}
