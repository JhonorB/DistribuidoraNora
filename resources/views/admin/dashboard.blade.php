@extends('layouts.admin')

@section('title', 'Panel de Control - Dashboard')
@section('nav_title', 'Dashboard General')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endsection

@section('content')
<div class="dashboard-wrapper">
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
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 1. Gráfico de Tendencias de Ventas ---
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

            // Función global para alternar rangos
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

        // --- 2. Gráfico de Categorías (Doughnut) ---
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
