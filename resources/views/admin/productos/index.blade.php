@extends('layouts.admin')

@section('title', 'Gestionar Productos')
@section('nav_title', 'Administrar Productos')

@section('content')
<div class="container-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Catálogo de Lencería</h2>
        <a href="{{ route('admin.productos.create') }}" class="btn"><i class="fas fa-plus"></i> Registrar Nuevo Producto</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio Unit.</th>
                <th>Precio 1/4</th>
                <th>Precio Docena</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                @php
                    $images = $product->images;
                    $mainImage = count($images) > 0 ? $images[0] : 'assets/img/default-product.png';
                @endphp
                <tr>
                    <td>
                        <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 2px solid #ffc0cb;">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ ucfirst($product->category) }}</td>
                    <td>S/. {{ number_format($product->price_unit, 2) }}</td>
                    <td>S/. {{ number_format($product->price_quarter, 2) }}</td>
                    <td>S/. {{ number_format($product->price_dozen, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" target="_blank" class="btn btn-secondary"><i class="fas fa-eye"></i> Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
