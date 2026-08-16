@extends('layouts.app')

@section('title', 'Checkout - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/layout/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
<link rel="stylesheet" href="{{ asset('css/checkoutpasos.css') }}">
<link rel="stylesheet" href="{{ asset('css/checkoutalerta.css') }}">
<style>
    .checkout-container {
        display: grid;
        grid-template-columns: 3fr 2fr;
        gap: 30px;
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }
    
    .form-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 30px;
        border: 1px solid #e5d7da;
        box-shadow: 0 4px 15px rgba(128, 77, 88, 0.05);
    }
    
    .form-group-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 15px;
    }
    
    .form-group-triple {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 15px;
        margin-bottom: 15px;
    }
    
    .form-control-col {
        display: flex;
        flex-direction: column;
    }
    
    .form-control-col label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #4a3337;
        font-size: 14px;
    }
    
    .form-control-col input, .form-control-col select {
        padding: 12px;
        border: 1px solid #c7b6b9;
        border-radius: 8px;
        font-size: 15px;
        color: #4a3337;
        background-color: #faf5f6;
        transition: border-color 0.3s;
    }
    
    .form-control-col input:focus, .form-control-col select:focus {
        border-color: #804d58;
        outline: none;
        background-color: #ffffff;
    }
    
    .section-title {
        color: #804d58;
        font-family: 'Playfair Display', serif;
        border-bottom: 2px solid #804d58;
        padding-bottom: 10px;
        margin-bottom: 20px;
        font-size: 22px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .summary-card {
        background: #fff9fb;
        border-radius: 16px;
        padding: 30px;
        border: 2px dashed #804d58;
        position: sticky;
        top: 20px;
    }
    
    .summary-title {
        color: #804d58;
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e5d7da;
        font-size: 15px;
    }
    
    .summary-total {
        display: flex;
        justify-content: space-between;
        padding: 15px 0;
        font-size: 20px;
        font-weight: bold;
        color: #804d58;
    }

    @media (max-width: 768px) {
        .checkout-container {
            grid-template-columns: 1fr;
        }
        .form-group-row, .form-group-triple {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }
</style>
@endsection

@section('content')
<div class="checkout-container">
    <!-- Formulario de Datos -->
    <div class="form-card">
        <form id="checkout-form" action="{{ route('cart.pago') }}" method="POST">
            @csrf
            
            <!-- Sección 1 -->
            <div class="section-title">
                <i class="fas fa-user-circle"></i> 1. Datos Personales
            </div>
            
            <div class="form-group-row">
                <div class="form-control-col">
                    <label for="nombres">Nombres *</label>
                    <input type="text" id="nombres" name="nombre" value="{{ old('nombre', Auth::user()?->name) }}" required>
                </div>
                <div class="form-control-col">
                    <label for="apellidos">Apellidos *</label>
                    <input type="text" id="apellidos" name="apellido" value="{{ old('apellido') }}" required>
                </div>
            </div>
            
            <div class="form-group-row">
                <div class="form-control-col">
                    <label for="correo">Correo Electrónico *</label>
                    <input type="email" id="correo" name="correo" value="{{ old('correo', Auth::user()?->email) }}" required>
                </div>
                <div class="form-control-col">
                    <label for="telefono">Teléfono / Celular *</label>
                    <input type="tel" id="telefono" name="celular" value="{{ old('celular') }}" required>
                </div>
            </div>
            
            <!-- Sección 2 -->
            <div class="section-title" style="margin-top: 35px;">
                <i class="fas fa-map-marker-alt"></i> 2. Dirección de Envío
            </div>
            
            <div class="form-group-triple">
                <div class="form-control-col">
                    <label for="departamento">Departamento *</label>
                    <select id="departamento" name="departamento" required></select>
                </div>
                <div class="form-control-col">
                    <label for="provincia">Provincia *</label>
                    <select id="provincia" name="provincia" required></select>
                </div>
                <div class="form-control-col">
                    <label for="distrito">Distrito *</label>
                    <select id="distrito" name="distrito" required></select>
                </div>
            </div>
            
            <div class="form-control-col" style="margin-bottom: 20px;">
                <label for="direccion">Dirección Exacta (Av, Jr, Calle, Nro, Dpto) *</label>
                <input type="text" id="direccion" name="direccion" placeholder="Ej: Av. Hipólito Unanue 1457, Dpto 302" required>
                <input type="hidden" id="costo_envio" name="costo_envio" value="0">
            </div>
            
            <button type="submit" class="btn" style="width: 100%; padding: 15px; font-size: 18px; font-weight: bold; margin-top: 20px;">
                Proceder al Pago <i class="fas fa-chevron-right" style="margin-left: 8px;"></i>
            </button>
        </form>
    </div>

    <!-- Resumen lateral -->
    <aside class="summary-card">
        <h2 class="summary-title">Resumen del Pedido</h2>
        <div id="listaResumen"></div>
        <div class="summary-total">
            <span>Total a pagar:</span>
            <span id="totalResumen">S/. 0.00</span>
        </div>
    </aside>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/ubicacion-peru.js') }}"></script>
<script src="{{ asset('js/cargar-ubicacion.js') }}"></script>
<script src="{{ asset('js/ubicacionPrecio.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cart = JSON.parse(localStorage.getItem("carrito")) || [];
        const listaResumen = document.getElementById("listaResumen");
        const totalResumen = document.getElementById("totalResumen");
        
        if (cart.length === 0) {
            listaResumen.innerHTML = "<p style='text-align:center; color:#888;'>El carrito está vacío.</p>";
            return;
        }
        
        let total = 0;
        listaResumen.innerHTML = "";
        cart.forEach(item => {
            const itemElement = document.createElement("div");
            itemElement.className = "summary-item";
            
            const subtotal = item.precio * item.cantidad;
            total += subtotal;
            
            itemElement.innerHTML = `
                <span>${item.nombre} (x${item.cantidad})</span>
                <strong>S/. ${subtotal.toFixed(2)}</strong>
            `;
            listaResumen.appendChild(itemElement);
        });
        
        totalResumen.textContent = `S/. ${total.toFixed(2)}`;
    });
</script>
@endsection
