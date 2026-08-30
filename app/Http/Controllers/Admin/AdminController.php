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

    public function getProductApi($id)
    {
        $product = Product::findOrFail($id);
        
        // Formatear sizes por defecto si es nulo
        $defaultSizes = ['XS' => false, 'S' => false, 'M' => false, 'L' => false, 'XL' => false, 'XXL' => false];
        $sizes = $product->sizes ?: $defaultSizes;
        $product->sizes = array_merge($defaultSizes, $sizes);
        
        return response()->json($product);
    }

    public function updateProductApi(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price_unit' => 'required|numeric|min:0',
            'price_dozen' => 'required|numeric|min:0',
            'price_quarter' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
            'sizes' => 'nullable|array',
        ]);

        $product->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'price_unit' => $validated['price_unit'],
            'price_dozen' => $validated['price_dozen'],
            'price_quarter' => $validated['price_quarter'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
            'is_active' => $validated['is_active'],
            'sizes' => $validated['sizes'] ?? $product->sizes,
        ]);

        // Manejo simple de imagen si llega como archivo (para el modal)
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('products', 'public');
            $images = [$path];
            $product->images = $images;
            $product->save();
        }

        return response()->json([
            'success' => true, 
            'message' => 'Producto actualizado correctamente.',
            'product' => $product
        ]);
    }

    public function deleteProductApi($id)
    {
        $product = Product::findOrFail($id);
        
        // En lugar de borrar duro, podemos hacer borrado lógico o real.
        // Dado que puede haber pedidos, usaremos borrado lógico desactivando:
        $product->update(['is_active' => false]);
        
        return response()->json(['success' => true, 'message' => 'Producto desactivado (borrado lógico) por historial de pedidos.']);
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

    public function usuarios()
    {
        $users = \App\Models\User::latest()->get();
        return view('admin.usuarios', compact('users'));
    }

    public function storeUsuario(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,trabajador,cliente',
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true,
        ]);

        return back()->with('success', 'Usuario creado correctamente.');
    }

    public function updateUsuario(\Illuminate\Http\Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        if ($request->action === 'toggle_status') {
            $user->is_active = !$user->is_active;
            $user->save();
            $estado = $user->is_active ? 'habilitada' : 'suspendida';
            return back()->with('success', "La cuenta de {$user->name} ha sido $estado.");
        }
        
        if ($request->action === 'change_role') {
            $request->validate(['role' => 'required|in:admin,trabajador,cliente']);
            $user->role = $request->role;
            $user->save();
            return back()->with('success', "Rol de {$user->name} actualizado a {$user->role}.");
        }

        if ($request->action === 'delete') {
            $user->delete();
            return back()->with('success', 'Usuario eliminado del sistema.');
        }

        return back();
    }
}
