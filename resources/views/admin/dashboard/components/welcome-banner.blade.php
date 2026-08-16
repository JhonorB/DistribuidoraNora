{{-- resources/views/admin/dashboard/components/welcome-banner.blade.php --}}
<div class="dash-banner">
    <div class="dash-banner-info">
        <div class="dash-badge-live">
            <span class="dash-pulse-dot"></span>
            <span>Sistema Operativo en Tiempo Real</span>
        </div>
        <h1 class="dash-banner-title">
            ¡Hola, {{ Auth::user()->name ?? 'Administrador' }}! 👋
        </h1>
        <p class="dash-banner-subtitle">
            Bienvenido al panel de control de <strong>Lencería Nora & Distribuidora Marbellín</strong>. Aquí tienes el resumen comercial y operativo de hoy, {{ date('d \d\e F, Y') }}.
        </p>
    </div>

    <div class="dash-banner-actions">
        <a href="{{ route('admin.productos.create') }}" class="dash-btn-light">
            <i class="fas fa-plus-circle"></i>
            <span>Nuevo Producto</span>
        </a>
        <a href="{{ route('admin.pedidos') }}" class="dash-btn-glass">
            <i class="fas fa-receipt"></i>
            <span>Ver Pedidos</span>
        </a>
    </div>
</div>
