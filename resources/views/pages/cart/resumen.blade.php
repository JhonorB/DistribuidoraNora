@extends('layouts.app')

@section('title', 'Resumen de Compra - Lencería Nora')

@section('styles')
<style>
    .resumen-contenedor {
        max-width: 700px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .resumen-header {
        text-align: center;
        margin-bottom: 30px;
        color: #d63384;
    }
    .resumen-details {
        border-top: 1px solid #eee;
        padding: 20px 0;
    }
    .resumen-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    .resumen-table th, .resumen-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    .success-icon {
        font-size: 50px;
        color: #28a745;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')
<main class="checkout-wrapper">
    <div class="resumen-contenedor">
        <div class="resumen-header">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>¡Gracias por tu pedido!</h1>
            <p>Tu orden ha sido registrada con éxito bajo el código <strong>#{{ $order->id }}</strong>.</p>
        </div>

        <div class="resumen-details">
            <h3>Detalles del Cliente</h3>
            <p><strong>Nombre:</strong> {{ $order->customer_name }}</p>
            <p><strong>Teléfono:</strong> {{ $order->customer_phone }}</p>
            <p><strong>Correo:</strong> {{ $order->customer_email }}</p>
            <p><strong>Dirección de Envío:</strong> {{ $order->shipping_address }}, {{ $order->district }}, {{ $order->province }}, {{ $order->department }}</p>
            <p><strong>Método de Pago:</strong> {{ $order->payment_method }}</p>
            <p><strong>Estado:</strong> <span class="badge badge-warning">{{ $order->status }}</span></p>

            <h3>Artículos Solicitados</h3>
            <table class="resumen-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Presentación</th>
                        <th>Cant.</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ ucfirst($item->price_type) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>S/. {{ number_format($item->price, 2) }}</td>
                        <td>S/. {{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="text-align: right; font-size: 18px; margin-top: 20px;">
                <p>Subtotal: <strong>S/. {{ number_format($order->subtotal, 2) }}</strong></p>
                <p>Costo Envío: <strong>S/. {{ number_format($order->shipping_cost, 2) }}</strong></p>
                <p style="color: #d63384; font-size: 22px;">Total: <strong>S/. {{ number_format($order->total, 2) }}</strong></p>
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('products.index') }}" class="btn">Seguir Comprando</a>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
@if(session('clear_cart'))
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Clear local storage shopping cart since order has been processed on database
        localStorage.removeItem("carrito");
    });
</script>
@endif
@endsection
