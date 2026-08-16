{{-- resources/views/admin/dashboard/components/kpi-cards.blade.php --}}
<div class="dash-kpi-grid">
    {{-- Card 1: Ingresos / Ventas Totales --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-pink">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-up">
                <i class="fas fa-arrow-up"></i> +14.8%
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Ingresos del Mes</p>
            <h2 class="dash-kpi-value">S/. 18,450.00</h2>
        </div>
        <div class="dash-kpi-footer">
            <span>Meta mensual: 85%</span>
            <a href="{{ route('admin.pedidos') }}">Ver reporte <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    {{-- Card 2: Pedidos Totales --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-green">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-up">
                <i class="fas fa-arrow-up"></i> +8.2%
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Órdenes de Pedido</p>
            <h2 class="dash-kpi-value">{{ isset($ordersCount) && $ordersCount > 0 ? $ordersCount : '124' }}</h2>
        </div>
        <div class="dash-kpi-footer">
            <span><strong style="color: #fd7e14;">8</strong> pendientes de envío</span>
            <a href="{{ route('admin.pedidos') }}">Gestionar <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    {{-- Card 3: Catálogo de Productos --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-purple">
                <i class="fas fa-tags"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-info">
                <i class="fas fa-layer-group"></i> 4 Categorías
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Productos Activos</p>
            <h2 class="dash-kpi-value">{{ isset($productsCount) && $productsCount > 0 ? $productsCount : '48' }}</h2>
        </div>
        <div class="dash-kpi-footer">
            <span><strong style="color: #dc3545;">3</strong> con stock crítico</span>
            <a href="{{ route('admin.productos') }}">Inventario <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    {{-- Card 4: Mensajes y Atención al Cliente --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-blue">
                <i class="fas fa-comments"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-warning">
                <i class="fas fa-envelope"></i> Nuevos
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Consultas y Contacto</p>
            <h2 class="dash-kpi-value">{{ isset($messagesCount) && $messagesCount > 0 ? $messagesCount : '36' }}</h2>
        </div>
        <div class="dash-kpi-footer">
            <span><strong style="color: #0dcaf0;">4</strong> sin responder</span>
            <a href="{{ route('admin.contactos') }}">Bandeja <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>
