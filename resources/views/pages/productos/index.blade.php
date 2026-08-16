@extends('layouts.app')

@section('title', 'Productos - Distribuidora De Marbellín - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
<style>
    .titulo-categoria {
        text-align: center;
        margin: 30px 0 10px 0;
        font-family: 'Playfair Display', serif;
        color: #d63384;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
</style>
@endsection

@section('content')
  <h2 class="titulo-categoria">
    @if(request('cat'))
        Categoría: {{ request('cat') }}
    @elseif(request('buscar'))
        Búsqueda: "{{ request('buscar') }}"
    @else
        Todos los Productos
    @endif
  </h2>

  <!-- Main Section -->
  <main id="lista-productos" class="grid-productos" style="padding-top: 10px;">
    @if($products->isEmpty())
        <div style="grid-column: 1 / -1; text-align: center; font-weight: bold; padding: 40px;">
            No se encontraron productos para esta selección.
        </div>
    @else
        @foreach($products as $product)
            @php
                $images = $product->images;
                $mainImage = count($images) > 0 ? $images[0] : 'assets/img/default-product.png';
                $colorsCount = ($product->id % 3) + 1;
                $isDiscount = ($product->id % 2 == 0);
            @endphp
            <a class="producto" href="{{ route('products.show', $product->id) }}">
                <div class="product-image-wrapper">
                    <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}">
                    <span class="product-heart-btn" onclick="event.preventDefault();"><i class="far fa-heart"></i></span>
                    @if($isDiscount)
                        <span class="product-badge">-15%</span>
                    @else
                        <span class="product-badge new">NUEVO</span>
                    @endif
                </div>
                <div class="product-info-wrapper">
                    <span class="product-colors-info">{{ $colorsCount }} {{ $colorsCount > 1 ? 'COLORES' : 'COLOR' }}</span>
                    <h3 class="product-title">{{ $product->name }}</h3>
                    
                    <div class="product-price-row">
                        <span class="product-price-sale">S/{{ number_format($product->price_unit, 2) }}</span>
                        @if($isDiscount)
                            <span class="product-price-original">S/{{ number_format($product->price_unit * 1.15, 2) }}</span>
                        @endif
                    </div>
                    
                    <div class="product-card-icons">
                        <span class="card-icon-item"><i class="fas fa-truck"></i> Envío rápido</span>
                        <span class="card-icon-item"><i class="fas fa-credit-card"></i> Pago Seguro</span>
                    </div>
                    
                    <div class="product-card-coupon">
                        20% OFF llevando docena
                    </div>
                </div>
            </a>
        @endforeach
    @endif
  </main>
@endsection
