// js/usuario.js

// --- ELEMENTOS ---
const usuarioToggle = document.getElementById('usuarioToggle');
const menuUsuario = document.getElementById('menuUsuario');

// --- FUNCION PARA CAPITALIZAR NOMBRES ---
function capitalizar(texto) {
  if (!texto) return "";
  return texto
    .split(" ")
    .map(palabra => palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase())
    .join(" ");
}

// --- DETECTAR RUTA ---
const enPages = window.location.pathname.includes("/pages/");
const ruta = (archivo) => enPages ? archivo : `pages/${archivo}`;

// --- SINCRONIZAR USUARIO ACTUAL CON LISTA DE USUARIOS ---
function sincronizarUsuarioActual(usuarioActual) {
  if (!usuarioActual) return;

  const usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
  const idx = usuarios.findIndex(u => u.correo === usuarioActual.correo || u.dni === usuarioActual.dni);
  if (idx !== -1) {
    usuarios[idx] = { ...usuarios[idx], ...usuarioActual };
    localStorage.setItem("usuarios", JSON.stringify(usuarios));
  }
}

// --- RENDER DEL MENÚ DE USUARIO ---
function renderMenuUsuario(usuarioParam) {
  if (!menuUsuario) return;

  // Usamos el usuario pasado por parámetro, o lo obtenemos de localStorage
  const usuario = usuarioParam || JSON.parse(localStorage.getItem("usuarioActual"));

  if (usuario) {
    sincronizarUsuarioActual(usuario);

    const nombre = capitalizar(usuario.nombres);
    const apellido = capitalizar(usuario.apellidos);

    menuUsuario.classList.add('menu-usuario');
    menuUsuario.innerHTML = `
      <li>
        <p>
          ¡Bienvenido, 
          <span class="nombre-usuario">${nombre || 'Usuario'} ${apellido || ''}</span>!<br>
          Nos alegra verte en 
          <span class="distribuidora">Distribuidora Lencería Nora</span>.
        </p>
      </li>
      <li><a href="${ruta('perfil.html')}" id="linkPerfil" class="btn-menu-login">Mi perfil</a></li>
      <li><button id="btnCerrarSesion" class="btn-menu-login">Cerrar sesión</button></li>
    `;

    const btnCerrar = document.getElementById("btnCerrarSesion");
    btnCerrar?.addEventListener("click", () => {
      localStorage.removeItem("usuarioActual");
      menuUsuario.classList.remove('show');
      window.location.href = enPages ? "../index.html" : "index.html";
    });

    const linkPerfil = document.getElementById("linkPerfil");
    linkPerfil?.addEventListener("click", (e) => {
      e.preventDefault();
      menuUsuario.classList.remove('show');
      const href = linkPerfil.getAttribute('href');
      setTimeout(() => window.location.href = href, 50);
    });

  } else {
    menuUsuario.classList.add('menu-usuario');
    menuUsuario.innerHTML = `
      <li>
        <a href="${ruta('login.html')}" class="btn-menu-login">Iniciar sesión</a>
      </li>
    `;
  }

  menuUsuario.classList.remove('show');
}

// --- EVENTOS DE ACTUALIZACIÓN ---
window.addEventListener("storage", (e) => {
  if (e.key === "usuarioActual") renderMenuUsuario();
});
window.addEventListener("usuarioActualizado", (e) => {
  renderMenuUsuario(e.detail);
});

// --- TOGGLE MENÚ ---
usuarioToggle?.addEventListener('click', (e) => {
  e.stopPropagation();
  if (!menuUsuario) return;

  if (window.innerWidth >= 769) {
    const rect = usuarioToggle.getBoundingClientRect();
    menuUsuario.style.position = 'absolute';
    menuUsuario.style.top = rect.bottom + window.scrollY + 5 + 'px';
    menuUsuario.style.right = window.innerWidth - rect.right + 'px';
    menuUsuario.style.left = 'auto';
  } else {
    menuUsuario.style.position = 'relative';
    menuUsuario.style.top = 'auto';
    menuUsuario.style.left = 'auto';
    menuUsuario.style.right = 'auto';
  }

  menuUsuario.classList.toggle('show');
});

// --- CERRAR MENÚ AL HACER CLIC FUERA ---
document.addEventListener('click', (e) => {
  if (!usuarioToggle?.contains(e.target) && !menuUsuario?.contains(e.target)) {
    menuUsuario?.classList.remove('show');
  }
});

// --- AJUSTAR AL REDIMENSIONAR ---
window.addEventListener('resize', () => menuUsuario?.classList.remove('show'));

// --- RENDER INICIAL ---
renderMenuUsuario();