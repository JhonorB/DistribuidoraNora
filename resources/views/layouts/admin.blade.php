<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel Admin - @yield('title', 'Lencería Nora')</title>
    <link rel="shortcut icon" href="{{ asset('assets/icons/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #ffe6f0, #fff0f5);
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar styling */
        .sidebar {
            width: 260px;
            background-color: #d63384;
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 25px 20px;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            flex-grow: 1;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s;
        }

        .sidebar-menu li a i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu li a:hover, .sidebar-menu li.active a {
            color: white;
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 5px solid white;
            padding-left: 20px;
        }

        /* Main content wrapper */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            font-weight: 600;
        }

        .user-profile i {
            margin-right: 8px;
            font-size: 20px;
            color: #d63384;
        }

        .content-body {
            padding: 40px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .container-box {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        h1, h2 {
            color: #d63384;
            margin-top: 0;
        }

        /* Shared Admin Styles */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #c3e6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ffe6f0;
            color: #d63384;
            font-weight: bold;
        }

        tr:hover {
            background-color: #fff9fb;
        }

        .btn {
            background-color: #d63384;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #c2185b;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-success { background-color: #d4edda; color: #155724; }
        .badge-warning { background-color: #fff3cd; color: #856404; }
        .badge-danger { background-color: #f8d7da; color: #721c24; }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-brand">
            Nora Admin
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li class="{{ Str::contains(Route::currentRouteName(), 'admin.productos') ? 'active' : '' }}">
                <a href="{{ route('admin.productos') }}"><i class="fas fa-tags"></i> Productos</a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.pedidos' ? 'active' : '' }}">
                <a href="{{ route('admin.pedidos') }}"><i class="fas fa-receipt"></i> Pedidos</a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.contactos' ? 'active' : '' }}">
                <a href="{{ route('admin.contactos') }}"><i class="fas fa-envelope"></i> Mensajes</a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.reclamaciones' ? 'active' : '' }}">
                <a href="{{ route('admin.reclamaciones') }}"><i class="fas fa-book-open"></i> Reclamaciones</a>
            </li>
            <li style="margin-top: auto; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                <a href="{{ route('home') }}" target="_blank"><i class="fas fa-store"></i> Ir a la Tienda</a>
            </li>
        </ul>
    </div>

    <!-- Main Content Panel -->
    <div class="main-content">
        <div class="top-navbar">
            <div class="nav-title">
                <strong>@yield('nav_title', 'Administración')</strong>
            </div>
            <div class="user-profile">
                <i class="fas fa-user-circle"></i>
                {{ Auth::user()->name }}
                <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" style="margin-left: 20px; color: #666; text-decoration: none; font-size: 14px;"><i class="fas fa-sign-out-alt"></i> Salir</a>
            </div>
        </div>

        <div class="content-body">
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @yield('scripts')

</body>
</html>
