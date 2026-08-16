@extends('layouts.app')

@section('title', 'Contáctanos - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
@endsection

@section('content')
  <main>
    <section class="formulario">
      <h2>CONTÁCTANOS</h2>
      <p>Para nosotros es importante escucharte, por favor déjanos tu duda, consulta o sugerencia.</p>
      
      @if ($errors->any())
          <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('page.contacto.submit') }}" method="POST">
        @csrf
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="name" value="{{ old('name') }}" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="email" value="{{ old('email') }}" required>

        <label for="telefono">Número de teléfono:</label>
        <input type="tel" id="telefono" name="phone" value="{{ old('phone') }}" required pattern="[0-9]{9}">

        <label for="mensaje">Mensaje o Consulta:</label>
        <textarea id="mensaje" name="message" rows="5" placeholder="Cuéntanos más..." required>{{ old('message') }}</textarea>

        <button type="submit">Enviar solicitud</button>
      </form>
    </section>
  </main>
@endsection
