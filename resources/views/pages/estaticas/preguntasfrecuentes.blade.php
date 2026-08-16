@extends('layouts.app')

@section('title', 'Preguntas Frecuentes - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/preguntasfrecuentes.css') }}">
@endsection

@section('content')
<main class="preguntas-nora">
  <h1>Preguntas Frecuentes – Distribuidora Nora Lencería</h1>
  <p class="intro-preguntas">
    En esta sección encontrarás las preguntas más frecuentes de nuestros clientes,
    con respuestas claras y sencillas para brindarte una experiencia de compra
    rápida, segura y confiable.
  </p>

  <div class="pregunta-item">
    <h2 class="pregunta-question">1. ¿Puedo comprar sin registrarme en Distribuidora Nora?</h2>
    <p class="respuesta">
      Sí. En Distribuidora Nora ofrecemos la posibilidad de realizar tu compra de
      manera directa, rápida y sencilla, incluso si no cuentas con un registro previo
      en la página. Esto significa que no es obligatorio crear una cuenta para poder
      adquirir nuestros productos, lo cual facilita el proceso de compra a clientes
      nuevos o a quienes prefieren un servicio más inmediato.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">2. ¿Los precios de Distribuidora Nora y otros distribuidores de Marbellín son los mismos?</h2>
    <p class="respuesta">
      En términos generales, los precios regulares que maneja Distribuidora Nora son
      equivalentes a los de otros distribuidores oficiales de la marca Marbellín. No
      obstante, dependiendo de cada distribuidor, su ubicación y el sistema de ventas
      que utilice, pueden generarse ligeras variaciones en los costos finales.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">3. ¿Qué formas de pago aceptan en Distribuidora Nora?</h2>
    <p class="respuesta">
      Actualmente los pagos se realizan mediante transferencia bancaria a través de
      banca móvil o internet banking, depósito directo en cuentas bancarias
      nacionales y también a través de Yape. En el caso de los pedidos realizados
      dentro de Lima, se brinda la alternativa adicional de efectuar el pago en
      efectivo contra entrega, únicamente si se trata de un servicio de delivery o
      envío a domicilio. Una vez que el pedido esté confirmado, proporcionaremos por
      WhatsApp o correo los datos completos de las cuentas y número de Yape para que
      el cliente pueda efectuar el abono con total seguridad.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">4. ¿Puedo pagar en cuotas?</h2>
    <p class="respuesta">
      Por el momento no disponemos de un sistema de pagos fraccionados o en cuotas.
      Todas las operaciones deben cancelarse de manera íntegra, ya sea mediante
      transferencia, depósito bancario, Yape o efectivo en Lima.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">5. ¿Qué hago si ya hice mi pago y no se registra mi pedido?</h2>
    <p class="respuesta">
      En caso de que hayas realizado el pago y este aún no figure en nuestro sistema,
      debes enviarnos el comprobante correspondiente, ya sea una captura de pantalla
      o constancia, a través de nuestro WhatsApp oficial o al correo electrónico
      <strong>lencerianora2026@gmail.com</strong>. De esta manera podremos
      verificarlo y validar el pedido en el menor tiempo posible.
    </p>
  </div>
  
  <div class="pregunta-item">
    <h2 class="pregunta-question">6. ¿Por qué mi pedido ha sido cancelado?</h2>
    <p class="respuesta">
      Un pedido puede ser cancelado por diversas razones: porque no fue posible contactarte para confirmar la compra, porque el pago no se realizó dentro del plazo establecido, porque no logramos ubicarte en la dirección de entrega indicada o por algún inconveniente logístico en el despacho que impidió completar el envío. Si ya se efectuó el pago, el reembolso será gestionado según el caso y en coordinación directa con el cliente.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">7. ¿Puedo obtener una factura a nombre de mi empresa?</h2>
    <p class="respuesta">
      Sí. Antes de finalizar tu compra puedes solicitar la emisión de boleta o factura. Para las facturas es indispensable contar con un RUC activo y que los datos de la razón social y dirección coincidan exactamente con los registrados en SUNAT. Una vez emitido, el comprobante electrónico será enviado al correo electrónico que indiques.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">8. ¿Recibiré el mismo producto que veo en la foto?</h2>
    <p class="respuesta">
      Sí, siempre que selecciones correctamente la talla, el color y el modelo deseado. Sin embargo, es importante señalar que las imágenes mostradas son de carácter referencial, por lo que los tonos de color pueden presentar ligeras variaciones de intensidad según el dispositivo en el que se visualicen.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">9. ¿Cómo puedo asegurarme de haber realizado bien mi compra?</h2>
    <p class="respuesta">
      Una vez que tu pago sea validado recibirás una confirmación oficial mediante WhatsApp o correo electrónico. Este mensaje servirá como respaldo de que tu pedido ha sido procesado exitosamente. In caso de no recibirlo, te recomendamos comunicarte de inmediato con nosotros al correo lencerianora2026@gmail.com.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">10. ¿Puedo eliminar algún artículo que ya haya seleccionado?</h2>
    <p class="respuesta">
      Sí, siempre y cuando tu pedido no haya sido confirmado aún. Desde la bolsa de compras puedes retirar los artículos que ya no desees adquirir antes de finalizar el proceso.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">11. ¿Puedo cancelar mi pedido?</h2>
    <p class="respuesta">
      Sí, puedes cancelar tu pedido antes de que sea despachado. Ten en cuenta que podrían aplicarse costos administrativos derivados de la cancelación. Para ello debes escribirnos al correo lencerianora2026@gmail.com o por WhatsApp. En caso de que el pedido ya se encuentre en tránsito, no será posible anularlo, aunque sí podrás iniciar un proceso de devolución sujeto a nuestras políticas vigentes.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">12. ¿Distribuidora Nora hace entregas en todo el Perú?</h2>
    <p class="respuesta">
      Sí. Contamos con cobertura de despachos tanto en Lima como en provincias a través de agencias de transporte aliadas. Si la dirección de entrega se encuentra en una zona de difícil acceso o de riesgo, coordinaremos contigo una alternativa viable para garantizar la entrega.
    </p>
  </div>

  <div class="pregunta-item">
    <h2 class="pregunta-question">13. ¿Distribuidora Nora hace entregas fuera del Perú?</h2>
    <p class="respuesta">
      No. Actualmente solo realizamos envíos dentro del territorio nacional.
    </p>
  </div>
</main>
@endsection
