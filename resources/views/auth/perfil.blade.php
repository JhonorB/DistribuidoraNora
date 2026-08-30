@extends('layouts.app')

@section('title', 'Mi Perfil - Lencería Nora')

@section('styles')
<style>
    /* Reset local y variables */
    :root {
        --guinda: #87505D;
        --borgona: #673B46;
        --rosa-suave: #F8DCE6;
        --crema: #FFF9FA;
        --texto-oscuro: #352A2D;
        --blanco: #FFFFFF;
        --gris-texto: #6c757d;
        --borde-suave: #eaeaea;
        --transicion: 0.3s ease;
    }

    body {
        background-color: var(--crema);
    }

    .perfil-container {
        width: 100%;
        max-width: clamp(1050px, 90vw, 1150px);
        margin: clamp(30px, 5vw, 60px) auto;
        padding: 0 clamp(15px, 3vw, 30px);
        box-sizing: border-box;
    }

    .perfil-card {
        background: var(--blanco);
        border-radius: 24px;
        box-shadow: 0 12px 35px rgba(103, 59, 70, 0.08);
        border: 1px solid rgba(135, 80, 93, 0.08);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    /* Encabezado con degradado */
    .perfil-header-bg {
        background: linear-gradient(135deg, var(--borgona) 0%, var(--guinda) 50%, var(--rosa-suave) 100%);
        height: 140px;
        width: 100%;
        position: relative;
    }

    /* Layout principal de 2 columnas */
    .perfil-body {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 40px;
        padding: 0 40px 40px;
        margin-top: -60px; /* Sube el avatar sobre el degradado */
    }

    /* Columna Izquierda: Avatar e Identidad */
    .perfil-col-left {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .avatar-wrapper {
        position: relative;
        z-index: 2;
    }

    .avatar-circle {
        width: clamp(90px, 12vw, 110px);
        height: clamp(90px, 12vw, 110px);
        border-radius: 50%;
        background-color: var(--blanco);
        border: 4px solid var(--blanco);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        font-weight: bold;
        color: var(--guinda);
        text-transform: uppercase;
        margin-bottom: 20px;
        position: relative;
    }

    .avatar-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        opacity: 0;
        transition: opacity 0.2s ease;
        border-radius: 50%;
    }

    .avatar-circle:hover .avatar-overlay {
        opacity: 1;
    }

    .perfil-nombre {
        font-size: 24px;
        color: var(--texto-oscuro);
        margin: 0 0 5px 0;
        font-weight: 700;
    }

    .perfil-correo {
        font-size: 15px;
        color: var(--gris-texto);
        margin: 0 0 15px 0;
        word-break: break-all;
    }

    .badges-container {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .badge-role {
        background-color: var(--rosa-suave);
        color: var(--borgona);
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .badge-status {
        background-color: #e8f5e9;
        color: #2e7d32;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .badge-status::before {
        content: '';
        display: block;
        width: 8px;
        height: 8px;
        background-color: #4caf50;
        border-radius: 50%;
    }

    /* Columna Derecha: Información y Acciones */
    .perfil-col-right {
        display: flex;
        flex-direction: column;
        gap: 30px;
        padding-top: 80px; /* Alineación visual con la izquierda */
    }

    .seccion-titulo {
        font-size: 18px;
        color: var(--borgona);
        margin: 0 0 20px 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Tarjetas de Información Personal */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 15px;
    }

    .info-card {
        background: var(--crema);
        border: 1px solid var(--rosa-suave);
        border-radius: 16px;
        padding: 18px;
        display: flex;
        align-items: flex-start;
        gap: 15px;
        transition: var(--transicion);
    }

    .info-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(135, 80, 93, 0.05);
    }

    .info-icon {
        background: var(--blanco);
        color: var(--guinda);
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    }

    .info-content {
        flex: 1;
        min-width: 0;
    }

    .info-label {
        font-size: 12px;
        color: var(--gris-texto);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        margin-bottom: 4px;
        display: block;
    }

    .info-value {
        font-size: 15px;
        color: var(--texto-oscuro);
        font-weight: 500;
        margin: 0;
        overflow-wrap: anywhere;
    }

    /* Panel Administrativo Bloque */
    .admin-panel-card {
        background: linear-gradient(to right, #fff5f8, var(--blanco));
        border: 1px solid var(--rosa-suave);
        border-left: 4px solid var(--guinda);
        border-radius: 16px;
        padding: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .admin-info {
        flex: 1;
    }

    .admin-info h4 {
        margin: 0 0 8px 0;
        color: var(--borgona);
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .admin-info p {
        margin: 0;
        color: var(--gris-texto);
        font-size: 14px;
        line-height: 1.5;
    }

    .btn-admin {
        background-color: var(--guinda);
        color: var(--blanco);
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: var(--transicion);
        white-space: nowrap;
    }

    .btn-admin:hover {
        background-color: var(--borgona);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(103, 59, 70, 0.2);
    }
    
    .btn-admin:active {
        transform: translateY(0);
    }

    /* Botón Cerrar Sesión */
    .logout-container {
        margin-top: 10px;
        padding-top: 30px;
        border-top: 1px solid var(--borde-suave);
    }

    .btn-logout {
        background-color: var(--blanco);
        color: #dc3545;
        border: 1px solid #ffcdd2;
        padding: 0 24px;
        height: 46px;
        border-radius: 23px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: var(--transicion);
        width: auto;
    }

    .btn-logout:hover {
        background-color: #fff5f5;
        border-color: #dc3545;
        box-shadow: 0 4px 10px rgba(220, 53, 69, 0.1);
    }

    /* Responsividad */
    @media (max-width: 992px) {
        .perfil-body {
            grid-template-columns: 280px 1fr;
            gap: 30px;
            padding: 0 30px 30px;
        }
        .admin-panel-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .btn-admin {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .perfil-body {
            grid-template-columns: 1fr;
            padding: 0 20px 30px;
            gap: 20px;
            margin-top: -50px;
        }
        .perfil-col-right {
            padding-top: 10px;
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .btn-logout {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<main class="perfil-container">
    <div class="perfil-card">
        <!-- Encabezado Degradado -->
        <div class="perfil-header-bg"></div>

        <!-- Contenido 2 Columnas -->
        <div class="perfil-body">
            
            <!-- Columna Izquierda: Identidad -->
            <div class="perfil-col-left">
                <div class="avatar-wrapper">
                    <form action="{{ route('auth.profile.photo') }}" method="POST" enctype="multipart/form-data" id="form-avatar">
                        @csrf
                        <label for="input-avatar" class="avatar-circle" style="cursor: pointer; position: relative; overflow: hidden; display: block;">
                            @if($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="avatar-overlay">
                                <i class="fas fa-camera"></i>
                            </div>
                        </label>
                        <input type="file" id="input-avatar" name="profile_photo" accept="image/jpeg, image/png, image/jpg" style="display: none;" onchange="document.getElementById('form-avatar').submit();">
                    </form>
                </div>
                
                <h1 class="perfil-nombre">{{ $user->name }}</h1>
                <p class="perfil-correo">{{ $user->email }}</p>
                
                <div class="badges-container">
                    <span class="badge-role">{{ $user->role ?? 'Cliente' }}</span>
                    @if($user->is_active ?? true)
                        <span class="badge-status">Cuenta Activa</span>
                    @endif
                </div>
            </div>

            <!-- Columna Derecha: Información y Acciones -->
            <div class="perfil-col-right">
                
                <!-- Tarjetas de Info -->
                <div>
                    <h2 class="seccion-titulo"><i class="far fa-id-card"></i> Información Personal</h2>
                    <div class="info-grid">
                        <div class="info-card">
                            <div class="info-icon"><i class="far fa-user"></i></div>
                            <div class="info-content">
                                <span class="info-label">Nombres</span>
                                <p class="info-value">{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="info-icon"><i class="far fa-envelope"></i></div>
                            <div class="info-content">
                                <span class="info-label">Correo Electrónico</span>
                                <p class="info-value">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="info-icon"><i class="fas fa-shield-alt"></i></div>
                            <div class="info-content">
                                <span class="info-label">Tipo de Cuenta</span>
                                <p class="info-value">{{ ucfirst($user->role ?? 'Cliente') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel Administrativo -->
                @if(in_array($user->role ?? '', ['admin', 'trabajador']) || $user->email === 'admin@lencerianora.com')
                <div class="admin-panel-card">
                    <div class="admin-info">
                        <h4><i class="fas fa-cogs"></i> Panel de Control</h4>
                        <p>Tienes acceso administrativo para gestionar el catálogo, pedidos y configuraciones de la tienda.</p>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="btn-admin">
                        Ir a Administración <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                @endif

                <!-- Cerrar Sesión -->
                <div class="logout-container">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
