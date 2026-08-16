@extends('layouts.admin')

@section('title', 'Panel de Control - Dashboard')
@section('nav_title', 'Dashboard General')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endsection

@section('content')
<div class="dashboard-wrapper">
    {{-- Selector de Pestañas del Panel --}}
    <div class="dash-tabs-nav">
        <button type="button" class="dash-tab-btn active" id="tabBtnOverview" onclick="switchDashboardTab('overview', this)">
            <i class="fas fa-chart-pie"></i>
            <span>Vista General & Métricas</span>
        </button>
        <button type="button" class="dash-tab-btn" id="tabBtnInventory" onclick="switchDashboardTab('inventory', this)">
            <i class="fas fa-boxes-stacked"></i>
            <span>Gestión de Productos e Inventario</span>
            <span class="dash-tab-badge">Módulo</span>
        </button>
    </div>

    {{-- PESTAÑA 1: VISTA GENERAL --}}
    <div id="pane-overview" class="dash-tab-pane active">
        {{-- 1. Hero / Welcome Banner --}}
        @include('admin.dashboard.components.welcome-banner')

        {{-- 2. Resumen de KPIs Principales --}}
        @include('admin.dashboard.components.kpi-cards')

        {{-- 3. Visualización de Datos / Gráficos --}}
        @include('admin.dashboard.components.charts-section')

        {{-- 4. Grilla de Contenido: Pedidos Recientes + Barra Lateral Operativa --}}
        <div class="dash-content-grid">
            {{-- Columna Principal: Pedidos Recientes --}}
            <div>
                @include('admin.dashboard.components.recent-orders')
            </div>

            {{-- Columna Secundaria: Acciones Rápidas, Inventario y Actividad --}}
            <div class="dash-side-stack">
                @include('admin.dashboard.components.quick-actions')
                @include('admin.dashboard.components.top-products')
                @include('admin.dashboard.components.recent-activity')
            </div>
        </div>
    </div>

    {{-- PESTAÑA 2: GESTIÓN DE PRODUCTOS E INVENTARIO --}}
    <div id="pane-inventory" class="dash-tab-pane">
        @include('admin.dashboard.components.product-management')
    </div>
</div>

