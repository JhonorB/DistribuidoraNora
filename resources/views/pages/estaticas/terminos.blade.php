@extends('layouts.app')

@section('title', 'Términos y Condiciones - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/terminos.css') }}">
@endsection

@section('content')
  <main class="contenido-terminos">
    <section class="terminos-box">
      <h1><i class="fas fa-file-contract"></i> Términos y Condiciones</h1>

      <p>Bienvenido/a a <strong>Corporación Innovitex Marbellin S.A.C</strong>. Al navegar o utilizar este sitio web,
        aceptas los términos y condiciones que se detallan a continuación. Te pedimos leerlos cuidadosamente antes de
        realizar una compra.</p>

      <h2><i class="fas fa-shopping-bag"></i> 1. Condiciones de compra</h2>
      <ul>
        <li>Todos los productos están sujetos a disponibilidad de stock.</li>
        <li>Los precios pueden variar sin previo aviso, pero se respetará el precio mostrado al momento de la compra
          confirmada.</li>
        <li>Las promociones no son acumulables, salvo indicación expresa.</li>
        <li>Al confirmar un pedido, el cliente acepta voluntariamente las condiciones de venta.</li>
      </ul>

      <h2><i class="fas fa-credit-card"></i> 2. Métodos de pago</h2>
      <ul>
        <li>Aceptamos pagos con tarjetas de crédito, débito, transferencia bancaria y Yape.</li>
        <li>Los pagos se procesan mediante pasarelas seguras o validaciones de depósitos manuales.</li>
        <li>En caso de error en el pago o rechazo, el pedido no será procesado hasta regularizarse.</li>
      </ul>

      <h2><i class="fas fa-shield-alt"></i> 3. Seguridad y protección de datos</h2>
      <ul>
        <li>Los datos proporcionados son confidenciales y serán usados solo para fines relacionados con tu compra.</li>
        <li>Cumplimos con la Ley de Protección de Datos Personales (Ley N° 29733).</li>
        <li>Puedes solicitar la modificación o eliminación de tus datos en cualquier momento escribiendo a <a
            href="mailto:lencerianora2026@gmail.com">lencerianora2026@gmail.com</a>.</li>
      </ul>

      <h2><i class="fas fa-undo-alt"></i> 4. Política de cambios y devoluciones</h2>
      <p>Las condiciones para cambios o devoluciones están detalladas en nuestra <a
          href="{{ route('page.cambios') }}">Política de Cambios y Devoluciones</a>. Solo aceptamos devoluciones en
        productos sin uso, en perfecto estado y dentro del plazo indicado.</p>

      <h2><i class="fas fa-truck"></i> 5. Envíos</h2>
      <ul>
        <li>Hacemos envíos a todo el Perú a través de servicios logísticos confiables como Shalom y Marvisur.</li>
        <li>El tiempo de entrega puede variar según la ciudad y el operador logístico.</li>
        <li>Los pedidos se procesan dentro de 24 a 48 horas hábiles luego de confirmado el pago.</li>
      </ul>

      <h2><i class="fas fa-user-lock"></i> 6. Cuenta del usuario</h2>
      <ul>
        <li>El cliente es responsable de mantener segura la información de su cuenta y contraseña.</li>
        <li>No compartas tus datos de acceso. Nora Lencería no se hace responsable por el mal uso de tu cuenta.</li>
      </ul>
    </section>
  </main>
@endsection
