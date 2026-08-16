@extends('layouts.app')

@section('title', 'Nuestro Catálogo - Lencería Nora')

@section('styles')
<style>
    .catalogo-wrapper {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        text-align: center;
    }
    .catalogo-title {
        font-family: 'Playfair Display', serif;
        color: #804d58;
        font-size: 36px;
        margin-bottom: 10px;
    }
    .catalogo-subtitle {
        color: #666;
        margin-bottom: 40px;
        font-size: 16px;
    }
    .catalogo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 25px;
    }
    .catalogo-page-card {
        background: white;
        border: 1px solid #e5d7da;
        border-radius: 12px;
        padding: 10px;
        box-shadow: 0 4px 10px rgba(128, 77, 88, 0.05);
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .catalogo-page-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(128, 77, 88, 0.15);
    }
    .catalogo-page-card img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        display: block;
    }
    .catalogo-page-num {
        display: block;
        margin-top: 10px;
        font-weight: 600;
        color: #804d58;
    }

    /* Zoom Modal */
    .zoom-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.9);
        justify-content: center;
        align-items: center;
    }
    .zoom-modal-content {
        max-width: 90%;
        max-height: 90%;
        border-radius: 8px;
    }
    .zoom-close {
        position: absolute;
        top: 20px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<main class="catalogo-wrapper">
    <h1 class="catalogo-title">Nuestro Catálogo Oficial</h1>
    <p class="catalogo-subtitle">Descubre las nuevas colecciones exclusivas de Marbellín y Lencería Nora. Haz clic en cualquier página para ampliarla.</p>

    <div class="catalogo-grid">
        @for ($i = 1; $i <= 89; $i++)
            <div class="catalogo-page-card" onclick="openZoom('{{ asset('assets/img/catalog/page_'.$i.'.png') }}')">
                <img src="{{ asset('assets/img/catalog/page_'.$i.'.png') }}" alt="Página {{ $i }}" loading="lazy">
                <span class="catalogo-page-num">Página {{ $i }}</span>
            </div>
        @endfor
    </div>
</main>

<!-- Zoom Modal -->
<div id="zoomModal" class="zoom-modal" onclick="closeZoom()">
    <span class="zoom-close" onclick="closeZoom()">&times;</span>
    <img class="zoom-modal-content" id="zoomImg">
</div>
@endsection

@section('scripts')
<script>
    function openZoom(src) {
        document.getElementById('zoomImg').src = src;
        document.getElementById('zoomModal').style.display = 'flex';
    }
    function closeZoom() {
        document.getElementById('zoomModal').style.display = 'none';
    }
</script>
@endsection
