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
/* Sección Tiendas */
.tiendas-section {
    padding: 60px 20px;
    max-width: 1200px;
    margin: 0 auto 40px auto;
    text-align: center;
}
.tiendas-title {
    font-family: 'Playfair Display', serif;
    color: #5e2129; /* Vino */
    font-size: 32px;
    margin-bottom: 12px;
}
.tiendas-subtitle {
    color: #555;
    font-size: 16px;
    margin-bottom: 40px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}
.tiendas-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}
@media (max-width: 800px) {
    .tiendas-grid {
        grid-template-columns: 1fr;
    }
}
.tienda-card {
    background: #fffdfd; /* Blanco cálido */
    border: 1px solid #f4e3e6; /* Rosa empolvado */
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(94, 33, 41, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}
.tienda-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(94, 33, 41, 0.12);
}
.tienda-img-wrap {
    position: relative;
    width: 100%;
    height: 350px;
    overflow: hidden;
    cursor: zoom-in;
}
.tienda-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}
.tienda-card:hover .tienda-img-wrap img {
    transform: scale(1.05);
}
.tienda-img-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40%;
    background: linear-gradient(to top, rgba(94,33,41,0.6) 0%, transparent 100%);
    pointer-events: none;
}
.tienda-info {
    padding: 25px;
    text-align: left;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.tienda-label {
    display: inline-block;
    background: #d4af37; /* Dorado */
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 12px;
    letter-spacing: 1px;
    align-self: flex-start;
}
.tienda-address {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    line-height: 1.4;
    display: flex;
    align-items: flex-start;
    gap: 8px;
}
.tienda-address i {
    color: #5e2129;
    margin-top: 3px;
}
.tienda-actions {
    display: flex;
    gap: 12px;
    margin-top: auto;
}
@media (max-width: 480px) {
    .tienda-actions {
        flex-direction: column;
    }
}
.btn-tienda {
    flex: 1;
    padding: 12px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}
.btn-mapa {
    background: #fff;
    color: #5e2129;
    border: 1px solid #5e2129;
}
.btn-mapa:hover {
    background: #5e2129;
    color: #fff;
}
.btn-wsp {
    background: #25D366;
    color: #fff;
    border: 1px solid #25D366;
}
.btn-wsp:hover {
    background: #1ebc59;
    border-color: #1ebc59;
}

/* Modal de Imagen */
.img-modal {
    display: none;
    position: fixed;
    z-index: 99999;
    padding-top: 50px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(5px);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.img-modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    opacity: 1;
}
.img-modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90%;
    border-radius: 8px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.5);
    transform: scale(0.95);
    transition: transform 0.3s ease;
}
.img-modal.show .img-modal-content {
    transform: scale(1);
}
.img-modal-close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    line-height: 1;
    z-index: 100000;
}
.img-modal-close:hover,
.img-modal-close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
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
    </section>

    <!-- Sección Tiendas -->
    <section class="tiendas-section">
      <h2 class="tiendas-title">Visita nuestras tiendas</h2>
      <p class="tiendas-subtitle">Conoce nuestros productos, colores y precios especiales directamente en nuestras tiendas de La Victoria. Te esperamos con atención personalizada para compras individuales y por mayor.</p>
      
      <div class="tiendas-grid">
        <!-- Tarjeta Tienda 1 -->
        <div class="tienda-card">
          <div class="tienda-img-wrap" onclick="openTiendaModal(this)">
            <img src="{{ asset('assets/img/portada/Tienda1HipólitoUnanue.png') }}" alt="Fotografía real de la Tienda 1 de Lencería Nora en Jr. Hipólito Unanue 1457" loading="lazy">
            <div class="tienda-img-overlay"></div>
          </div>
          <div class="tienda-info">
            <span class="tienda-label">Tienda 1</span>
            <div class="tienda-address">
              <i class="fas fa-map-marker-alt"></i>
              <span>Jr. Hipólito Unanue 1457, La Victoria</span>
            </div>
            <div class="tienda-actions">
              <a href="https://www.google.com/maps/search/?api=1&query=Jr.+Hip%C3%B3lito+Unanue+1457,+La+Victoria,+Lima,+Per%C3%BA" target="_blank" rel="noopener noreferrer" class="btn-tienda btn-mapa">
                <i class="fas fa-directions"></i> Cómo llegar
              </a>
              <a href="https://wa.me/51977228430?text=Hola,%20deseo%20informaci%C3%B3n%20sobre%20la%20Tienda%201%20ubicada%20en%20Jr.%20Hip%C3%B3lito%20Unanue%201457." target="_blank" rel="noopener noreferrer" class="btn-tienda btn-wsp">
                <i class="fab fa-whatsapp"></i> Consultar por WhatsApp
              </a>
            </div>
          </div>
        </div>

        <!-- Tarjeta Tienda 2 -->
        <div class="tienda-card">
          <div class="tienda-img-wrap" onclick="openTiendaModal(this)">
            <img src="{{ asset('assets/img/portada/Tienda2América325.png') }}" alt="Fotografía real de la Tienda 2 de Lencería Nora en Jr. América 325 int. 2-3" loading="lazy">
            <div class="tienda-img-overlay"></div>
          </div>
          <div class="tienda-info">
            <span class="tienda-label">Tienda 2</span>
            <div class="tienda-address">
              <i class="fas fa-map-marker-alt"></i>
              <span>Jr. América 325 int. 2-3, La Victoria</span>
            </div>
            <div class="tienda-actions">
              <a href="https://www.google.com/maps/search/?api=1&query=Jr.+Am%C3%A9rica+325+int.+2-3,+La+Victoria,+Lima,+Per%C3%BA" target="_blank" rel="noopener noreferrer" class="btn-tienda btn-mapa">
                <i class="fas fa-directions"></i> Cómo llegar
              </a>
              <a href="https://wa.me/51977228430?text=Hola,%20deseo%20informaci%C3%B3n%20sobre%20la%20Tienda%202%20ubicada%20en%20Jr.%20Am%C3%A9rica%20325%20int.%202-3." target="_blank" rel="noopener noreferrer" class="btn-tienda btn-wsp">
                <i class="fab fa-whatsapp"></i> Consultar por WhatsApp
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal para las fotos de tiendas -->
    <div id="tiendaModal" class="img-modal">
      <span class="img-modal-close" onclick="closeTiendaModal()">&times;</span>
      <img class="img-modal-content" id="imgModalTarget">
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
<script>
function openTiendaModal(element) {
    const modal = document.getElementById('tiendaModal');
    const modalImg = document.getElementById('imgModalTarget');
    const img = element.querySelector('img');
    modal.classList.add('show');
    modalImg.src = img.src;
}
function closeTiendaModal() {
    const modal = document.getElementById('tiendaModal');
    modal.classList.remove('show');
}
// Close on click outside
document.getElementById('tiendaModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeTiendaModal();
    }
});
// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") {
        const modal = document.getElementById('tiendaModal');
        if (modal.classList.contains('show')) {
            closeTiendaModal();
        }
    }
});
</script>
@endsection
