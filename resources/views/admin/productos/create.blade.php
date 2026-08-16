@extends('layouts.admin')

@section('title', 'Registrar Producto')
@section('nav_title', 'Agregar Producto a Catálogo')

@section('content')
<div class="container-box" style="max-width: 700px; margin: 0 auto;">
    <h2>Formulario de Registro</h2>
    <p>Agrega un nuevo modelo de lencería al catálogo de venta digital.</p>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name" style="font-weight: bold; display: block; margin-top: 15px;">Nombre del Producto *</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">

        <label for="category" style="font-weight: bold; display: block; margin-top: 15px;">Categoría *</label>
        <select id="category" name="category" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">
            <option value="">-- Selecciona --</option>
            <option value="cachetero" {{ old('category') == 'cachetero' ? 'selected' : '' }}>Cachetero</option>
            <option value="bikini" {{ old('category') == 'bikini' ? 'selected' : '' }}>Bikini</option>
            <option value="semihilo" {{ old('category') == 'semihilo' ? 'selected' : '' }}>Semi Hilo</option>
            <option value="topsito" {{ old('category') == 'topsito' ? 'selected' : '' }}>Topsito</option>
        </select>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-top: 15px;">
            <div>
                <label for="price_unit" style="font-weight: bold;">Precio Unitario *</label>
                <input type="number" step="0.01" id="price_unit" name="price_unit" value="{{ old('price_unit') }}" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">
            </div>
            <div>
                <label for="price_quarter" style="font-weight: bold;">Precio 1/4 Docena *</label>
                <input type="number" step="0.01" id="price_quarter" name="price_quarter" value="{{ old('price_quarter') }}" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">
            </div>
            <div>
                <label for="price_dozen" style="font-weight: bold;">Precio por Docena *</label>
                <input type="number" step="0.01" id="price_dozen" name="price_dozen" value="{{ old('price_dozen') }}" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">
            </div>
        </div>

        <label for="description" style="font-weight: bold; display: block; margin-top: 15px;">Descripción *</label>
        <textarea id="description" name="description" rows="4" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box; resize: vertical;">{{ old('description') }}</textarea>

        <label for="image_file" style="font-weight: bold; display: block; margin-top: 15px;">Imagen del Producto</label>
        <input type="file" id="image_file" name="image_file" accept="image/*" style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;">

        <div style="display: flex; gap: 15px; margin-top: 25px;">
            <button type="submit" class="btn" style="flex-grow: 1;">Guardar Producto</button>
            <a href="{{ route('admin.productos') }}" class="btn btn-secondary" style="text-align: center; padding-top: 10px;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
