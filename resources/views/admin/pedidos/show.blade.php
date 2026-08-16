@extends('layouts.admin')

@section('title', 'Detalle de Pedido #' . $order->id)
@section('nav_title', 'Detalle del Pedido #' . $order->id)

@section('content')
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    
    <div class="container-box">
        <h2>Productos Solicitados</h2>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Presentación</th>
                    <th>Cantidad</th>
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

        <div style="text-align: right; margin-top: 20px; font-size: 16px;">
            <p>Subtotal: <strong>S/. {{ number_format($order->subtotal, 2) }}</strong></p>
            <p>Costo Envío: <strong>S/. {{ number_format($order->shipping_cost, 2) }}</strong></p>
            <p style="color: #d63384; font-size: 20px;">Total: <strong>S/. {{ number_format($order->total, 2) }}</strong></p>
        </div>
    </div>

    <div class="container-box">
        <h2>Detalles de Entrega</h2>
        <p><strong>Cliente:</strong> {{ $order->customer_name }}</p>
        <p><strong>Teléfono:</strong> {{ $order->customer_phone }}</p>
        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
        <p><strong>Dirección:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Ubicación:</strong> {{ $order->district }}, {{ $order->province }}, {{ $order->department }}</p>
        <p><strong>Pago:</strong> {{ $order->payment_method }}</p>
        
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
        
        <h2>Acciones de Orden</h2>
        <form action="{{ route('admin.pedidos.update', $order->id) }}" method="POST">
            @csrf
            <label for="status" style="font-weight: bold; display: block; margin-bottom: 5px;">Estado del Pedido</label>
            <select id="status" name="status" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 15px;">
                <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completado" {{ $order->status == 'completado' ? 'selected' : '' }}>Completado (Entregado/Pagado)</option>
                <option value="cancelado" {{ $order->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
            
            <button type="submit" class="btn" style="width: 100%;">Actualizar Estado</button>
        </form>
    </div>

</div>
@endsection
