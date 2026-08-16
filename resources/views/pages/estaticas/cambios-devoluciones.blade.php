@extends('layouts.app')

@section('title', 'Cambios y Devoluciones - Lencería Nora')

@section('styles')
<link rel="stylesheet" href{{ asset('css/cambios-devoluciones.css') }}">
@endsection

@section('content')
  <main class="contenido-politica">
    <section class="politica-box">
      <h1><i class="fas fa-exchange-alt"></i> Cambios y Devoluciones</h1>
      <p>En <strong>Distribuidora Lencería Nora / Marbellín</strong>, nos comprometemos a ofrecer una experiencia de
        compra segura y satisfactoria. Si no estás conforme con tu compra, puedes solicitar un cambio o devolución bajo
        las condiciones descritas a continuación.</p>

      <h2><i class="fas fa-box-open"></i> Requisitos para cambios</h2>
      <ul>
        <li>El producto debe estar sin uso, en buen estado y con etiquetas originales. Debido a motivos de higiene, la ropa interior debe estar completamente sellada y sin manipulación.</li>
        <li>Debe presentarse el comprobante o boleta de compra.</li>
        <li>El plazo máximo es de <strong>7 días calendario</strong> desde la recepción del producto.</li>
      </ul>

      <h2><i class="fas fa-paper-plane"></i> Proceso de cambio</h2>
      <ol>
        <li>Escríbenos a <a href="mailto:lencerianora2026@gmail.com">lencerianora2026@gmail.com</a> o por WhatsApp indicando el número de pedido, motivo y fotos del producto.</li>
        <li>Coordinamos el recojo o entrega del producto con el área de atención.</li>
        <li>Los costos de envío corren por cuenta del cliente salvo error o falla por parte de Distribuidora Nora.</li>
      </ol>

      <h2><i class="fas fa-undo-alt"></i> Devoluciones y reembolsos</h2>
      <p>Aplica solo en casos como:</p>
      <ul>
        <li>Producto incorrecto respecto al pedido enviado.</li>
        <li>Fallas de fábrica detectadas inmediatamente al recibirlo.</li>
      </ul>
      <p>Podrás elegir entre un reembolso total o el envío del producto correcto sin costo de envío adicional.</p>

      <h2><i class="fas fa-map-marker-alt"></i> Sucursales de atención</h2>
      <p><strong>Tienda 1: </strong>Jr. América 325, Tienda 2, La Victoria, Lima.<br>
         <strong>Tienda 2: </strong>Jr. Hipólito Unanue 1457, La Victoria, Lima.<br>
         <strong>Horarios: </strong>Lunes a Sábado de 9:00 a.m. a 7:00 p.m.
      </p>
      <p><em>Última actualización: 2025</em></p>
    </section>
  </main>
@endsection
