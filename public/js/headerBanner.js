document.addEventListener("DOMContentLoaded", () => {
  /* ==========================================
     📱 Menú hamburguesa y navegación
  ========================================== */
  const menuToggle = document.getElementById("menuToggle");
  const menuNav = document.getElementById("menuNav");
  const menuIcon = menuToggle ? menuToggle.querySelector("i") : null;

  function closeMobileMenu() {
    if (menuNav && menuNav.classList.contains("show")) {
      menuNav.classList.remove("show");
      if (menuToggle) {
          menuToggle.setAttribute("aria-expanded", "false");
          menuToggle.setAttribute("aria-label", "Abrir menú");
      }
      if (menuIcon) {
        menuIcon.classList.remove("fa-times");
        menuIcon.classList.add("fa-bars");
      }
    }
  }

  if (menuToggle && menuNav) {
    menuToggle.addEventListener("click", (e) => {
      e.stopPropagation(); // Evitar que el clic cierre inmediatamente
      const isOpen = menuNav.classList.toggle("show");
      menuToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      menuToggle.setAttribute("aria-label", isOpen ? "Cerrar menú" : "Abrir menú");
      
      if (menuIcon) {
        if (isOpen) {
          menuIcon.classList.remove("fa-bars");
          menuIcon.classList.add("fa-times");
        } else {
          menuIcon.classList.remove("fa-times");
          menuIcon.classList.add("fa-bars");
        }
      }
    });
  }

  /* ==========================================
     📂 Dropdowns: Desktop (Click to open) y Móvil (Acordeón)
  ========================================== */
  const dropdowns = document.querySelectorAll(".dropdown");

  dropdowns.forEach((dropdown) => {
    const link = dropdown.querySelector("a");
    const submenu = dropdown.querySelector(".dropdown-menu");

    if (!submenu) return;

    link.addEventListener("click", (e) => {
      // Prevenir navegación por defecto si el menú no está abierto (para touch/clicks)
      const isDesktop = window.innerWidth > 1024;
      const isOpen = dropdown.classList.contains("open");

      if (!isOpen) {
        e.preventDefault();
        
        // Cerrar otros abiertos
        dropdowns.forEach(d => {
          if (d !== dropdown) d.classList.remove("open");
        });

        dropdown.classList.add("open");
      } else if (!isDesktop) {
        // En móvil, si ya está abierto, permitir ir al enlace u ocultarlo
        e.preventDefault();
        dropdown.classList.remove("open");
      }
    });
  });

  /* ==========================================
     🔄 Eventos de Cierre Global (Esc, Clic fuera)
  ========================================== */
  document.addEventListener("click", (e) => {
    // Cerrar menú móvil si se hace clic fuera de la cabecera
    const header = document.querySelector("header");
    if (header && !header.contains(e.target)) {
      closeMobileMenu();
    }

    // Cerrar dropdowns de productos si se hace clic fuera
    let clickedInsideDropdown = false;
    dropdowns.forEach(dropdown => {
      if (dropdown.contains(e.target)) {
        clickedInsideDropdown = true;
      }
    });

    if (!clickedInsideDropdown) {
      dropdowns.forEach(dropdown => dropdown.classList.remove("open"));
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeMobileMenu();
      dropdowns.forEach(dropdown => dropdown.classList.remove("open"));
    }
  });

  /* ==========================================
     Cerrar menú móvil al hacer clic en un enlace normal
  ========================================== */
  if (menuNav) {
    const normalLinks = menuNav.querySelectorAll("li:not(.dropdown) a");
    normalLinks.forEach(link => {
      link.addEventListener("click", () => {
        closeMobileMenu();
      });
    });
    // Y los enlaces de submenú
    const subLinks = menuNav.querySelectorAll(".dropdown-menu a");
    subLinks.forEach(link => {
      link.addEventListener("click", () => {
        closeMobileMenu();
      });
    });
  }

});