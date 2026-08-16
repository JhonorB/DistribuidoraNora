@extends('layouts.app')

@section('title', 'Sé una Marbelover - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/distribuidora.css') }}">
@endsection

@section('content')
  <main>
    <section class="formulario">
      <h2>¿Quieres ser Distribuidor de Marbellín?</h2>
      <p>Déjanos tus datos, nosotros nos encargaremos de contactarte.</p>
      
      @if(session('success'))
          <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
              {{ session('success') }}
          </div>
      @endif

      <form action="{{ route('page.contacto.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="message" value="Solicitud de Distribuidor / Marbelover.">
        
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="name" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="email" required>

        <label for="telefono">Número de teléfono:</label>
        <input type="tel" id="telefono" name="phone" required pattern="[0-9]{9}">

        <label for="departamento">Departamento:</label>
        <select id="departamento" name="departamento" required>
            <option value="">Seleccione Departamento</option>
        </select>

        <label for="provincia">Provincia:</label>
        <select id="provincia" name="provincia" required>
            <option value="">Seleccione Provincia</option>
        </select>

        <label for="distrito">Distrito:</label>
        <select id="distrito" name="distrito" required>
            <option value="">Seleccione Distrito</option>
        </select>

        <label for="negocio">¿Tiene un negocio actualmente?</label>
        <select id="negocio" name="negocio" required>
          <option value="">Seleccione una opción</option>
          <option value="si">Sí</option>
          <option value="no">No</option>
        </select>

        <label for="comentarios">Mensaje o comentarios adicionales:</label>
        <textarea id="comentarios" name="comentarios" rows="5" placeholder="Cuéntanos más sobre ti..."></textarea>

        <button type="submit">Enviar solicitud</button>
      </form>
    </section>
  </main>
@endsection

@section('scripts')
<script src="{{ asset('js/ubicacion-peru.js') }}"></script>
<script src="{{ asset('js/cargar-ubicacion.js') }}"></script>
@endsection
