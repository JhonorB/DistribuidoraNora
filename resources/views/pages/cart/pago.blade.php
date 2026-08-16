@extends('layouts.app')

@section('title', 'Método de Pago - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/layout/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/pago.css') }}">
<style>
    .pago-contenedor {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .instrucciones-pago {
        border: 2px dashed #d63384;
        padding: 20px;
        border-radius: 8px;
        margin: 20px 0;
        background: #fff9fb;
        text-align: center;
    }
    .yape-qr {
        max-width: 200px;
        margin: 15px auto;
        display: block;
        border: 2px solid #ddd;
        border-radius: 8px;
    }
</style>
@endsection

@section('content')
<main class="checkout-wrapper">
    <div class="pago-contenedor">
        <h1>Selecciona Método de Pago</h1>
        <p>Tu pedido está casi listo. Por favor, selecciona cómo deseas pagar:</p>

        <form id="pago-form" action="{{ route('cart.procesar') }}" method="POST">
            @csrf
            
            <!-- Hidden input to hold serialized localStorage cart items -->
            <input type="hidden" id="cart_items_input" name="cart_items" value="[]">

            <div class="opciones-pago">
                <label style="display: block; margin: 15px 0; font-size: 16px; cursor: pointer;">
                    <input type="radio" name="payment_method" value="Yape" checked onclick="mostrarInstrucciones('yape')"> 
                    <strong>Pagar con Yape (Recomendado)</strong>
                </label>
                
                <label style="display: block; margin: 15px 0; font-size: 16px; cursor: pointer;">
                    <input type="radio" name="payment_method" value="Transferencia" onclick="mostrarInstrucciones('bcp')"> 
                    <strong>Transferencia Bancaria (BCP / BBVA / Interbank)</strong>
                </label>

                <label style="display: block; margin: 15px 0; font-size: 16px; cursor: pointer;">
                    <input type="radio" name="payment_method" value="Contraentrega" onclick="mostrarInstrucciones('contra')"> 
                    <strong>Pago Contra Entrega (Solo Lima Metropolitana)</strong>
                </label>
            </div>

            <!-- Instrucciones dinámicas -->
            <div id="instrucciones" class="instrucciones-pago">
                <!-- Por defecto se muestra Yape -->
                <div id="inst-yape">
                    <h3>Pago con Yape</h3>
                    <p>Escanea el código QR desde tu celular o yapea directamente al número:</p>
                    <h4><strong>976 553 014</strong></h4>
                    <p>Nombre: Nora Edith D.</p>
                    <img src="{{ asset('assets/img/yape-header.png') }}" class="yape-qr" alt="QR Yape" onerror="this.src='https://via.placeholder.com/200?text=Yape+976553014'">
                </div>

                <div id="inst-bcp" style="display: none;">
                    <h3>Transferencia Bancaria</h3>
                    <p>Realiza tu transferencia a las siguientes cuentas:</p>
                    <p><strong>BCP Soles:</strong> 191-XXXXXXXX-X-XX<br>CCI: 002-191-XXXXXXXXX-XX</p>
                    <p><strong>BBVA Soles:</strong> 0011-XXXX-XXXXXXXXXX<br>CCI: 011-XXX-XXXXXXXXXXXX-XX</p>
                    <p>Una vez completado el pago, envíanos el comprobante al correo <strong>lencerianora2026@gmail.com</strong> o vía WhatsApp.</p>
                </div>

                <div id="inst-contra" style="display: none;">
                    <h3>Pago Contra Entrega</h3>
                    <p>Pagarás tu pedido en efectivo o con Yape al momento de recibirlo en tu dirección.</p>
                    <p>Válido únicamente para Lima Metropolitana y Callao.</p>
                </div>
            </div>

            <label class="terminos" style="display: block; margin: 20px 0; font-size: 14px;">
                <input type="checkbox" required>
                Acepto los <a href="{{ route('page.terminos') }}" target="_blank">términos y condiciones</a> de compra.
            </label>

            <button type="submit" class="btn" style="width: 100%; padding: 12px; font-size: 18px;">
                <i class="fas fa-check-circle"></i> Confirmar y Finalizar Pedido
            </button>
        </form>
    </div>
</main>
@endsection

@section('scripts')
<script>
    function mostrarInstrucciones(tipo) {
        document.getElementById('inst-yape').style.display = tipo === 'yape' ? 'block' : 'none';
        document.getElementById('inst-bcp').style.display = tipo === 'bcp' ? 'block' : 'none';
        document.getElementById('inst-contra').style.display = tipo === 'contra' ? 'block' : 'none';
    }

    document.addEventListener("DOMContentLoaded", () => {
        // Retrieve cart items from localStorage and put them in the hidden input field
        const cart = localStorage.getItem("carrito") || "[]";
        document.getElementById("cart_items_input").value = cart;
    });
</script>
@endsection
