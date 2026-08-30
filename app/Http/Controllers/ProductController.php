<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true);

        if ($request->has('cat') && !empty($request->cat)) {
            $query->where('category', strtolower($request->cat));
        }

        if ($request->has('buscar') && !empty($request->buscar)) {
            $searchTerm = '%' . strtolower($request->buscar) . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('description', 'like', $searchTerm);
            });
        }

        $products = $query->get();

        return view('pages.productos.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::where('is_active', true)->findOrFail($id);
        
        // Fetch some related products in same category
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('pages.productos.show', compact('product', 'relatedProducts'));
    }
}
