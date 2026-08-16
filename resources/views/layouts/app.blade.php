<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/icons/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap">
    <link rel="stylesheet" href="{{ asset('css/base/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/variable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/headerbusqueda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/headercarrito.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/headerhamburgesa.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/whatsapp.css') }}">
    
    <title>@yield('title', 'Distribuidora De Marbellín - Lencería Nora')</title>
    
    <script src="{{ asset('js/headerBanner.js') }}"></script>
    @yield('styles')
</head>
<body>

<header>
<nav>
  <!-- FILA SUPERIOR -->
  <div class="fila-superior">
    <!-- Menú hamburguesa (solo móvil, far-left) -->
    <div id="menuToggle" class="icono-hamburguesa" aria-label="Menú móvil">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Left: Brand Logo -->
    <a href="{{ route('home') }}" class="logo-container">
        <img id="logo" src="{{ asset('assets/icons/logolencerianora.png') }}" alt="Logo de Marbellin">
    </a>

    <!-- Center: Navigation Links (Desktop only) -->
    <ul class="nav-links-desktop-center">
      <li><a href="{{ route('home') }}">Inicio</a></li>
      <li class="dropdown">
        <a href="{{ route('products.index') }}">Productos ▾</a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('products.index', ['cat' => 'cachetero']) }}">Cachetero</a></li>
          <li><a href="{{ route('products.index', ['cat' => 'bikini']) }}">Bikini</a></li>
          <li><a href="{{ route('products.index', ['cat' => 'semihilo']) }}">Semi Hilo</a></li>
          <li><a href="{{ route('products.index', ['cat' => 'topsito']) }}">Topsito</a></li>
        </ul>
      </li>
      <li><a href="{{ route('page.marbelover') }}">Sé una Marbelover</a></li>
      <li><a href="{{ route('page.contacto') }}">Contacto</a></li>
      <li><a href="{{ route('page.catalogo') }}">Nuestro Catálogo</a></li>
    </ul>
    
    <!-- Right: Search Bar + Icons -->
    <div class="nav-right-container">
        <form action="{{ route('products.index') }}" method="GET" class="buscador-cabecera">
            <div class="buscador-input-wrapper">
                <i class="fas fa-search" onclick="this.closest('form').submit();"></i>
                <input type="text" name="buscar" placeholder="Buscar productos..." autocomplete="off" value="{{ request('buscar') }}" />
            </div>
            <button type="submit" class="boton-buscar-submit">Buscar</button>
        </form>
        
        <div class="iconos">
            <!-- Buscar (solo visible en móvil) -->
            <a href="javascript:void(0)" id="toggle-buscador-movil" class="icono-item movil-only" aria-label="Buscar">
                <i class="fas fa-search"></i>
            </a>

            <!-- Usuario (icono simplificado como el mock) -->
            <div id="usuarioToggle" class="icono-item" aria-label="Menú usuario" onclick="handleUserClick()">
                <i class="far fa-user"></i>
            </div>

            <!-- Favoritos / Wishlist (como el mock) -->
            <a href="javascript:void(0)" class="icono-item movil-only" aria-label="Favoritos">
                <i class="far fa-heart"></i>
            </a>

            <!-- Contenedor carrito -->
            <div class="contenedor-carrito-hover">
                <!-- Icono carrito -->
                <a href="javascript:void(0)" id="abrir-carrito" class="icono-item">
                    <i class="fas fa-shopping-cart icono-carrito"></i>
                </a>
    
                <!-- Mini carrito -->
                <div class="mini-carrito" id="mini-carrito">
                    <a href="javascript:void(0)" class="cerrar-carrito" id="cerrar-carrito">&times;</a>
                    <h3 class="titulo-carrito">Mi Carrito</h3>
                    <ul class="lista-carrito"></ul>
                    <div class="subtotal-general" id="subtotal-general">
                        <strong>Subtotal:</strong> S/. 0.00
                    </div>
                    <div class="acciones-carrito">
                        <button class="btn-ver-carrito" onclick="window.location.href='{{ route('cart.checkout') }}'">Ver carrito</button>
                        <button class="btn-continuar" id="btn-continuar-comprando">Continuar comprando</button>
                        <button class="btn-ir-a-pagar" onclick="window.location.href='{{ route('cart.checkout') }}'">Ir a pagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Menú de navegación móvil -->
  <div class="fila-inferior">
    <ul id="menuNav" class="menu-nav">
      <li><a href="{{ route('home') }}">Inicio</a></li>
      <li class="dropdown">
        <a href="{{ route('products.index') }}">Productos ▾</a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('products.index', ['cat' => 'cachetero']) }}">Cachetero</a></li>
          <li><a href="{{ route('products.index', ['cat' => 'bikini']) }}">Bikini</a></li>
          <li><a href="{{ route('products.index', ['cat' => 'semihilo']) }}">Semi Hilo</a></li>
          <li><a href="{{ route('products.index', ['cat' => 'topsito']) }}">Topsito</a></li>
        </ul>
      </li>
      <li><a href="{{ route('page.marbelover') }}">Sé una Marbelover</a></li>
      <li><a href="{{ route('page.contacto') }}">Contacto</a></li>
      <li><a href="{{ route('page.catalogo') }}">Nuestro Catálogo</a></li>
    </ul>
  </div>
  <div id="searchOverlay" class="search-modal-overlay" style="display: none;"></div>
