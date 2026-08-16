document.addEventListener("DOMContentLoaded", () => {
  const loginContainer = document.getElementById("loginContainer");
  const registroContainer = document.getElementById("registroContainer");
  const recuperarContainer = document.getElementById("recuperarContainer");

  const mostrarRegistro = document.getElementById("mostrarRegistro");
  const mostrarLoginDesdeRegistro = document.getElementById("mostrarLogin");
  const olvidarContrasena = document.getElementById("olvidarContrasena");
  const volverLoginDesdeRecuperar = document.getElementById("volverLogin");

  const formRegistro = document.getElementById("formRegistro");
  const formLogin = document.getElementById("formLogin");
  const formRecuperar = document.getElementById("formRecuperar");

  const codigoSimulado = document.getElementById("codigoSimulado");
  const enviarCodigoBtn = document.getElementById("enviarCodigo");
  const verificarCodigoBtn = document.getElementById("verificarCodigo");
  const inputUsuarioRecuperar = document.getElementById("usuarioRecuperar");
  const inputCodigoVerificacion = document.getElementById("codigoVerificacion");

  const nuevaContrasenaContainer = document.getElementById("nuevaContrasenaContainer");
  const inputNuevaContrasena = document.getElementById("nuevaContrasena");
  const inputConfirmarNueva = document.getElementById("confirmarNuevaContrasena");
  const actualizarContrasenaBtn = document.getElementById("actualizarContrasena");

  let usuarioRecuperar = null;
  let codigoGenerado = "";

  const params = new URLSearchParams(window.location.search);
  const desdeCheckout = params.get("origen") === "checkout";

  function validarCorreo(correo) {
    return /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/.test(correo);
  }

  function redirigirPostLogin() {
    if (desdeCheckout) {
      window.location.href = "checkout.html";
    } else {
      window.location.href = "../index.html";
    }
  }

  // ---------------------- MOSTRAR/OCULTAR FORMULARIOS ----------------------
  mostrarRegistro.addEventListener("click", e => {
    e.preventDefault();
    loginContainer.style.display = "none";
    registroContainer.style.display = "block";
    if (recuperarContainer) recuperarContainer.style.display = "none";
    formRegistro.reset();
  });

  mostrarLoginDesdeRegistro.addEventListener("click", e => {
    e.preventDefault();
    registroContainer.style.display = "none";
    loginContainer.style.display = "block";
  });

  olvidarContrasena && olvidarContrasena.addEventListener("click", e => {
    e.preventDefault();
    loginContainer.style.display = "none";
    if (registroContainer) registroContainer.style.display = "none";
    if (recuperarContainer) recuperarContainer.style.display = "block";

    formRecuperar.style.display = "flex";
    nuevaContrasenaContainer.style.display = "none";
    codigoSimulado.innerHTML = "";
    inputUsuarioRecuperar.value = "";
    inputCodigoVerificacion.value = "";
    usuarioRecuperar = null;
    codigoGenerado = "";
  });

  volverLoginDesdeRecuperar && volverLoginDesdeRecuperar.addEventListener("click", e => {
    e.preventDefault();
    recuperarContainer.style.display = "none";
    loginContainer.style.display = "block";
  });

  // ---------------------- REGISTRO ----------------------
  formRegistro && formRegistro.addEventListener("submit", e => {
    e.preventDefault();
    const nombres = document.getElementById("nombres").value.trim();
    const apellidos = document.getElementById("apellidos").value.trim();
    const dni = document.getElementById("dni").value.trim();
    const correo = document.getElementById("correo").value.trim();
    const telefono = document.getElementById("telefono").value.trim();
    const departamento = document.getElementById("departamento").value;
    const provincia = document.getElementById("provincia").value;
    const distrito = document.getElementById("distrito").value;
    const contrasena = document.getElementById("contrasena").value;
    const confirmarContrasena = document.getElementById("confirmarContrasena").value;

    if (!/^\d{8}$/.test(dni)) { alert("El DNI debe contener 8 dígitos."); return; }
    if (!validarCorreo(correo)) { alert('Ingrese un correo válido, por ejemplo: usuario@gmail.com o usuario@hotmail.com'); return; }
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(contrasena)) { 
      alert("La contraseña debe tener al menos 8 caracteres, incluyendo mayúscula, minúscula y número."); 
      return; 
    }
    if (contrasena !== confirmarContrasena) { alert("Las contraseñas no coinciden."); return; }

    let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    if (usuarios.some(u => u.correo === correo)) { alert("Este correo ya está registrado."); return; }
    if (usuarios.some(u => u.dni === dni)) { alert("Este DNI ya está registrado."); return; }

    usuarios.push({ nombres, apellidos, dni, correo, telefono, departamento, provincia, distrito, contrasena });
    localStorage.setItem("usuarios", JSON.stringify(usuarios));

    alert("Cuenta registrada exitosamente ✅");
    formRegistro.reset();
    registroContainer.style.display = "none";

    window.location.href = desdeCheckout ? "login.html?origen=checkout" : "login.html";
  });

  // ---------------------- LOGIN ----------------------
  formLogin && formLogin.addEventListener("submit", e => {
    e.preventDefault();
    const usuarioInput = document.getElementById("usuarioLogin").value.trim();
    const contrasena = document.getElementById("contrasenaLogin").value;

    if (!usuarioInput || !contrasena) { alert("Complete todos los campos."); return; }

    const usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    const usuarioEncontrado = usuarios.find(u => u.correo === usuarioInput || u.dni === usuarioInput);

    if (!usuarioEncontrado) { alert("Usuario no encontrado."); return; }
    if (usuarioEncontrado.contrasena !== contrasena) { alert("Contraseña incorrecta."); return; }

    // --- Guardar solo datos personales y NO modificar correo/DNI ---
    const { nombres, apellidos, telefono, departamento, provincia, distrito, correo, dni } = usuarioEncontrado;
    const usuarioActual = { nombres, apellidos, telefono, departamento, provincia, distrito, correo, dni };
    localStorage.setItem("usuarioActual", JSON.stringify(usuarioActual));

    redirigirPostLogin();
  });

  // ---------------------- RECUPERACIÓN DE CONTRASEÑA ----------------------
  enviarCodigoBtn && enviarCodigoBtn.addEventListener("click", () => {
    const usuarioInput = inputUsuarioRecuperar.value.trim();
    if (!usuarioInput) { 
      alert("Ingrese su correo o DNI."); 
      return; 
    }

    const usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    usuarioRecuperar = usuarios.find(u => u.correo === usuarioInput || u.dni === usuarioInput);
    if (!usuarioRecuperar) { 
      alert("No se encontró un usuario con esos datos."); 
      return; 
    }

    codigoGenerado = Math.floor(100000 + Math.random() * 900000).toString();
    codigoSimulado.innerHTML = `<strong>Tu código de verificación:</strong> <span id="codigoGenerado">${codigoGenerado}</span>`;
    alert("✅ Código enviado. Revisa abajo el recuadro.");
  });

  verificarCodigoBtn && verificarCodigoBtn.addEventListener("click", () => {
    if (!usuarioRecuperar || !codigoGenerado) {
      alert("Primero ingrese un correo o DNI válido y envíe el código.");
      return;
    }

    if (inputCodigoVerificacion.value.trim() === codigoGenerado) {
      alert("✅ Código verificado. Ingresa tu nueva contraseña.");
      nuevaContrasenaContainer.style.display = "flex";
    } else {
      alert("❌ Código incorrecto. Intenta nuevamente.");
    }
  });

  actualizarContrasenaBtn && actualizarContrasenaBtn.addEventListener("click", () => {
    const nueva = inputNuevaContrasena.value.trim();
    const confirmar = inputConfirmarNueva.value.trim();

    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(nueva)) {
      alert("La contraseña debe tener al menos 8 caracteres, incluyendo mayúscula, minúscula y número.");
      return;
    }

    if (usuarioRecuperar.contrasena && nueva === usuarioRecuperar.contrasena) {
      alert("La nueva contraseña no puede ser igual a la anterior.");
      return;
    }

    if (nueva !== confirmar) {
      alert("Las contraseñas no coinciden.");
      return;
    }

    const usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    const idx = usuarios.findIndex(u => u.correo === usuarioRecuperar.correo || u.dni === usuarioRecuperar.dni);
    if (idx !== -1) {
      usuarios[idx].contrasena = nueva;
      localStorage.setItem("usuarios", JSON.stringify(usuarios));
      alert("✅ Contraseña actualizada correctamente. Ahora puedes iniciar sesión.");

      inputNuevaContrasena.value = "";
      inputConfirmarNueva.value = "";
      nuevaContrasenaContainer.style.display = "none";
      recuperarContainer.style.display = "none";
      loginContainer.style.display = "block";
      codigoSimulado.innerHTML = "";
      codigoGenerado = "";
      inputCodigoVerificacion.value = "";
      inputUsuarioRecuperar.value = "";
    }
  });

  // ---------------------- SOLO NÚMEROS EN DNI ----------------------
  const inputDni = document.getElementById("dni");
  inputDni && inputDni.addEventListener("input", () => { inputDni.value = inputDni.value.replace(/\D/g, ""); });

  // ---------------------- MOSTRAR/OCULTAR CONTRASEÑA ----------------------
  document.querySelectorAll(".toggle-password").forEach(btn => {
    btn.addEventListener("click", () => {
      const targetId = btn.getAttribute("data-target");
      const input = document.getElementById(targetId);

      if (input.type === "password") {
        input.type = "text";
        btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
      } else {
        input.type = "password";
        btn.innerHTML = '<i class="fas fa-eye"></i>';
      }
    });
  });
});