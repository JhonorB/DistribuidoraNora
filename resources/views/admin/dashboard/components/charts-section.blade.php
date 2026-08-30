{{-- resources/views/admin/dashboard/components/charts-section.blade.php --}}
<div class="dash-charts-row">
    {{-- Gráfico de Ventas e Ingresos --}}
    <div class="dash-chart-card">
        <div class="dash-card-header">
            <div class="dash-card-header-left">
                <h3>Tendencia de Ventas e Ingresos</h3>
                <p>Evolución de pedidos y facturación en Soles (S/.)</p>
            </div>
            <div class="dash-chart-controls">
                <button type="button" class="dash-chart-btn" onclick="updateSalesChart('week', this)">7 Días</button>
                <button type="button" class="dash-chart-btn active" onclick="updateSalesChart('month', this)">30 Días</button>
                <button type="button" class="dash-chart-btn" onclick="updateSalesChart('year', this)">Este Año</button>
            </div>
        </div>
        <div class="dash-chart-canvas-wrapper">
            <canvas id="salesTrendsChart"></canvas>
        </div>
    </div>

    {{-- Gráfico de Distribución por Categorías --}}
    <div class="dash-chart-card">
        <div class="dash-card-header">
            <div class="dash-card-header-left">
                <h3>Ventas por Categoría</h3>
                <p>Distribución de demanda por línea</p>
            </div>
        </div>
        <div class="dash-chart-canvas-wrapper" style="min-height: 200px; max-height: 220px; display: flex; justify-content: center;">
            <canvas id="categoryDistributionChart"></canvas>
        </div>
        <div class="dash-category-list">
            <div class="dash-category-item">
                <div class="dash-cat-indicator">
                    <span class="dash-cat-dot" style="background-color: #d63384;"></span>
                    <span>Cacheteros</span>
                </div>
                <span class="dash-cat-meta">38% (S/. 7,011)</span>
            </div>
            <div class="dash-category-item">
                <div class="dash-cat-indicator">
                    <span class="dash-cat-dot" style="background-color: #804d58;"></span>
                    <span>Bikinis</span>
                </div>
                <span class="dash-cat-meta">28% (S/. 5,166)</span>
            </div>
            <div class="dash-category-item">
                <div class="dash-cat-indicator">
                    <span class="dash-cat-dot" style="background-color: #e83e8c;"></span>
                    <span>Semi Hilos</span>
                </div>
                <span class="dash-cat-meta">20% (S/. 3,690)</span>
            </div>
            <div class="dash-category-item">
                <div class="dash-cat-indicator">
                    <span class="dash-cat-dot" style="background-color: #bfa0a6;"></span>
                    <span>Topsitos</span>
                </div>
                <span class="dash-cat-meta">14% (S/. 2,583)</span>
            </div>
        </div>
    </div>
</div>
