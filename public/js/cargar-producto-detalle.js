import { agregarAlCarrito, obtenerCarrito } from "./cart/carritoStorage.js";
import { productos } from "./productos.js";

document.addEventListener("DOMContentLoaded", () => {
  /* -------- Obtener producto -------- */
  const producto = window.currentProduct || (() => {
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"));
    return productos.find(p => p.id === id);
  })();

  const contenedor = document.getElementById("detalle-producto");
  if (!producto) {
    contenedor.innerHTML = `<p style="padding:60px;text-align:center;">Producto no encontrado.</p>`;
    return;
  }

  const { nombre, descripcion, precioUnidad, precioCuarto, precioDocena, imagenes, imagen } = producto;
  const imagenesArray = Array.isArray(imagenes) && imagenes.length ? imagenes : imagen ? [imagen] : [];
  const imgPrincipal = imagenesArray[0] || "";

  /* -------- Helpers formato -------- */
  const fmt = (n) => n.toLocaleString("es-PE", { style: "currency", currency: "PEN" });

  /* -------- Colores disponibles -------- */
  const coloresDisponibles = [
    { nombre: "Azul noche", hex: "#0a1a2f" },
    { nombre: "Beige",      hex: "#faf0dc" },
    { nombre: "Blanco",     hex: "#ffffff" },
    { nombre: "Grape",      hex: "#694784" },
    { nombre: "Lila",       hex: "#c8a2c8" },
    { nombre: "Melani",     hex: "#d6d3d1" },
    { nombre: "Melón",      hex: "#ffe7e0" },
    { nombre: "Minty Fresh",hex: "#D4F1E3" },
    { nombre: "Negro",      hex: "#000000" },
    { nombre: "Neu",        hex: "#004F79" },
    { nombre: "Palo rosa",  hex: "#a35b67" },
    { nombre: "Rojo",       hex: "#ff0000" },
    { nombre: "Rosado",     hex: "#fcd3dc" },
    { nombre: "Topo",       hex: "#6b6057" },
    { nombre: "Verde cemento", hex: "#9aa79d" },
    { nombre: "Vino",       hex: "#5e2129" },
  ];

  const tallas = ["XS", "S", "M", "L", "XL", "XXL"];

  /* -------- Thumbnails HTML -------- */
  const thumbsHTML = imagenesArray.map((src, i) => `
    <div class="thumbnail-item ${i === 0 ? "active" : ""}" data-index="${i}">
      <img src="${src}" alt="${nombre}">
    </div>
  `).join("");

  /* -------- Color swatches -------- */
  const swatchesHTML = coloresDisponibles.map(c => `
    <span class="color-swatch" data-color="${c.nombre}" title="${c.nombre}"
          style="background-color:${c.hex};${c.hex === "#ffffff" ? "border:2px solid #ddd;" : ""}"></span>
  `).join("");

  /* -------- Tallas HTML -------- */
  const tallasHTML = tallas.map(t => `
    <button class="talla-btn" data-talla="${t}">${t}</button>
  `).join("");

  /* -------- Presentaciones HTML -------- */
  const presentacionesHTML = `
    <button class="presentacion-btn" data-tipo="unidad">
      Unidad <small>${fmt(precioUnidad)}</small>
    </button>
    <button class="presentacion-btn" data-tipo="cuarto">
      1/4 Docena <small>${fmt(precioCuarto)}</small>
    </button>
    <button class="presentacion-btn" data-tipo="docena">
      Docena <small>${fmt(precioDocena)}</small>
    </button>
  `;

  /* -------- HTML completo -------- */
  contenedor.innerHTML = `
    <section class="detalle">
      <!-- Galería izquierda -->
      <div class="media">
        <div class="img-principal-wrap">
          <img id="imgPrincipal" src="${imgPrincipal}" alt="${nombre}">
        </div>
        ${imagenesArray.length > 1 ? `<div class="thumbnails-grid">${thumbsHTML}</div>` : ""}
      </div>

      <!-- Panel derecho -->
      <div class="info">
        <h2>${nombre}</h2>

        <div class="precio-bloque">
          <span class="precio-actual" id="precioMostrado">${fmt(precioUnidad)}</span>
          <p class="precio-cuotas">Paga en cuotas sin intereses</p>
        </div>

        <div class="divider-line"></div>

        <!-- Presentación -->
        <div class="seccion-color">
          <div class="seccion-label">PRESENTACIÓN</div>
          <div class="presentacion-opciones">${presentacionesHTML}</div>
        </div>

        <!-- Colores -->
        <div class="seccion-color" id="seccion-color-wrap">
          <div class="seccion-label">
            COLOR: <span class="label-valor" id="color-nombre-label">—</span>
          </div>
          <div class="color-swatches" style="display:flex;flex-wrap:wrap;gap:8px;">${swatchesHTML}</div>
          <div id="nota-colores" style="font-size:12px;color:#888;margin-top:6px;">Selecciona una presentación primero.</div>
        </div>

        <div class="divider-line"></div>

        <!-- Tallas -->
        <div class="seccion-talla">
          <div class="talla-header">
            <div class="seccion-label">TALLA</div>
            <span class="stock-badge">EN STOCK</span>
          </div>
          <div class="tallas-grid">${tallasHTML}</div>
          <a href="#guia-tallas" class="guia-tallas-link">📏 Guía de tallas</a>
        </div>

        <!-- Cantidad -->
        <div class="seccion-cantidad">
          <span class="seccion-label" style="margin:0;">CANTIDAD:</span>
          <div class="cantidad-ctrl">
            <button id="btnMenos">−</button>
            <input type="number" id="cantidad" min="1" value="1">
            <button id="btnMas">+</button>
          </div>
        </div>

        <!-- Mensaje error/éxito -->
        <div class="mensaje-detalle" id="msgDetalle"></div>

        <!-- Botones acción -->
        <button class="btn-agregar-carrito" id="btnAgregarCarrito">AGREGAR AL CARRITO</button>
        <button class="btn-favoritos">♡ &nbsp;AGREGAR A FAVORITOS</button>

        <!-- Trust badges -->
        <div class="trust-badges">
          <div class="trust-item envio-gratis">🚚 ¡Este artículo tiene envío gratis!</div>
          <div class="trust-item">🔄 Devolución en los términos acordados</div>
          <div class="trust-item">💳 Paga en cuotas con tus tarjetas</div>
        </div>

        <div class="promo-cupon">20% OFF en tu primera compra con el cupón <strong>NORA20</strong></div>

        <!-- Acordeón descripción -->
        <div class="acordeon" id="guia-tallas">
          <div class="acordeon-item">
            <div class="acordeon-header">
              Descripción <span class="acordeon-icon">+</span>
            </div>
            <div class="acordeon-body">
              <p>${descripcion || "Producto de lencería de alta calidad de Distribuidora Lencería Nora."}</p>
            </div>
          </div>
          <div class="acordeon-item">
            <div class="acordeon-header">
              Guía de Tallas <span class="acordeon-icon">+</span>
            </div>
            <div class="acordeon-body">
              <table style="width:100%;border-collapse:collapse;font-size:13px;">
                <thead>
                  <tr style="background:#f5f5f5;">
                    <th style="padding:8px;border:1px solid #eee;">Talla</th>
                    <th style="padding:8px;border:1px solid #eee;">Busto (cm)</th>
                    <th style="padding:8px;border:1px solid #eee;">Cintura (cm)</th>
                    <th style="padding:8px;border:1px solid #eee;">Cadera (cm)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td style="padding:8px;border:1px solid #eee;text-align:center;">XS</td><td style="padding:8px;border:1px solid #eee;text-align:center;">75-80</td><td style="padding:8px;border:1px solid #eee;text-align:center;">55-60</td><td style="padding:8px;border:1px solid #eee;text-align:center;">80-85</td></tr>
                  <tr><td style="padding:8px;border:1px solid #eee;text-align:center;">S</td><td style="padding:8px;border:1px solid #eee;text-align:center;">80-85</td><td style="padding:8px;border:1px solid #eee;text-align:center;">60-65</td><td style="padding:8px;border:1px solid #eee;text-align:center;">85-90</td></tr>
                  <tr><td style="padding:8px;border:1px solid #eee;text-align:center;">M</td><td style="padding:8px;border:1px solid #eee;text-align:center;">86-91</td><td style="padding:8px;border:1px solid #eee;text-align:center;">66-71</td><td style="padding:8px;border:1px solid #eee;text-align:center;">91-96</td></tr>
                  <tr><td style="padding:8px;border:1px solid #eee;text-align:center;">L</td><td style="padding:8px;border:1px solid #eee;text-align:center;">92-98</td><td style="padding:8px;border:1px solid #eee;text-align:center;">72-77</td><td style="padding:8px;border:1px solid #eee;text-align:center;">97-102</td></tr>
                  <tr><td style="padding:8px;border:1px solid #eee;text-align:center;">XL</td><td style="padding:8px;border:1px solid #eee;text-align:center;">99-105</td><td style="padding:8px;border:1px solid #eee;text-align:center;">78-83</td><td style="padding:8px;border:1px solid #eee;text-align:center;">103-108</td></tr>
                  <tr><td style="padding:8px;border:1px solid #eee;text-align:center;">XXL</td><td style="padding:8px;border:1px solid #eee;text-align:center;">106-112</td><td style="padding:8px;border:1px solid #eee;text-align:center;">84-90</td><td style="padding:8px;border:1px solid #eee;text-align:center;">109-115</td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="acordeon-item">
            <div class="acordeon-header">
              Medidas y talla <span class="acordeon-icon">+</span>
            </div>
            <div class="acordeon-body">
              <p>Nuestras prendas están diseñadas para ajustarse perfectamente a tu figura.
              Consulta la guía de tallas para elegir tu talla correcta.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- POPUP: Artículo agregado al carrito -->
    <div class="popup-carrito-overlay" id="popupCarrito">
      <div class="popup-carrito-box">
        <button class="cerrar-popup" id="cerrarPopup">✕</button>
        <p class="popup-titulo" id="popupTitulo">1 artículo agregado(s) al carrito</p>

        <div class="popup-producto-row">
          <img class="popup-prod-img" id="popupImg" src="" alt="">
          <div class="popup-prod-info">
            <div class="prod-nombre" id="popupNombre"></div>
            <div class="prod-meta" id="popupMeta"></div>
            <div class="prod-precio" id="popupPrecio"></div>
          </div>
          <div style="text-align:right;min-width:120px;">
            <div style="font-size:12px;color:#555;" id="popupSubtotalLabel"></div>
            <div style="font-size:17px;font-weight:700;color:#111;" id="popupSubtotalVal"></div>
          </div>
        </div>

        <div class="popup-btns">
          <button class="popup-btn-pagar" onclick="window.location.href='/checkout'">PROCEDER AL PAGO</button>
          <button class="popup-btn-carrito" onclick="window.location.href='/checkout'">VER CARRITO</button>
        </div>

        <!-- Relacionados -->
        <div class="popup-relacionados">
          <h3>TAMBIÉN TE PUEDE INTERESAR</h3>
          <div class="popup-rel-grid" id="popupRelGrid"></div>
        </div>
      </div>
    </div>
  `;

  /* ================================================
     LÓGICA INTERACTIVA
     ================================================ */
  let imgIndex = 0;
  let tipoPrecio = "";
  let coloresSeleccionados = [];
  let tallaSeleccionada = "";
  const maxColores = { unidad: 1, cuarto: 3, docena: 0 };
  const precioMap   = { unidad: precioUnidad, cuarto: precioCuarto, docena: precioDocena };
  const etiquetaMap = { unidad: "Unidad", cuarto: "1/4 Docena", docena: "Docena" };

  /* --- Galería --- */
  const imgEl = contenedor.querySelector("#imgPrincipal");
  contenedor.querySelectorAll(".thumbnail-item").forEach(th => {
    th.addEventListener("click", () => {
      imgIndex = +th.dataset.index;
      imgEl.src = imagenesArray[imgIndex];
      contenedor.querySelectorAll(".thumbnail-item").forEach(t => t.classList.remove("active"));
      th.classList.add("active");
    });
  });

  /* --- Acordeón --- */
  contenedor.querySelectorAll(".acordeon-header").forEach(h => {
    h.addEventListener("click", () => {
      const item = h.closest(".acordeon-item");
      item.classList.toggle("open");
    });
  });

  /* --- Cantidad +/- --- */
  const inputCantidad = contenedor.querySelector("#cantidad");
  contenedor.querySelector("#btnMenos").addEventListener("click", () => {
    const v = parseInt(inputCantidad.value) || 1;
    if (v > 1) inputCantidad.value = v - 1;
  });
  contenedor.querySelector("#btnMas").addEventListener("click", () => {
    inputCantidad.value = (parseInt(inputCantidad.value) || 1) + 1;
  });

  /* --- Presentación --- */
  const notaColores = contenedor.querySelector("#nota-colores");
  const colorNombreLabel = contenedor.querySelector("#color-nombre-label");
  const precioMostrado = contenedor.querySelector("#precioMostrado");

  contenedor.querySelectorAll(".presentacion-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      contenedor.querySelectorAll(".presentacion-btn").forEach(b => b.classList.remove("seleccionado"));
      btn.classList.add("seleccionado");
      tipoPrecio = btn.dataset.tipo;
      precioMostrado.textContent = fmt(precioMap[tipoPrecio]);

      // resetear colores
      coloresSeleccionados = [];
      colorNombreLabel.textContent = "—";
      contenedor.querySelectorAll(".color-swatch").forEach(s => s.classList.remove("seleccionado"));

      if (tipoPrecio === "docena") {
        coloresSeleccionados = ["Surtido"];
        notaColores.textContent = "Colores surtidos (automático).";
        contenedor.querySelectorAll(".color-swatch").forEach(s => s.classList.add("inactivo"));
      } else {
        notaColores.textContent = `Elige ${maxColores[tipoPrecio]} color(es).`;
        contenedor.querySelectorAll(".color-swatch").forEach(s => s.classList.remove("inactivo"));
      }
    });
  });

  /* --- Colores --- */
  contenedor.querySelectorAll(".color-swatch").forEach(sw => {
    sw.addEventListener("click", () => {
      if (!tipoPrecio || tipoPrecio === "docena") return;
      const colorNombre = sw.dataset.color;
      if (sw.classList.contains("seleccionado")) {
        sw.classList.remove("seleccionado");
        coloresSeleccionados = coloresSeleccionados.filter(c => c !== colorNombre);
      } else {
        const max = maxColores[tipoPrecio];
        if (coloresSeleccionados.length >= max) {
          // quitar el primero si es unidad
          if (max === 1) {
            contenedor.querySelectorAll(".color-swatch.seleccionado").forEach(s => s.classList.remove("seleccionado"));
            coloresSeleccionados = [];
          } else {
            mostrarMsg("Solo puedes elegir " + max + " colores.", "error");
            return;
          }
        }
        sw.classList.add("seleccionado");
        coloresSeleccionados.push(colorNombre);
      }
      colorNombreLabel.textContent = coloresSeleccionados.join(", ") || "—";
    });
  });

  /* --- Tallas --- */
  contenedor.querySelectorAll(".talla-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      contenedor.querySelectorAll(".talla-btn").forEach(b => b.classList.remove("activo"));
      btn.classList.add("activo");
      tallaSeleccionada = btn.dataset.talla;
    });
  });

  /* --- Mensaje inline --- */
  const msgEl = contenedor.querySelector("#msgDetalle");
  let msgTimer;
  function mostrarMsg(texto, tipo) {
    msgEl.textContent = texto;
    msgEl.className = `mensaje-detalle ${tipo}`;
    clearTimeout(msgTimer);
    msgTimer = setTimeout(() => { msgEl.className = "mensaje-detalle"; }, 3000);
  }

  /* --- Agregar al carrito --- */
  contenedor.querySelector("#btnAgregarCarrito").addEventListener("click", () => {
    if (!tipoPrecio) { mostrarMsg("Selecciona una presentación (Unidad / 1/4 Docena / Docena).", "error"); return; }
    if (!tallaSeleccionada) { mostrarMsg("Selecciona una talla.", "error"); return; }
    if (tipoPrecio !== "docena" && coloresSeleccionados.length !== maxColores[tipoPrecio]) {
      mostrarMsg(`Debes elegir ${maxColores[tipoPrecio]} color(es).`, "error"); return;
    }
    const cantidad = parseInt(inputCantidad.value) || 1;
    const coloresStr = coloresSeleccionados.join(", ");
    const itemId = `${producto.id}-${tipoPrecio}-${coloresStr}-${tallaSeleccionada}`;

    agregarAlCarrito({
      id: itemId,
      nombre: `${nombre} (${etiquetaMap[tipoPrecio]}, ${coloresStr}, Talla ${tallaSeleccionada})`,
      precio: precioMap[tipoPrecio],
      cantidad,
      imagen: imagenesArray[0] || ""
    });

    // Mostrar popup
    abrirPopupCarrito(cantidad, coloresStr, tallaSeleccionada);
  });

  /* --- Popup carrito --- */
  function abrirPopupCarrito(cantidad, coloresStr, talla) {
    const overlay = contenedor.querySelector("#popupCarrito");
    const carrito = obtenerCarrito();
    const totalItems = carrito.reduce((s, i) => s + i.cantidad, 0);
    const subtotal = carrito.reduce((s, i) => s + i.precio * i.cantidad, 0);

    contenedor.querySelector("#popupTitulo").textContent = `${cantidad} artículo(s) agregado(s) al carrito`;
    contenedor.querySelector("#popupImg").src = imagenesArray[0] || "";
    contenedor.querySelector("#popupImg").alt = nombre;
    contenedor.querySelector("#popupNombre").textContent = nombre;
    contenedor.querySelector("#popupMeta").innerHTML = `
      ${tipoPrecio !== "docena" ? `Color: ${coloresStr}<br>` : ""}
      Talla: ${talla}<br>
      Presentación: ${etiquetaMap[tipoPrecio]}<br>
      Cantidad: ${cantidad}
    `;
    contenedor.querySelector("#popupPrecio").textContent = fmt(precioMap[tipoPrecio]);
    contenedor.querySelector("#popupSubtotalLabel").textContent = `Subtotal del carrito (${totalItems} artículo(s))`;
    contenedor.querySelector("#popupSubtotalVal").textContent = fmt(subtotal);

    // Relacionados: otros productos aleatoriamente
    const relacionados = productos.filter(p => p.id !== producto.id).slice(0, 3);
    const grid = contenedor.querySelector("#popupRelGrid");
    grid.innerHTML = relacionados.map(p => {
      const img = Array.isArray(p.imagenes) && p.imagenes.length ? p.imagenes[0] : (p.imagen || "");
      return `
        <a class="popup-rel-card" href="/productos/${p.id}">
          <img class="popup-rel-img" src="${img}" alt="${p.nombre || p.name}">
          <div class="popup-rel-nombre">${p.nombre || p.name}</div>
          <div class="popup-rel-precio">${fmt(p.precioUnidad || p.price_unit || 0)}</div>
        </a>
      `;
    }).join("");

    overlay.classList.add("active");
    document.body.style.overflow = "hidden";
  }

  // Cerrar popup
  contenedor.querySelector("#cerrarPopup").addEventListener("click", cerrarPopup);
  contenedor.querySelector("#popupCarrito").addEventListener("click", e => {
    if (e.target === contenedor.querySelector("#popupCarrito")) cerrarPopup();
  });
  function cerrarPopup() {
    contenedor.querySelector("#popupCarrito").classList.remove("active");
    document.body.style.overflow = "";
  }
});