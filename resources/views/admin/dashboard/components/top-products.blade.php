{{-- resources/views/admin/dashboard/components/top-products.blade.php --}}
<div class="dash-side-card">
    <div class="dash-card-header" style="margin-bottom: 8px;">
        <div class="dash-card-header-left">
            <h3>Control de Inventario</h3>
            <p>Productos con mayor rotación y alertas de stock</p>
        </div>
        <a href="{{ route('admin.productos') }}" class="dash-action-btn" style="padding: 5px 10px; font-size: 11.5px;">
            <span>Stock</span>
        </a>
    </div>

    <div class="dash-stock-list">
        <div class="dash-stock-item">
            <div class="dash-stock-info">
                <img src="{{ asset('assets/img/default-product.png') }}" alt="Cachetero Encaje Royal" class="dash-stock-img" onerror="this.src='https://via.placeholder.com/42x42/ffe4f0/d63384?text=LN'">
                <div class="dash-stock-details">
                    <p class="dash-stock-name">Cachetero Encaje Royal</p>
                    <p class="dash-stock-cat">Cachetero • S/. 28.00</p>
                </div>
            </div>
            <span class="dash-stock-pill low">3 en stock</span>
        </div>

        <div class="dash-stock-item">
            <div class="dash-stock-info">
                <img src="{{ asset('assets/img/default-product.png') }}" alt="Bikini Algodón Pima" class="dash-stock-img" onerror="this.src='https://via.placeholder.com/42x42/ffe4f0/d63384?text=LN'">
                <div class="dash-stock-details">
                    <p class="dash-stock-name">Bikini Algodón Pima</p>
                    <p class="dash-stock-cat">Bikini • S/. 22.50</p>
                </div>
            </div>
            <span class="dash-stock-pill good">48 en stock</span>
        </div>

        <div class="dash-stock-item">
            <div class="dash-stock-info">
                <img src="{{ asset('assets/img/default-product.png') }}" alt="Semi Hilo Sensual Red" class="dash-stock-img" onerror="this.src='https://via.placeholder.com/42x42/ffe4f0/d63384?text=LN'">
                <div class="dash-stock-details">
                    <p class="dash-stock-name">Semi Hilo Sensual Red</p>
                    <p class="dash-stock-cat">Semi Hilo • S/. 25.00</p>
                </div>
            </div>
            <span class="dash-stock-pill low">5 en stock</span>
        </div>

        <div class="dash-stock-item">
            <div class="dash-stock-info">
                <img src="{{ asset('assets/img/default-product.png') }}" alt="Topsito Seamless Confort" class="dash-stock-img" onerror="this.src='https://via.placeholder.com/42x42/ffe4f0/d63384?text=LN'">
                <div class="dash-stock-details">
                    <p class="dash-stock-name">Topsito Seamless Confort</p>
                    <p class="dash-stock-cat">Topsito • S/. 35.00</p>
                </div>
            </div>
            <span class="dash-stock-pill good">32 en stock</span>
        </div>
    </div>
</div>
