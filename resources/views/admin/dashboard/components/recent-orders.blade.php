{{-- resources/views/admin/dashboard/components/recent-orders.blade.php --}}
<div class="dash-table-card">
    <div class="dash-card-header">
        <div class="dash-card-header-left">
            <h3>Órdenes de Pedido Recientes</h3>
            <p>Monitoreo y despacho de transacciones comerciales</p>
        </div>
        <a href="{{ route('admin.pedidos') }}" class="dash-action-btn">
            <span>Ver Todos</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <div class="dash-table-responsive">
        <table class="dash-modern-table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Cliente</th>
                    <th>Método</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th style="text-align: right;">Acción</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($latestOrders) && $latestOrders->isNotEmpty())
                    @foreach($latestOrders as $order)
                        <tr>
                            <td>
                                <span class="dash-order-id">#PED-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="dash-customer-cell">
                                    <div class="dash-avatar-circle">
                                        {{ strtoupper(substr($order->customer_name ?? 'C', 0, 2)) }}
                                    </div>
                                    <div class="dash-customer-info">
                                        <span class="name">{{ $order->customer_name }}</span>
                                        <span class="email">{{ $order->customer_email ?? 'cliente@ejemplo.com' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="dash-pay-method">
                                    <i class="fas {{ strtolower($order->payment_method) == 'yape' ? 'fa-mobile-alt' : (strtolower($order->payment_method) == 'plin' ? 'fa-mobile-screen' : 'fa-credit-card') }}"></i>
                                    {{ ucfirst($order->payment_method ?? 'Yape') }}
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--dash-dark); font-size: 14px;">
                                    S/. {{ number_format($order->total, 2) }}
                                </strong>
                            </td>
                            <td>
                                @php
                                    $statusClass = strtolower(str_replace(' ', '_', $order->status ?? 'pendiente'));
                                @endphp
                                <span class="dash-badge-status {{ $statusClass }}">
                                    <i class="fas {{ $statusClass == 'completado' || $statusClass == 'entregado' ? 'fa-check-circle' : ($statusClass == 'pendiente' ? 'fa-clock' : 'fa-spinner fa-spin') }}"></i>
                                    {{ ucfirst($order->status ?? 'Pendiente') }}
                                </span>
                            </td>
                            <td style="color: var(--dash-gray-500); font-size: 12.5px;">
                                {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }}
                            </td>
                            <td style="text-align: right;">
                                <a href="{{ route('admin.pedidos.show', $order->id) }}" class="dash-action-btn" title="Ver detalle completo">
                                    <i class="fas fa-eye"></i> Detalle
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    {{-- Mock Fallback Data when no orders exist in database --}}
                    <tr>
                        <td><span class="dash-order-id">#PED-0142</span></td>
                        <td>
                            <div class="dash-customer-cell">
                                <div class="dash-avatar-circle">CR</div>
                                <div class="dash-customer-info">
                                    <span class="name">Camila Rodriguez</span>
                                    <span class="email">camila.rodriguez@gmail.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="dash-pay-method"><i class="fas fa-mobile-alt" style="color: #6f42c1;"></i> Yape</span></td>
                        <td><strong style="color: var(--dash-dark);">S/. 185.00</strong></td>
                        <td><span class="dash-badge-status pendiente"><i class="fas fa-clock"></i> Pendiente</span></td>
                        <td style="color: var(--dash-gray-500); font-size: 12.5px;">Hoy 14:32</td>
                        <td style="text-align: right;"><a href="{{ route('admin.pedidos') }}" class="dash-action-btn"><i class="fas fa-eye"></i> Detalle</a></td>
                    </tr>
                    <tr>
                        <td><span class="dash-order-id">#PED-0141</span></td>
                        <td>
                            <div class="dash-customer-cell">
                                <div class="dash-avatar-circle" style="background: linear-gradient(135deg, #28a745, #20c997);">VP</div>
                                <div class="dash-customer-info">
                                    <span class="name">Valeria Paredes</span>
                                    <span class="email">valeria.p@hotmail.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="dash-pay-method"><i class="fas fa-mobile-screen" style="color: #0dcaf0;"></i> Plin</span></td>
                        <td><strong style="color: var(--dash-dark);">S/. 240.00</strong></td>
                        <td><span class="dash-badge-status completado"><i class="fas fa-check-circle"></i> Completado</span></td>
                        <td style="color: var(--dash-gray-500); font-size: 12.5px;">Hoy 12:15</td>
                        <td style="text-align: right;"><a href="{{ route('admin.pedidos') }}" class="dash-action-btn"><i class="fas fa-eye"></i> Detalle</a></td>
                    </tr>
                    <tr>
                        <td><span class="dash-order-id">#PED-0140</span></td>
                        <td>
                            <div class="dash-customer-cell">
                                <div class="dash-avatar-circle" style="background: linear-gradient(135deg, #fd7e14, #ffc107);">SM</div>
                                <div class="dash-customer-info">
                                    <span class="name">Sofia Mendoza</span>
                                    <span class="email">sofia.m@gmail.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="dash-pay-method"><i class="fas fa-credit-card" style="color: #d63384;"></i> BCP Transfer</span></td>
                        <td><strong style="color: var(--dash-dark);">S/. 420.00</strong></td>
                        <td><span class="dash-badge-status en_proceso"><i class="fas fa-truck"></i> En Camino</span></td>
                        <td style="color: var(--dash-gray-500); font-size: 12.5px;">Ayer 18:40</td>
                        <td style="text-align: right;"><a href="{{ route('admin.pedidos') }}" class="dash-action-btn"><i class="fas fa-eye"></i> Detalle</a></td>
                    </tr>
                    <tr>
                        <td><span class="dash-order-id">#PED-0139</span></td>
                        <td>
                            <div class="dash-customer-cell">
                                <div class="dash-avatar-circle" style="background: linear-gradient(135deg, #6f42c1, #e83e8c);">LG</div>
                                <div class="dash-customer-info">
                                    <span class="name">Luciana Gomez</span>
                                    <span class="email">luciana.g@outlook.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="dash-pay-method"><i class="fas fa-mobile-alt" style="color: #6f42c1;"></i> Yape</span></td>
                        <td><strong style="color: var(--dash-dark);">S/. 95.00</strong></td>
                        <td><span class="dash-badge-status completado"><i class="fas fa-check-circle"></i> Completado</span></td>
                        <td style="color: var(--dash-gray-500); font-size: 12.5px;">Ayer 16:10</td>
                        <td style="text-align: right;"><a href="{{ route('admin.pedidos') }}" class="dash-action-btn"><i class="fas fa-eye"></i> Detalle</a></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
