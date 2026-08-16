@extends('layouts.app')

@section('title', 'Libro de Reclamaciones - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/libro-reclamaciones.css') }}">
@endsection

@section('content')
  <main class="contenido-reclamo">
    <section class="reclamo-box">
      <h1><i class="fas fa-book-open"></i> Libro de Reclamaciones</h1>

      <p>Conforme a lo establecido en el Código de Protección y Defensa del Consumidor, ponemos a disposición de
        nuestros clientes el presente Libro de Reclamaciones Virtual.</p>

      @if ($errors->any())
          <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form class="formulario-reclamo" action="{{ route('page.reclamaciones.submit') }}" method="POST">
        @csrf
        <fieldset>
          <legend><i class="fas fa-user"></i> Datos del consumidor</legend>
          
          <label for="document_type">Tipo de Documento *</label>
          <select id="document_type" name="document_type" required>
            <option value="DNI">DNI (Doc. Nacional de Identidad)</option>
            <option value="CE">CE (Carnet de Extranjería)</option>
            <option value="RUC">RUC</option>
          </select>

          <label for="dni">Número de Documento *</label>
          <input type="text" id="dni" name="document_number" value="{{ old('document_number') }}" maxlength="12" required>

          <label for="nombre">Nombres y Apellidos *</label>
          <input type="text" id="nombre" name="fullname" value="{{ old('fullname') }}" required>

          <label for="correo">Correo electrónico *</label>
          <input type="email" id="correo" name="email" value="{{ old('email') }}" required>

          <label for="telefono">Teléfono *</label>
          <input type="tel" id="telefono" name="phone" value="{{ old('phone') }}" required>

          <label for="direccion">Dirección *</label>
          <input type="text" id="direccion" name="address" value="{{ old('address') }}" required>
        </fieldset>

        <fieldset>
          <legend><i class="fas fa-comment-dots"></i> Detalle del reclamo</legend>
          <label for="tipo">Tipo *</label>
          <select id="tipo" name="claim_type" required>
            <option value="">-- Seleccione --</option>
            <option value="reclamo" {{ old('claim_type') == 'reclamo' ? 'selected' : '' }}>Reclamo (desacuerdo con producto o servicio)</option>
            <option value="queja" {{ old('claim_type') == 'queja' ? 'selected' : '' }}>Queja (malestar o descontento)</option>
          </select>

          <label for="detalle">Detalle del reclamo o queja *</label>
          <textarea id="detalle" name="description" rows="5" placeholder="Explique detalladamente lo ocurrido..." required>{{ old('description') }}</textarea>
        </fieldset>

        <p class="nota-legal">
          * La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo
          para interponer una denuncia ante INDECOPI.<br>
          * El proveedor debe responder en un plazo no mayor de 15 días hábiles.
        </p>

        <button type="submit" class="btn-enviar">
          <i class="fas fa-paper-plane"></i> Enviar reclamo
        </button>
      </form>
    </section>
  </main>
@endsection
