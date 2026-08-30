@extends('layouts.app')

@section('title', $product->name . ' - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/producto-detalle.css') }}">
@endsection

@section('content')
  <div id="detalle-producto"></div>
@endsection

@section('scripts')
<script>
    window.currentProduct = {
        id: {{ $product->id }},
        nombre: "{{ $product->name }}",
        descripcion: "{!! addslashes(str_replace(["\r", "\n"], ' ', $product->description)) !!}",
        precioUnidad: {{ $product->price_unit }},
        precioCuarto: {{ $product->price_quarter }},
        precioDocena: {{ $product->price_dozen }},
        imagenes: {!! json_encode(array_map(function($img) { return asset($img); }, is_array($product->images) ? $product->images : (json_decode($product->images, true) ?: []))) !!},
        sizes: {!! json_encode($product->sizes ?: ['XS'=>true,'S'=>true,'M'=>true,'L'=>true,'XL'=>true,'XXL'=>true]) !!}
    };
</script>
<script type="module" src="{{ asset('js/cargar-producto-detalle.js') }}"></script>
@endsection
