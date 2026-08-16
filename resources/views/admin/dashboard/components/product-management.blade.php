{{-- resources/views/admin/dashboard/components/product-management.blade.php --}}

{{-- 1. KPIs de Control de Inventario --}}
<div class="dash-kpi-grid" style="margin-bottom: 4px;">
    {{-- Total de Productos --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-purple">
                <i class="fas fa-boxes-stacked"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-info">
                <i class="fas fa-layer-group"></i> Catálogo
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Total de Productos</p>
            <h2 class="dash-kpi-value" id="kpiTotalProducts">48</h2>
        </div>
        <div class="dash-kpi-footer">
            <span>En 4 categorías activas</span>
            <a href="javascript:void(0)" onclick="filterByStock('all')">Ver todos <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    {{-- Productos Disponibles --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-green">
                <i class="fas fa-check-double"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-up">
                <i class="fas fa-shield-halved"></i> Stock Óptimo
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Disponibles (> 10 uds)</p>
            <h2 class="dash-kpi-value" id="kpiAvailableProducts" style="color: #28a745;">39</h2>
        </div>
        <div class="dash-kpi-footer">
            <span>81.2% del inventario</span>
            <a href="javascript:void(0)" onclick="filterByStock('good')">Filtrar <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    {{-- Productos con Stock Bajo --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-orange">
                <i class="fas fa-triangle-exclamation"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-warning">
                <i class="fas fa-arrow-down"></i> Reposición
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Stock Bajo (1-10 uds)</p>
            <h2 class="dash-kpi-value" id="kpiLowStockProducts" style="color: #fd7e14;">6</h2>
        </div>
        <div class="dash-kpi-footer">
            <span>Requieren abastecimiento</span>
            <a href="javascript:void(0)" onclick="filterByStock('low')">Revisar <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    {{-- Productos Agotados --}}
    <div class="dash-kpi-card">
        <div class="dash-kpi-top">
            <div class="dash-kpi-icon dash-icon-red">
                <i class="fas fa-ban"></i>
            </div>
            <div class="dash-kpi-trend dash-trend-danger">
                <i class="fas fa-circle-xmark"></i> Sin Stock
            </div>
        </div>
        <div>
            <p class="dash-kpi-label">Agotados (0 uds)</p>
            <h2 class="dash-kpi-value" id="kpiOutStockProducts" style="color: #dc3545;">3</h2>
        </div>
        <div class="dash-kpi-footer">
            <span>Ocultos o no disponibles</span>
            <a href="javascript:void(0)" onclick="filterByStock('zero')">Verificar <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>

{{-- 2. Barra de Búsqueda y Filtros --}}
<div class="dash-filter-bar">
    <div class="dash-filter-left">
        {{-- Buscador --}}
        <div class="dash-search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="productSearchInput" class="dash-search-input" placeholder="Buscar por nombre, SKU o descripción..." oninput="applyProductFilters()">
        </div>

        {{-- Filtro de Categoría --}}
        <select id="filterCategory" class="dash-select-filter" onchange="applyProductFilters()">
            <option value="all">📁 Todas las Categorías</option>
            <option value="cachetero">Cachetero</option>
            <option value="bikini">Bikini</option>
            <option value="semihilo">Semi Hilo</option>
            <option value="topsito">Topsito</option>
            <option value="conjunto">Conjunto</option>
        </select>

        {{-- Filtro de Nivel de Stock --}}
        <select id="filterStockStatus" class="dash-select-filter" onchange="applyProductFilters()">
            <option value="all">📊 Todo el Inventario</option>
            <option value="good">🟢 Disponible (> 10)</option>
            <option value="low">🟠 Stock Bajo (1-10)</option>
            <option value="zero">🔴 Agotados (0)</option>
        </select>

        {{-- Filtro de Estado Activo/Inactivo --}}
        <select id="filterState" class="dash-select-filter" onchange="applyProductFilters()">
            <option value="all">⚡ Todos los Estados</option>
            <option value="active">Activos en Tienda</option>
            <option value="inactive">Desactivados</option>
        </select>
    </div>

    {{-- Botón Agregar Producto --}}
    <button type="button" class="dash-btn-primary" onclick="openProductModal('create')">
        <i class="fas fa-plus-circle"></i>
        <span>Agregar Producto</span>
    </button>
</div>

{{-- 3. Tabla Interactiva de Gestión de Productos --}}
<div class="dash-table-card">
    <div class="dash-card-header" style="margin-bottom: 12px;">
        <div class="dash-card-header-left">
            <h3>Catálogo de Productos para la Tienda</h3>
            <p>Control visual de precios, existencias y visibilidad en la tienda online</p>
        </div>
        <div style="font-size: 13px; color: var(--dash-gray-500); font-weight: 600;">
            Mostrando <span id="visibleProductsCount" style="color: var(--dash-primary); font-weight: 800;">8</span> productos
        </div>
    </div>

    <div class="dash-table-responsive">
        <table class="dash-modern-table" id="productsTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Precios (S/.)</th>
                    <th>Nivel de Stock</th>
                    <th style="text-align: center;">Visible en Tienda</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                {{-- Los registros se renderizan interactivamente mediante JS con datos MOCK --}}
            </tbody>
        </table>

        {{-- Estado Vacío (Empty State) cuando no hay coincidencias --}}
        <div id="productEmptyState" style="display: none; text-align: center; padding: 45px 20px;">
            <div style="width: 64px; height: 64px; background: var(--dash-primary-light); color: var(--dash-primary); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 15px;">
                <i class="fas fa-search"></i>
            </div>
            <h4 style="margin: 0 0 6px 0; color: var(--dash-dark); font-size: 17px;">No se encontraron productos</h4>
            <p style="color: var(--dash-gray-500); font-size: 13.5px; margin: 0 0 16px 0;">Prueba modificando los términos de búsqueda o los filtros aplicados.</p>
            <button type="button" class="dash-action-btn" onclick="resetProductFilters()">
                <i class="fas fa-rotate-left"></i> Limpiar Filtros
            </button>
        </div>
    </div>
</div>

{{-- Toast Notification --}}
<div id="dashToast" class="dash-toast">
    <i class="fas fa-check-circle" id="toastIcon"></i>
    <span id="toastMessage">Operación realizada con éxito</span>
</div>
