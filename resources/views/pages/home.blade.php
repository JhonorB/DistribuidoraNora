@extends('layouts.app')

@section('title', 'Inicio - Distribuidora De Marbellín - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<style>
.testimonials-section {
    padding: 60px 20px;
    max-width: 1200px;
    margin: 40px auto;
    text-align: center;
    display: block;
}
.testimonials-title {
    font-family: 'Playfair Display', serif;
    color: #804d58;
    font-size: 32px;
    margin-bottom: 10px;
}
.testimonials-subtitle {
    color: #666;
    font-size: 16px;
    margin-bottom: 45px;
}
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}
.testimonial-card {
    background: #ffffff;
    border: 1px solid #e5d7da;
    border-radius: 16px;
    padding: 30px;
    text-align: left;
    box-shadow: 0 4px 15px rgba(128, 77, 88, 0.05);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.3s, box-shadow 0.3s;
}
.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(128, 77, 88, 0.12);
}
.testimonial-card .stars {
    color: #f8c102;
    font-size: 18px;
    margin-bottom: 15px;
}
.testimonial-text {
    font-size: 14.5px;
    line-height: 1.6;
    color: #4a3337;
    font-style: italic;
    margin-bottom: 25px;
}
.testimonial-user {
    display: flex;
    align-items: center;
    gap: 15px;
}
.user-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background-color: #e5d7da;
    color: #804d58;
    font-weight: 700;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.user-info h4 {
    margin: 0 0 3px 0;
    font-size: 15px;
    font-weight: bold;
    color: #804d58;
}
.user-info span {
    font-size: 12.5px;
    color: #888;
}
</style>
@endsection