</nav>
</header>

<main>
    @if(session('success'))
        <div class="alert-success" style="background-color: #d4edda; color: #155724; padding: 15px; text-align: center; border: 1px solid #c3e6cb; border-radius: 4px; margin: 15px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 15px; text-align: center; border: 1px solid #f5c6cb; border-radius: 4px; margin: 15px;">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

    <!-- Whatsapp flotante -->
    <div class="whatsapp-float">
      <a href="https://wa.me/51976553014" target="_blank" class="whatsapp-bubble">
        <span>¿Necesitas ayuda? Conversemos</span>
        <div class="whatsapp-button">
          <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" />
        </div>
      </a>
    </div>
</main>

<footer class="clean-footer">
    <div class="clean-footer-container">
        <!-- Col 1: Nosotros -->
        <div class="clean-footer-col">
            <h4>Nosotros</h4>
            <ul>
                <li><a href="{{ route('page.nosotros') }}">Sobre nosotros</a></li>
                <li><a href="{{ route('page.distribuidora') }}">Distribuidores</a></li>
                <li><a href="{{ route('page.marbelover') }}">Sé una Marbelover</a></li>
            </ul>
        </div>
        
        <!-- Col 2: Servicio al Cliente -->
        <div class="clean-footer-col">
            <h4>Servicio al Cliente</h4>
            <ul>
                <li><a href="{{ route('page.contacto') }}">Contáctanos</a></li>
                <li><a href="{{ route('page.tarifaenvio') }}">Tarifa de envío</a></li>
                <li><a href="{{ route('page.preguntas') }}">Preguntas frecuentes</a></li>
            </ul>
        </div>
        
        <!-- Col 3: Políticas y Términos -->
        <div class="clean-footer-col">
            <h4>Políticas y Términos</h4>
            <ul>
                <li><a href="{{ route('page.terminos') }}">Términos y condiciones</a></li>
                <li><a href="{{ route('page.privacidad') }}">Política de privacidad</a></li>
                <li><a href="{{ route('page.cambios') }}">Cambios y Devoluciones</a></li>
            </ul>
        </div>
        
        <!-- Col 4: Contáctanos (Info de contacto) -->
        <div class="clean-footer-col">
            <h4>Contáctanos</h4>
            <p><strong>Tienda 1:</strong> Jr. América 325, Tienda 2, La Victoria.</p>
            <p><strong>Tienda 2:</strong> Jr. Hipólito Unanue 1457, La Victoria.</p>
            <p><strong>Teléfono:</strong> +51 976553014</p>
            <p><strong>Correo:</strong> lencerianora2026@gmail.com</p>
        </div>
        
        <!-- Col 5: Libro de Reclamaciones Badge -->
        <div class="clean-footer-col" style="align-items: center; justify-content: center;">
            <a href="{{ route('page.reclamaciones') }}" class="libro-reclamaciones-badge" style="padding: 10px; background: white; border-radius: 8px; display: inline-block;">
                <img src="{{ asset('assets/img/LIBRODERECLAMACIONES.png') }}" style="max-width: 150px; height: auto; display: block; border-radius: 4px;" alt="Libro de reclamaciones">
            </a>
        </div>
    </div>
    
    <hr class="clean-footer-divider">
    
    <div class="clean-footer-bottom">
        <div class="clean-footer-social">
            <a href="https://www.facebook.com/share/16LxCFavzs/" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" />
            </a>
            <a href="https://www.instagram.com/marbellin_lenceria" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram" />
            </a>
            <a href="https://www.tiktok.com/@maribellin.lenceria" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/3046/3046122.png" alt="TikTok" />
            </a>
            <a href="https://youtube.com/@lenceria_de_dama_2024" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube" />
            </a>
        </div>
        <p>&copy; 2025 Distribuidora Lencería Nora. Todos los derechos reservados.</p>
    </div>
</footer>