{{-- Modales de Producto y Eliminación --}}
@include('admin.dashboard.components.product-modal')
@include('admin.dashboard.components.delete-confirm-modal')
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // --- ESTADO Y DATOS MOCK DE PRODUCTOS ---
    let mockProducts = [
        {
            id: 1,
            name: 'Cachetero Encaje Royal',
            sku: 'LN-CAC-001',
            category: 'cachetero',
            categoryName: 'Cachetero',
            priceUnit: 28.00,
            priceQuarter: 24.00,
            priceDozen: 20.00,
            stock: 3,
            maxStock: 50,
            active: true,
            image: 'assets/img/default-product.png',
            description: 'Confeccionado con fino encaje elástico y forro 100% algodón antialérgico.'
        },
        {
            id: 2,
            name: 'Bikini Algodón Pima Soft',
            sku: 'LN-BIK-002',
            category: 'bikini',
            categoryName: 'Bikini',
            priceUnit: 22.50,
            priceQuarter: 19.50,
            priceDozen: 16.00,
            stock: 48,
            maxStock: 60,
            active: true,
            image: 'assets/img/default-product.png',
            description: 'Algodón Pima peruano extra suave para uso diario con acabado invisible.'
        },
        {
            id: 3,
            name: 'Semi Hilo Sensual Red',
            sku: 'LN-HIL-003',
            category: 'semihilo',
            categoryName: 'Semi Hilo',
            priceUnit: 25.00,
            priceQuarter: 21.00,
            priceDozen: 17.50,
            stock: 5,
            maxStock: 40,
            active: true,
            image: 'assets/img/default-product.png',
            description: 'Diseño sensual con detalles de transparencias y elásticos suaves.'
        },
        {
            id: 4,
            name: 'Topsito Seamless Confort',
            sku: 'LN-TOP-004',
            category: 'topsito',
            categoryName: 'Topsito',
            priceUnit: 35.00,
            priceQuarter: 30.00,
            priceDozen: 25.00,
            stock: 32,
            maxStock: 50,
            active: true,
            image: 'assets/img/default-product.png',
            description: 'Top sin costuras con copas removibles y soporte ergonómico.'
        },
        {
            id: 5,
            name: 'Conjunto Bralette & Bikini Velvet',
            sku: 'LN-CON-005',
            category: 'conjunto',
            categoryName: 'Conjunto',
            priceUnit: 48.00,
            priceQuarter: 42.00,
            priceDozen: 36.00,
            stock: 0,
            maxStock: 30,
            active: false,
            image: 'assets/img/default-product.png',
            description: 'Conjunto de dos piezas en terciopelo y tul bordado premium.'
        },
        {
            id: 6,
            name: 'Cachetero Microfibra Sport',
            sku: 'LN-CAC-006',
            category: 'cachetero',
            categoryName: 'Cachetero',
            priceUnit: 20.00,
            priceQuarter: 17.00,
            priceDozen: 14.50,
            stock: 24,
            maxStock: 50,
            active: true,
            image: 'assets/img/default-product.png',
            description: 'Microfibra transpirable para deporte y alto rendimiento.'
        },
        {
            id: 7,
            name: 'Bikini Encaje Floral Black',
            sku: 'LN-BIK-007',
            category: 'bikini',
            categoryName: 'Bikini',
            priceUnit: 24.00,
            priceQuarter: 20.50,
            priceDozen: 17.00,
            stock: 8,
            maxStock: 45,
            active: true,
            image: 'assets/img/default-product.png',
            description: 'Diseño floral bordado con pretina ancha de sujeción.'
        },
        {
            id: 8,
            name: 'Semi Hilo Nude Invisible',
            sku: 'LN-HIL-008',
            category: 'semihilo',
            categoryName: 'Semi Hilo',
            priceUnit: 21.00,
            priceQuarter: 18.00,
            priceDozen: 15.00,
            stock: 0,
            maxStock: 50,
            active: false,
            image: 'assets/img/default-product.png',
            description: 'Corte láser sin costuras en tono nude para prendas claras.'
        }
    ];

    // --- TAB SWITCHER ---
    function switchDashboardTab(tabId, element) {
        document.querySelectorAll('.dash-tab-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.dash-tab-pane').forEach(pane => pane.classList.remove('active'));

        if (element) element.classList.add('active');
        const targetPane = document.getElementById('pane-' + tabId);
        if (targetPane) targetPane.classList.add('active');

        if (tabId === 'inventory') {
            renderProductsTable(mockProducts);
            updateInventoryKpis();
        }
    }

    // --- RENDERIZADO DE TABLA DE PRODUCTOS ---
    function renderProductsTable(products) {
        const tbody = document.getElementById('productTableBody');
        const countSpan = document.getElementById('visibleProductsCount');
        const emptyState = document.getElementById('productEmptyState');
        const table = document.getElementById('productsTable');

        if (!tbody) return;
        tbody.innerHTML = '';

        if (countSpan) countSpan.textContent = products.length;

        if (products.length === 0) {
            if (emptyState) emptyState.style.display = 'block';
            if (table) table.style.display = 'none';
            return;
        }

        if (emptyState) emptyState.style.display = 'none';
        if (table) table.style.display = 'table';

        products.forEach(p => {
            // Nivel de stock
            let stockStatus = 'good';
            let stockLabel = 'Disponible';
            if (p.stock === 0) {
                stockStatus = 'zero';
                stockLabel = 'Agotado';
            } else if (p.stock <= 10) {
                stockStatus = 'low';
                stockLabel = 'Stock Bajo';
            }

            const maxRef = p.maxStock || 50;
            const stockPct = Math.min(100, Math.round((p.stock / maxRef) * 100));

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="dash-customer-cell">
                        <img src="${p.image}" alt="${p.name}" class="dash-stock-img" onerror="this.src='https://via.placeholder.com/42x42/ffe4f0/d63384?text=LN'">
                        <div class="dash-customer-info">
                            <span class="name">${p.name}</span>
                            <span class="email">${p.sku}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="dash-pay-method">
                        <i class="fas fa-tag" style="color: var(--dash-primary);"></i>
                        ${p.categoryName}
                    </span>
                </td>
                <td>
                    <div style="display: flex; flex-direction: column; gap: 2px;">
                        <strong style="color: var(--dash-dark); font-size: 13.5px;">S/. ${p.priceUnit.toFixed(2)} <span style="font-size: 11px; font-weight: normal; color: #888;">(Und)</span></strong>
                        <span style="font-size: 11px; color: var(--dash-gray-500);">1/4: S/. ${p.priceQuarter.toFixed(2)} • Doc: S/. ${p.priceDozen.toFixed(2)}</span>
                    </div>
                </td>
                <td>
                    <div class="dash-stock-visual-cell">
                        <div class="dash-stock-header">
                            <span style="font-weight: 800; color: var(--dash-dark);">${p.stock} unidades</span>
                            <span class="dash-stock-tag ${stockStatus}">${stockLabel}</span>
                        </div>
                        <div class="dash-stock-bar-track">
                            <div class="dash-stock-bar-fill ${stockStatus}" style="width: ${stockPct}%;"></div>
                        </div>
                    </div>
                </td>
                <td style="text-align: center;">
                    <label class="dash-switch" title="Alternar visibilidad">
                        <input type="checkbox" ${p.active ? 'checked' : ''} onchange="toggleProductActive(${p.id}, this.checked)">
                        <span class="dash-slider"></span>
                    </label>
                </td>
                <td style="text-align: right;">
                    <div style="display: inline-flex; gap: 6px;">
                        <button type="button" class="dash-action-btn btn-edit" title="Editar producto" onclick="openProductModal('edit', ${p.id})">
                            <i class="fas fa-pen-to-square"></i> Editar
                        </button>
                        <button type="button" class="dash-action-btn btn-delete" title="Eliminar producto" onclick="openDeleteModal(${p.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // --- FILTROS DE PRODUCTOS ---
    function applyProductFilters() {
        const search = (document.getElementById('productSearchInput')?.value || '').toLowerCase().trim();
        const category = document.getElementById('filterCategory')?.value || 'all';
        const stockStatus = document.getElementById('filterStockStatus')?.value || 'all';
        const state = document.getElementById('filterState')?.value || 'all';

        const filtered = mockProducts.filter(p => {
            // Filtro de texto
            const matchesSearch = !search || p.name.toLowerCase().includes(search) || p.sku.toLowerCase().includes(search) || p.categoryName.toLowerCase().includes(search);

            // Filtro de categoría
            const matchesCategory = category === 'all' || p.category === category;

            // Filtro de stock
            let matchesStock = true;
            if (stockStatus === 'good') matchesStock = p.stock > 10;
            else if (stockStatus === 'low') matchesStock = p.stock > 0 && p.stock <= 10;
            else if (stockStatus === 'zero') matchesStock = p.stock === 0;

            // Filtro de estado activo
            let matchesState = true;
            if (state === 'active') matchesState = p.active === true;
            else if (state === 'inactive') matchesState = p.active === false;

            return matchesSearch && matchesCategory && matchesStock && matchesState;
        });

        renderProductsTable(filtered);
    }

    function filterByStock(status) {
        const select = document.getElementById('filterStockStatus');
        if (select) {
            select.value = status;
            applyProductFilters();
        }
    }

    function resetProductFilters() {
        if (document.getElementById('productSearchInput')) document.getElementById('productSearchInput').value = '';
        if (document.getElementById('filterCategory')) document.getElementById('filterCategory').value = 'all';
        if (document.getElementById('filterStockStatus')) document.getElementById('filterStockStatus').value = 'all';
        if (document.getElementById('filterState')) document.getElementById('filterState').value = 'all';
        applyProductFilters();
    }

    // --- ACTUALIZACIÓN DE KPIS DE INVENTARIO ---
    function updateInventoryKpis() {
        const total = mockProducts.length;
        const available = mockProducts.filter(p => p.stock > 10).length;
        const low = mockProducts.filter(p => p.stock > 0 && p.stock <= 10).length;
        const out = mockProducts.filter(p => p.stock === 0).length;

        if (document.getElementById('kpiTotalProducts')) document.getElementById('kpiTotalProducts').textContent = total;
        if (document.getElementById('kpiAvailableProducts')) document.getElementById('kpiAvailableProducts').textContent = available;
        if (document.getElementById('kpiLowStockProducts')) document.getElementById('kpiLowStockProducts').textContent = low;
        if (document.getElementById('kpiOutStockProducts')) document.getElementById('kpiOutStockProducts').textContent = out;
    }

    // --- TOGGLE ACTIVAR / DESACTIVAR ---
    function toggleProductActive(id, isChecked) {
        const product = mockProducts.find(p => p.id === id);
        if (product) {
            product.active = isChecked;
            showToast(`Producto "${product.name}" ahora está ${isChecked ? 'Activo en tienda' : 'Desactivado'}`, isChecked ? 'success' : 'info');
        }
    }

    // --- MODAL DE PRODUCTO (CREAR / EDITAR) ---
    function openProductModal(mode, id = null) {
        const modal = document.getElementById('productModal');
        const title = document.getElementById('modalTitle');
        const submitText = document.getElementById('modalSubmitBtnText');
        const idInput = document.getElementById('modalProductId');

        if (!modal) return;

        if (mode === 'create') {
            title.textContent = 'Agregar Nuevo Producto';
            submitText.textContent = 'Guardar Producto';
            idInput.value = '';
            document.getElementById('productForm').reset();
            document.getElementById('modalImgPreview').src = 'assets/img/default-product.png';
            document.getElementById('modalStatusActive').checked = true;
            updateModalStockBadge(50);
        } else if (mode === 'edit' && id) {
            const product = mockProducts.find(p => p.id === id);
            if (!product) return;

            title.textContent = 'Editar Producto: ' + product.name;
            submitText.textContent = 'Actualizar Cambios';
            idInput.value = product.id;

            document.getElementById('modalName').value = product.name;
            document.getElementById('modalCategory').value = product.category;
            document.getElementById('modalPriceUnit').value = product.priceUnit;
            document.getElementById('modalPriceQuarter').value = product.priceQuarter;
            document.getElementById('modalPriceDozen').value = product.priceDozen;
            document.getElementById('modalStock').value = product.stock;
            document.getElementById('modalDescription').value = product.description || '';
            document.getElementById('modalImgUrl').value = product.image;
            document.getElementById('modalImgPreview').src = product.image;
            document.getElementById('modalStatusActive').checked = product.active;

            updateModalStockBadge(product.stock);
        }

        modal.classList.add('show');
    }

    function closeProductModal() {
        const modal = document.getElementById('productModal');
        if (modal) modal.classList.remove('show');
    }

    function handleModalBackdropClick(event) {
        if (event.target.id === 'productModal') {
            closeProductModal();
        }
    }

    function updateModalImgPreview(url) {
        const preview = document.getElementById('modalImgPreview');
        if (preview) {
            preview.src = url ? url : 'assets/img/default-product.png';
        }
    }

    function updateModalStockBadge(value) {
        const badge = document.getElementById('modalStockStatusBadge');
        if (!badge) return;
        const val = parseInt(value, 10) || 0;

        if (val === 0) {
            badge.className = 'dash-stock-tag zero';
            badge.textContent = 'Agotado';
        } else if (val <= 10) {
            badge.className = 'dash-stock-tag low';
            badge.textContent = 'Stock Bajo';
        } else {
            badge.className = 'dash-stock-tag good';
            badge.textContent = 'Disponible';
        }
    }

    function saveProductForm(e) {
        e.preventDefault();
        const idVal = document.getElementById('modalProductId').value;
        const name = document.getElementById('modalName').value;
        const category = document.getElementById('modalCategory').value;
        const categorySelect = document.getElementById('modalCategory');
        const categoryName = categorySelect.options[categorySelect.selectedIndex].text;
        const priceUnit = parseFloat(document.getElementById('modalPriceUnit').value) || 0;
        const priceQuarter = parseFloat(document.getElementById('modalPriceQuarter').value) || (priceUnit * 0.85);
        const priceDozen = parseFloat(document.getElementById('modalPriceDozen').value) || (priceUnit * 0.75);
        const stock = parseInt(document.getElementById('modalStock').value, 10) || 0;
        const active = document.getElementById('modalStatusActive').checked;
        const image = document.getElementById('modalImgUrl').value || 'assets/img/default-product.png';
        const description = document.getElementById('modalDescription').value;

        if (idVal) {
            // Edición
            const existing = mockProducts.find(p => p.id === parseInt(idVal, 10));
            if (existing) {
                existing.name = name;
                existing.category = category;
                existing.categoryName = categoryName;
                existing.priceUnit = priceUnit;
                existing.priceQuarter = priceQuarter;
                existing.priceDozen = priceDozen;
                existing.stock = stock;
                existing.active = active;
                existing.image = image;
                existing.description = description;
                showToast(`Producto "${name}" actualizado con éxito (Mock)`, 'success');
            }
        } else {
            // Creación
            const newId = mockProducts.length > 0 ? Math.max(...mockProducts.map(p => p.id)) + 1 : 1;
            const newProduct = {
                id: newId,
                name: name,
                sku: 'LN-' + category.substring(0, 3).toUpperCase() + '-' + String(newId).padStart(3, '0'),
                category: category,
                categoryName: categoryName,
                priceUnit: priceUnit,
                priceQuarter: priceQuarter,
                priceDozen: priceDozen,
                stock: stock,
                maxStock: Math.max(stock, 50),
                active: active,
                image: image,
                description: description
            };
            mockProducts.unshift(newProduct);
            showToast(`Nuevo producto "${name}" agregado al catálogo (Mock)`, 'success');
        }

        closeProductModal();
        applyProductFilters();
        updateInventoryKpis();
    }

    // --- MODAL DE ELIMINACIÓN ---
    function openDeleteModal(id) {
        const product = mockProducts.find(p => p.id === id);
        if (!product) return;

        document.getElementById('deleteProductId').value = product.id;
        document.getElementById('deleteProductName').textContent = `"${product.name}"`;
        document.getElementById('deleteConfirmModal').classList.add('show');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteConfirmModal');
        if (modal) modal.classList.remove('show');
    }

    function handleDeleteModalBackdropClick(event) {
        if (event.target.id === 'deleteConfirmModal') {
            closeDeleteModal();
        }
    }

    function confirmDeleteProduct() {
        const idVal = parseInt(document.getElementById('deleteProductId').value, 10);
        const index = mockProducts.findIndex(p => p.id === idVal);

        if (index !== -1) {
            const deletedName = mockProducts[index].name;
            mockProducts.splice(index, 1);
            showToast(`Producto "${deletedName}" eliminado correctamente (Mock)`, 'info');
        }

        closeDeleteModal();
        applyProductFilters();
        updateInventoryKpis();
    }

    // --- TOAST NOTIFICATIONS ---
    function showToast(message, type = 'success') {
        const toast = document.getElementById('dashToast');
        const icon = document.getElementById('toastIcon');
        const msg = document.getElementById('toastMessage');

        if (!toast) return;

        toast.className = 'dash-toast ' + type;
        if (msg) msg.textContent = message;

        if (icon) {
            if (type === 'success') icon.className = 'fas fa-check-circle';
            else if (type === 'error') icon.className = 'fas fa-exclamation-circle';
            else icon.className = 'fas fa-info-circle';
        }

        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3500);
    }

    // --- INICIALIZACIÓN GENERAL ---
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Renderizar tabla de productos inicial
        renderProductsTable(mockProducts);
        updateInventoryKpis();

        // 2. Gráfico de Tendencias de Ventas
        const ctxSales = document.getElementById('salesTrendsChart');
        if (ctxSales) {
            const gradientSales = ctxSales.getContext('2d').createLinearGradient(0, 0, 0, 300);
            gradientSales.addColorStop(0, 'rgba(214, 51, 132, 0.35)');
            gradientSales.addColorStop(1, 'rgba(214, 51, 132, 0.00)');

            const salesDataSets = {
                week: {
                    labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
                    data: [1200, 1850, 1400, 2200, 2900, 3400, 2800]
                },
                month: {
                    labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
                    data: [4200, 5100, 3950, 5200]
                },
                year: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'],
                    data: [12500, 14200, 15800, 13900, 16800, 18450, 17200, 19100, 18450, 20500, 22800, 26000]
                }
            };

            window.salesChart = new Chart(ctxSales, {
                type: 'line',
                data: {
                    labels: salesDataSets.month.labels,
                    datasets: [{
                        label: 'Ingresos (S/.)',
                        data: salesDataSets.month.data,
                        borderColor: '#d63384',
                        backgroundColor: gradientSales,
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#d63384',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#2c272a',
                            titleFont: { size: 13, weight: 'bold' },
                            bodyFont: { size: 13 },
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function (context) {
                                    return ' Ventas: S/. ' + context.parsed.y.toLocaleString('es-PE', { minimumFractionDigits: 2 });
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#6c757d', font: { size: 12 } }
                        },
                        y: {
                            grid: { color: 'rgba(0, 0, 0, 0.05)' },
                            ticks: {
                                color: '#6c757d',
                                font: { size: 12 },
                                callback: function (value) {
                                    return 'S/. ' + value.toLocaleString('es-PE');
                                }
                            }
                        }
                    }
                }
            });

            window.updateSalesChart = function (range, buttonElement) {
                document.querySelectorAll('.dash-chart-btn').forEach(btn => btn.classList.remove('active'));
                if (buttonElement) buttonElement.classList.add('active');

                if (window.salesChart && salesDataSets[range]) {
                    window.salesChart.data.labels = salesDataSets[range].labels;
                    window.salesChart.data.datasets[0].data = salesDataSets[range].data;
                    window.salesChart.update();
                }
            };
        }

        // 3. Gráfico de Categorías (Doughnut)
        const ctxCategory = document.getElementById('categoryDistributionChart');
        if (ctxCategory) {
            new Chart(ctxCategory, {
                type: 'doughnut',
                data: {
                    labels: ['Cacheteros', 'Bikinis', 'Semi Hilos', 'Topsitos'],
                    datasets: [{
                        data: [38, 28, 20, 14],
                        backgroundColor: ['#d63384', '#804d58', '#e83e8c', '#bfa0a6'],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#2c272a',
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function (context) {
                                    return ` ${context.label}: ${context.parsed}%`;
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endsection
