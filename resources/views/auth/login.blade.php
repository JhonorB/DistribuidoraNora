@extends('layouts.app')

@section('title', 'Iniciar Sesión - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<style>
    .formulario-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
    }
    .formulario {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px;
    }
    .formulario h2 {
        color: #d63384;
        text-align: center;
        margin-bottom: 20px;
    }
    .formulario input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
    }
    .formulario button {
        width: 100%;
        padding: 12px;
        background: #d63384;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
    }
    .formulario button:hover {
        background: #c2185b;
    }
    .formulario .cambiar {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }
    .formulario .cambiar a {
        color: #d63384;
        text-decoration: none;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="formulario-wrapper">
    <section class="formulario">
      <h2>Iniciar Sesión</h2>
      
      @if ($errors->any())
          <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px;">
              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif

      <form action="{{ route('auth.login.submit') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" autocomplete="username" required />
        <input type="password" name="password" placeholder="Contraseña" autocomplete="current-password" required />

        <button type="submit">Ingresar</button>

        <p class="cambiar">
          ¿No tienes cuenta?
          <a href="{{ route('auth.register') }}">Regístrate aquí</a>
        </p>
      </form>
    </section>
</div>
@endsection
