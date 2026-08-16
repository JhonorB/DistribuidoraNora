@extends('layouts.admin')

@section('title', 'Gestionar Pedidos')
@section('nav_title', 'Administrar Pedidos')

@section('content')
<div class="container-box">
    <h2>Listado de Órdenes de Pedido</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Subtotal</th>
                <th>Envío</th>
                <th>Total</th>
                <th>Método de Pago</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>S/. {{ number_format($order->subtotal, 2) }}</td>
                    <td>S/. {{ number_format($order->shipping_cost, 2) }}</td>
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
</div>
@endsection