<!-- Modal de Inicio de Sesión / Registro (Plaza28 Style overlay) -->
<div id="loginModal" class="login-modal-overlay" style="display: none;">
    <div class="login-modal-card">
        <a href="javascript:void(0)" class="login-modal-close" onclick="closeLoginModal()">&times;</a>
        
        <!-- SECCIÓN DE INICIO DE SESIÓN -->
        <div id="modal-login-section">
            <div class="login-modal-header">
                <img src="{{ asset('assets/icons/logolencerianora.png') }}" alt="Lencería Nora" class="login-modal-logo">
                <h3>¡Bienvenido a Lencería Nora!</h3>
            </div>
            
            <form action="{{ route('auth.login.submit') }}" method="POST">
                @csrf
                <div class="login-modal-field">
                    <label for="modal-email">Correo electrónico</label>
                    <input type="email" id="modal-email" name="email" placeholder="tucorreo@email.com" required>
                </div>
                <div class="login-modal-field">
                    <label for="modal-password">Contraseña</label>
                    <input type="password" id="modal-password" name="password" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="login-modal-submit-btn">Ingresar</button>
            </form>
            
            <div style="text-align: center; margin-top: 15px; margin-bottom: 5px;">
                <a href="javascript:void(0)" onclick="closeLoginModal()" style="color: #c05c6d; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; transition: color 0.3s;" onmouseover="this.style.color='#804d58'" onmouseout="this.style.color='#c05c6d'">
                    <i class="fas fa-user"></i> Continuar como invitado
                </a>
            </div>
            
            <div class="login-modal-footer">
                <p>¿No tienes una cuenta? <a href="javascript:void(0)" onclick="showRegisterSection()">Regístrate aquí</a></p>
            </div>
        </div>

        <!-- SECCIÓN DE REGISTRO -->
        <div id="modal-register-section" style="display: none;">
            <div class="login-modal-header">
                <img src="{{ asset('assets/icons/logolencerianora.png') }}" alt="Lencería Nora" class="login-modal-logo">
                <h3>Crear Cuenta</h3>
            </div>
            
            <form action="{{ route('auth.register.submit') }}" method="POST">
                @csrf
                <div class="login-modal-field">
                    <label for="modal-reg-name">Nombre completo</label>
                    <input type="text" id="modal-reg-name" name="name" placeholder="Tu nombre" required>
                </div>
                <div class="login-modal-field">
                    <label for="modal-reg-email">Correo electrónico</label>
                    <input type="email" id="modal-reg-email" name="email" placeholder="tucorreo@email.com" required>
                </div>
                <div class="login-modal-field">
                    <label for="modal-reg-password">Contraseña</label>
                    <input type="password" id="modal-reg-password" name="password" placeholder="••••••••" required>
                </div>
                <div class="login-modal-field">
                    <label for="modal-reg-confirm">Confirmar contraseña</label>
                    <input type="password" id="modal-reg-confirm" name="password_confirmation" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="login-modal-submit-btn">Registrarse</button>
            </form>
            
            <div class="login-modal-footer" style="margin-top: 15px;">
                <p>¿Ya tienes una cuenta? <a href="javascript:void(0)" onclick="showLoginSection()">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script type="module" src="{{ asset('js/cart/main-carrito.js') }}"></script>
<script type="module" src="{{ asset('js/search/buscador.js') }}"></script>
<script type="module" src="{{ asset('js/login.js') }}"></script>
<script type="module" src="{{ asset('js/usuario.js') }}"></script>

<script>
function handleUserClick() {
    @guest
        showLoginSection();
        document.getElementById('loginModal').classList.add('show');
    @else
        window.location.href = "{{ route('auth.profile') }}";
    @endguest
}
function closeLoginModal() {
    document.getElementById('loginModal').classList.remove('show');
}
function showRegisterSection() {
    document.getElementById('modal-login-section').style.display = 'none';
    document.getElementById('modal-register-section').style.display = 'block';
}
function showLoginSection() {
    document.getElementById('modal-register-section').style.display = 'none';
    document.getElementById('modal-login-section').style.display = 'block';
}

document.addEventListener("DOMContentLoaded", function() {
    const toggleSearch = document.getElementById("toggle-buscador-movil");
    const buscador = document.querySelector(".buscador-cabecera");
    const overlay = document.getElementById("searchOverlay");
    
    function toggleSearchState() {
        const isShown = buscador.classList.toggle("mostrar-movil");
        overlay.style.display = isShown ? "block" : "none";
        document.body.style.overflow = isShown ? "hidden" : "";
    }

    if (toggleSearch && buscador && overlay) {
        toggleSearch.addEventListener("click", function(e) {
            e.stopPropagation();
            toggleSearchState();
        });
        
        overlay.addEventListener("click", function(e) {
            e.stopPropagation();
            buscador.classList.remove("mostrar-movil");
            overlay.style.display = "none";
            document.body.style.overflow = "";
        });
    }
});
</script>

@yield('scripts')

</body>
</html>