@section('content')
    <!-- Foto de portada -->
    <section id="cover-photo">
      <div id="cover-images">
        <img class="cover-slide" src="{{ asset('assets/img/portada/portada-1.png') }}" alt="Portada 1">
        <img class="cover-slide" src="{{ asset('assets/img/portada/portada-2.png') }}" alt="Portada 2">
        <img class="cover-slide" src="{{ asset('assets/img/portada/portada-3.png') }}" alt="Portada 3">
        <img class="cover-slide" src="{{ asset('assets/img/portada/portada-4.png') }}" alt="Portada 4">
      </div>
      <div id="cover-indicators"></div>
    </section>
    
    <!-- Frase deslizante continua -->
    <div class="sliding-message-container">
      <div class="sliding-track">
        <span class="sliding-message">
          ¡DESCUBRE LA NUEVA COLECCIÓN DE MARBELLÍN CON LA DISTRIBUIDORA DE LENCERÍA NORA! ELEGANCIA, ESTILO Y COMODIDAD SOLO PARA TI MUJER MODERNA Y EMPODERADA 💖
        </span>
        <span class="sliding-message">
          ¡DESCUBRE LA NUEVA COLECCIÓN DE MARBELLÍN CON LA DISTRIBUIDORA DE LENCERÍA NORA! ELEGANCIA, ESTILO Y COMODIDAD SOLO PARA TI MUJER MODERNA Y EMPODERADA 💖
        </span>
      </div>
    </div>
    
    <!-- Mensaje de bienvenida -->
    <section id="inicio">
      <h2>Bienvenidos a Distribuidora Lencería Nora</h2>
      <p>
        En Distribuidora Lencería Nora nos dedicamos a ofrecer productos de lencería de alta calidad, combinando elegancia, comodidad y estilo para la mujer moderna. Nuestro compromiso es brindar un servicio confiable y eficiente a nuestros distribuidores, asegurando entregas oportunas y apoyo constante, mientras generamos experiencias únicas que inspiran confianza, satisfacción y éxito compartido en cada compra.
      </p>
    </section>
    
    <!-- Productos nuevos -->
    <section class="product-section">
      <h2>Productos Nuevos</h2>
      <div class="carousel-container">
        @foreach($newProducts as $product)
          @php
            $images = $product->images;
            $mainImage = count($images) > 0 ? $images[0] : 'assets/img/default-product.png';
            $colorsCount = ($product->id % 3) + 1;
            $isDiscount = ($product->id % 2 == 0);
          @endphp
          <a class="producto" href="{{ route('products.show', $product->id) }}">
              <div class="product-image-wrapper">
                  <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}">
                  <span class="product-heart-btn" onclick="event.preventDefault();"><i class="far fa-heart"></i></span>
                  @if($isDiscount)
                      <span class="product-badge">-15%</span>
                  @else
                      <span class="product-badge new">NUEVO</span>
                  @endif
              </div>
              <div class="product-info-wrapper">
                  <span class="product-colors-info">{{ $colorsCount }} {{ $colorsCount > 1 ? 'COLORES' : 'COLOR' }}</span>
                  <h3 class="product-title">{{ $product->name }}</h3>
                  
                  <div class="product-price-row">
                      <span class="product-price-sale">S/{{ number_format($product->price_unit, 2) }}</span>
                      @if($isDiscount)
                          <span class="product-price-original">S/{{ number_format($product->price_unit * 1.15, 2) }}</span>
                      @endif
                  </div>
                  
                  <div class="product-card-icons">
                      <span class="card-icon-item"><i class="fas fa-truck"></i> Envío rápido</span>
                      <span class="card-icon-item"><i class="fas fa-credit-card"></i> Pago Seguro</span>
                  </div>
                  
                  <div class="product-card-coupon">
                      20% OFF llevando docena
                  </div>
              </div>
          </a>
        @endforeach
      </div>
    </section>
    
    <!-- Productos más vendidos -->
    <section class="product-section">
      <h2>Más vendidos</h2>
      <div class="carousel-container">
        @foreach($bestSellers as $product)
          @php
            $images = $product->images;
            $mainImage = count($images) > 0 ? $images[0] : 'assets/img/default-product.png';
            $colorsCount = ($product->id % 3) + 1;
            $isDiscount = ($product->id % 2 == 0);
          @endphp
          <a class="producto" href="{{ route('products.show', $product->id) }}">
              <div class="product-image-wrapper">
                  <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}">
                  <span class="product-heart-btn" onclick="event.preventDefault();"><i class="far fa-heart"></i></span>
                  @if($isDiscount)
                      <span class="product-badge">-15%</span>
                  @else
                      <span class="product-badge new">NUEVO</span>
                  @endif
              </div>
              <div class="product-info-wrapper">
                  <span class="product-colors-info">{{ $colorsCount }} {{ $colorsCount > 1 ? 'COLORES' : 'COLOR' }}</span>
                  <h3 class="product-title">{{ $product->name }}</h3>
                  
                  <div class="product-price-row">
                      <span class="product-price-sale">S/{{ number_format($product->price_unit, 2) }}</span>
                      @if($isDiscount)
                          <span class="product-price-original">S/{{ number_format($product->price_unit * 1.15, 2) }}</span>
                      @endif
                  </div>
                  
                  <div class="product-card-icons">
                      <span class="card-icon-item"><i class="fas fa-truck"></i> Envío rápido</span>
                      <span class="card-icon-item"><i class="fas fa-credit-card"></i> Pago Seguro</span>
                  </div>
                  
                  <div class="product-card-coupon">
                      20% OFF llevando docena
                  </div>
              </div>
          </a>
        @endforeach
      </div>
    <!-- Sección de Testimonios -->
    <section class="testimonials-section">
      <h2 class="testimonials-title">¿Qué dicen nuestras clientas?</h2>
      <p class="testimonials-subtitle">La satisfacción de nuestras clientas es nuestra mayor recompensa. Descubre por qué nos eligen.</p>
      
      <div class="testimonials-grid">
        <!-- Card 1 -->
        <div class="testimonial-card">
          <div class="stars">★★★★★</div>
          <p class="testimonial-text">"La calidad de los conjuntos y cacheteros es espectacular, las telas son súper suaves y frescas. El pedido me llegó a Trujillo en perfectas condiciones y muy rápido. ¡Totalmente recomendadas!"</p>
          <div class="testimonial-user">
            <div class="user-avatar">MR</div>
            <div class="user-info">
              <h4>María Rodríguez</h4>
              <span>Cliente Satisfecha</span>
            </div>
          </div>
        </div>
        
        <!-- Card 2 -->
        <div class="testimonial-card">
          <div class="stars">★★★★★</div>
          <p class="testimonial-text">"Excelente atención al cliente por WhatsApp. Me asesoraron con las tallas de los bikinis y el calce es perfecto. La temática y los precios por docena son insuperables para mi negocio."</p>
          <div class="testimonial-user">
            <div class="user-avatar">AC</div>
            <div class="user-info">
              <h4>Ana Chang</h4>
              <span>Emprendedora Mayorista</span>
            </div>
          </div>
        </div>
        
        <!-- Card 3 -->
        <div class="testimonial-card">
          <div class="stars">★★★★★</div>
          <p class="testimonial-text">"Hice mi compra para Lima contra entrega y todo llegó impecable. La lencería tiene diseños hermosos que se adaptan súper bien y son comodísimos para el día a día. ¡Definitivamente volveré a comprar!"</p>
          <div class="testimonial-user">
            <div class="user-avatar">JS</div>
            <div class="user-info">
              <h4>Juana Sánchez</h4>
              <span>Cliente Fiel</span>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
<script type="module" src="{{ asset('js/portadaSlider.js') }}"></script>
@endsection
