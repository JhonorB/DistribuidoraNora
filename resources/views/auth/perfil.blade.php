@extends('layouts.app')

@section('title', 'Mi Perfil - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
<style>
    .contenedor-usuario {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
</style>
@endsection

@section('content')
<main class="contenedor-usuario">
    <h2>Mi Información Personal</h2>
    <div style="margin: 20px 0;">
        <p><strong>Nombres:</strong> {{ $user->name }}</p>
        <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
        <p><strong>Tipo de cuenta:</strong> {{ $user->email === 'admin@lencerianora.com' ? 'Administrador' : 'Cliente' }}</p>
    </div>

    @if($user->email === 'admin@lencerianora.com')
        <div style="background-color: #ffe6f0; border: 1px solid #ffc0cb; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <h3>Panel de Control</h3>
            <p>Tienes privilegios de administrador para gestionar productos, pedidos, mensajes y reclamaciones.</p>
            <a href="{{ route('admin.dashboard') }}" class="btn">Ir al Panel de Administración</a>
        </div>
    @endif

    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn" style="background-color: #6c757d; width: 100%;">Cerrar Sesión</button>
    </form>
</main>
@endsection
