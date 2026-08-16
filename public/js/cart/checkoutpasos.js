// checkoutPasos.js
import { obtenerValor, setReadonly, toggleClase, toggleEntrega } from './checkout.js';

export function mostrarPaso(n) {
  // Mostrar solo el paso activo
  document.querySelectorAll(".formulario-paso").forEach((p, i) => {
    p.classList.toggle("activo", i === n - 1);
  });

  // Actualizar barra de progreso
  document.querySelectorAll(".barra-progreso .paso").forEach((i, idx) => {
    i.classList.toggle("activo", idx === n - 1);
  });

  // 🧹 Limpiar errores visuales al cambiar de paso
  document.querySelectorAll(".error-msg").forEach(msg => msg.remove());
  document.querySelectorAll(".input-error").forEach(el => el.classList.remove("input-error"));
}

export function cargarDatosUsuario() {
  const usuarioActual = JSON.parse(localStorage.getItem("usuarioActual"));
  const campos = ['nombres', 'apellidos', 'correo', 'dni', 'telefono'];

  const btnEditar = document.getElementById("editar-datos");
  const btnGuardar = document.getElementById("guardar-datos");
  const btnCancelar = document.getElementById("cancelar-edicion");
  const btnLimpiar = document.getElementById("limpiar-datos");
  const btnSiguiente = document.getElementById("siguiente-inicial");

  if (usuarioActual) {
    // Si hay datos guardados, bloquear los campos
    campos.forEach(id => {
      const input = document.getElementById(id);
      if (input) {
        input.value = usuarioActual[id] || '';
        input.setAttribute("readonly", true);
      }
    });
    btnEditar?.classList.remove("oculto");
    btnSiguiente?.classList.remove("oculto");
    btnGuardar?.classList.add("oculto");
    btnCancelar?.classList.add("oculto");
    btnLimpiar?.classList.add("oculto");
  } else {
    // Si no hay datos guardados, dejar los campos libres
    campos.forEach(id => {
      const input = document.getElementById(id);
      if (input) {
        input.value = '';
        input.removeAttribute("readonly");
      }
    });
    btnEditar?.classList.add("oculto");
    btnGuardar?.classList.add("oculto");
    btnCancelar?.classList.add("oculto");
    btnLimpiar?.classList.remove("oculto");
    btnSiguiente?.classList.remove("oculto");
  }
}

export function inicializarOpcionesEntrega() {
  document.getElementById("btn-delivery")?.addEventListener("click", () => {
    toggleEntrega("delivery");
    limpiarErroresGlobales();
  });
  document.getElementById("btn-tienda")?.addEventListener("click", () => {
    toggleEntrega("tienda");
    limpiarErroresGlobales();
  });
}

// 🧽 Nueva función: limpiar errores globales en cualquier cambio o navegación
function limpiarErroresGlobales() {
  document.querySelectorAll(".error-msg").forEach(msg => msg.remove());
  document.querySelectorAll(".input-error").forEach(el => el.classList.remove("input-error"));
}

document.addEventListener("DOMContentLoaded", () => {
  cargarDatosUsuario();
  inicializarOpcionesEntrega();

  // También limpiar alertas o errores al retroceder o avanzar entre pasos
  document.querySelectorAll(".btn-siguiente, .btn-anterior").forEach(btn => {
    btn.addEventListener("click", limpiarErroresGlobales);
  });
});