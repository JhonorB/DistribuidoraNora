@extends('layouts.app')

@section('title', 'Política de Privacidad - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/politica-privacidad.css') }}">
@endsection

@section('content')
  <main class="contenido-privacidad">
    <section class="privacidad-box">
      <h1><i class="fas fa-user-shield"></i> Política de Privacidad</h1>

      <p>En <strong>Corporación Innovitex Marbellin S.A.C</strong> valoramos y respetamos la privacidad de nuestros
        usuarios. Esta política describe cómo recopilamos, usamos, almacenamos y protegemos tu información personal
        cuando visitas nuestro sitio web o realizas una compra.</p>

      <h2><i class="fas fa-database"></i> 1. Información que recopilamos</h2>
      <ul>
        <li>Nombre completo</li>
        <li>Dirección de envío y facturación</li>
        <li>Correo electrónico</li>
        <li>Número de teléfono</li>
        <li>Información de pago (procesada por pasarelas seguras)</li>
      </ul>

      <h2><i class="fas fa-user-lock"></i> 2. Finalidad del uso</h2>
      <ul>
        <li>Procesar tus pedidos y entregarlos correctamente.</li>
        <li>Enviar confirmaciones, notificaciones o promociones (con tu consentimiento).</li>
        <li>Mejorar la experiencia de usuario y atención al cliente.</li>
        <li>Cumplir con obligaciones legales.</li>
      </ul>

      <h2><i class="fas fa-shield-alt"></i> 3. Protección de datos</h2>
      <p>Implementamos medidas de seguridad para proteger tus datos contra accesos no autorizados, pérdidas o
        alteraciones. Solo el personal autorizado accede a esta información con fines específicos.</p>

      <h2><i class="fas fa-share-alt"></i> 4. Compartición con terceros</h2>
      <ul>
        <li>No vendemos ni compartimos tu información personal con terceros sin tu consentimiento.</li>
        <li>Solo se comparte con proveedores logísticos o pasarelas de pago estrictamente necesarias para completar el
          servicio.</li>
      </ul>

      <h2><i class="fas fa-cookie-bite"></i> 5. Uso de cookies</h2>
      <p>Este sitio utiliza cookies para mejorar la experiencia del usuario. Puedes configurar tu navegador para
        rechazarlas, aunque algunas funciones podrían verse limitadas.</p>

      <h2><i class="fas fa-user-edit"></i> 6. Acceso, modificación y eliminación de datos</h2>
      <p>Como titular de tus datos, tienes derecho a acceder, rectificar, actualizar o solicitar la eliminación de tu
        información. Puedes ejercer estos derechos escribiendo a <a
          href="mailto:lencerianora2026@gmail.com">lencerianora2026@gmail.com</a>.</p>

      <h2><i class="fas fa-gavel"></i> 7. Base legal</h2>
      <p>Esta política se basa en la <strong>Ley N° 29733 - Ley de Protección de Datos Personales</strong> del Perú y su
        reglamento.</p>

      <h2><i class="fas fa-exclamation-circle"></i> 8. Cambios en esta política</h2>
      <p>Nos reservamos el derecho de modificar esta política en cualquier momento. Te recomendamos revisarla periódicamente para estar informado sobre cómo protegemos tu información.</p>
    </section>
  </main>
@endsection
