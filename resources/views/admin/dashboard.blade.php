@extends('layouts.admin')

@section('title', 'Dashboard')
@section('nav_title', 'Dashboard General')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
    <div class="container-box" style="text-align: center; border-top: 5px solid #d63384; margin-bottom: 0;">
        <i class="fas fa-tags" style="font-size: 40px; color: #d63384; margin-bottom: 10px;"></i>
        <h3>Productos</h3>
        <p style="font-size: 24px; font-weight: bold; margin: 0; color: #d63384;">{{ $productsCount }}</p>
    </div>

    <div class="container-box" style="text-align: center; border-top: 5px solid #28a745; margin-bottom: 0;">
        <i class="fas fa-receipt" style="font-size: 40px; color: #28a745; margin-bottom: 10px;"></i>
        <h3>Pedidos</h3>
        <p style="font-size: 24px; font-weight: bold; margin: 0; color: #28a745;">{{ $ordersCount }}</p>
    </div>

    <div class="container-box" style="text-align: center; border-top: 5px solid #ffc107; margin-bottom: 0;">
        <i class="fas fa-book-open" style="font-size: 40px; color: #ffc107; margin-bottom: 10px;"></i>
        <h3>Reclamaciones</h3>
        <p style="font-size: 24px; font-weight: bold; margin: 0; color: #ffc107;">{{ $claimsCount }}</p>
    </div>

    <div class="container-box" style="text-align: center; border-top: 5px solid #17a2b8; margin-bottom: 0;">
        <i class="fas fa-envelope" style="font-size: 40px; color: #17a2b8; margin-bottom: 10px;"></i>
        <h3>Mensajes</h3>
        <p style="font-size: 24px; font-weight: bold; margin: 0; color: #17a2b8;">{{ $messagesCount }}</p>
    </div>
</div>

<div class="container-box">
    <h2>Últimos Pedidos Recibidos</h2>
    @if($latestOrders->isEmpty())
        <p>No se han registrado pedidos en el sistema.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Método de Pago</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestOrders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>S/. {{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>
                        <span class="badge {{ $order->status == 'pendiente' ? 'badge-warning' : ($order->status == 'completado' ? 'badge-success' : 'badge-danger') }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.pedidos.show', $order->id) }}" class="btn">Ver Detalle</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
