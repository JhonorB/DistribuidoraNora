{{-- resources/views/admin/dashboard/components/quick-actions.blade.php --}}
<div class="dash-side-card">
    <div class="dash-card-header" style="margin-bottom: 8px;">
        <div class="dash-card-header-left">
            <h3>Acciones Rápidas</h3>
            <p>Accesos directos de gestión</p>
        </div>
    </div>

    <div class="dash-quick-grid">
        <a href="{{ route('admin.productos.create') }}" class="dash-quick-tile">
            <i class="fas fa-plus-circle"></i>
            <span>Nuevo Producto</span>
        </a>
        <a href="{{ route('admin.pedidos') }}" class="dash-quick-tile">
            <i class="fas fa-truck-loading"></i>
            <span>Despachar Pedidos</span>
        </a>
        <a href="{{ route('admin.contactos') }}" class="dash-quick-tile">
            <i class="fas fa-envelope-open-text"></i>
            <span>Mensajes Web</span>
        </a>
        <a href="{{ route('admin.reclamaciones') }}" class="dash-quick-tile">
            <i class="fas fa-book-open"></i>
            <span>Reclamaciones</span>
        </a>
    </div>
</div>
