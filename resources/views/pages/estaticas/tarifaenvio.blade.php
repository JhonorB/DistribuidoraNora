@extends('layouts.app')

@section('title', 'Tarifas de Envío - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/tarifaenvio.css') }}">
@endsection

@section('content')
<main class="tarifas-envio">
  <h1>Tarifas de Envío</h1>

  <div class="envios-container">
    <!-- Envíos Lima Metropolitana y Callao -->
    <div class="envio-lima">
      <p>Solo en <strong>Lima Metropolitana y Callao</strong></p>
      <h2>¡YA ESTAMOS LLEVANDO TUS COMPRAS A CASA!</h2>
    </div>

    <!-- Imagen del motorizado -->
    <div class="motorizado">
      <img src="{{ asset('assets/icons/motorizado.png') }}" alt="Motorizado Marbellin" loading="lazy">
    </div>

    <!-- Envíos a Provincia -->
    <div class="envio-provincia">
      <h3>ENVÍOS A PROVINCIA</h3>
      <p>Contáctanos para confirmar el tiempo de tu entrega.</p>
      <div class="whatsapp-line">
        <img src="{{ asset('assets/icons/WhatsApp.png') }}" alt="WhatsApp Marbellin" loading="lazy">
        <a href="https://wa.me/51977228430" target="_blank" rel="noopener noreferrer">+51 977 228 430</a>
      </div>
    </div>
  </div>

  <!-- Política de Envíos -->
  <section class="politica-envios">
    <h2>Política de Envíos</h2>
    <p>
      En <strong>Distribuidora Nora - Marbellín</strong> cuidamos cada detalle para que tu pedido llegue en perfectas condiciones, con embalaje seguro y presentación elegante. Nuestro compromiso es ofrecerte un servicio confiable, rápido y con la calidad premium que nos caracteriza.
    </p>
    <p>
      Los tiempos de entrega pueden variar según la zona, pero garantizamos que recibirás tu pedido de manera oportuna. Ya sea en Lima Metropolitana o Callao, nos aseguramos de que tu experiencia de compra sea cómoda, segura y completamente satisfactoria.
    </p>
  </section>

  <!-- Medios de Entrega -->
  <section class="medios-entrega-container">
    <h2>Medios de Entrega</h2>
    <p>Realizamos nuestros envíos a través de:</p>
    <ul class="medios-entrega">
      <li>
        <figure>
          <img src="{{ asset('assets/icons/Shalom.png') }}" alt="Shalom" loading="lazy">
          <figcaption>Shalom</figcaption>
        </figure>
      </li>
      <li>
        <figure>
          <img src="{{ asset('assets/icons/Marvisur.png') }}" alt="Marvisur" loading="lazy">
          <figcaption>Marvisur</figcaption>
        </figure>
      </li>
    </ul>
    <blockquote class="frase-envios">
      Confía en nuestros socios de envío, Shalom y Marvisur, para entregar tu pedido con rapidez, cuidado y la elegancia que caracteriza a Marbellín.
    </blockquote>
    <p>
      Realizamos despachos en Lima y provincias de lunes a sábado, de 9:00 a.m. a 7:00 p.m. Los domingos y feriados no se realizan envíos, para garantizar que tu pedido llegue seguro y en perfecto estado al siguiente día hábil.
    </p>
  </section>

  <!-- Intentos de Entrega -->
  <section class="intentos-entrega">
    <h2>Intentos de Entrega</h2>
    <p>
      En la modalidad Regular, realizamos hasta dos intentos de entrega de tu pedido. Si no se concreta la entrega en estos intentos, programaremos un nuevo intento dentro de las siguientes 48 horas. De no lograrse la entrega tras los dos intentos, cualquier envío adicional estará sujeto a un cargo extra. Esto nos permite garantizar que tu pedido llegue de manera segura y que tengas claridad sobre los tiempos y condiciones de entrega.
    </p>
  </section>

  <!-- Tiempos de Entrega -->
  <section class="tiempos-entrega">
    <h2>Tiempos de Entrega</h2>
    <p>
      Para pedidos dentro de Lima, el tiempo de entrega es de hasta 2 días hábiles, mientras que para provincias el plazo máximo es de 5 días hábiles. Todos los pedidos realizados de lunes a sábado se procesan dentro del mismo día si se reciben antes de las 12:00 p.m. Los pedidos recibidos después de esa hora, así como los realizados durante domingos o feriados, se procesarán el siguiente día hábil, asegurando que tu pedido llegue en el menor tiempo posible y en perfectas condiciones.
    </p>
  </section>

  <!-- Tarifas de Envío -->
  <section class="tarifas">
    <h2>Tarifas de Envío</h2>
    <p>
      Nuestras tarifas se adaptan a tus necesidades y se calculan automáticamente según la cantidad de productos y la distancia de entrega, garantizando transparencia y conveniencia para que disfrutes de tu compra sin sorpresas.
    </p>

    <table border="1">
      <thead>
        <tr>
          <th scope="col">Zona</th>
          <th scope="col">Tiempo de entrega</th>
          <th scope="col">Costo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Lima Metropolitana y Callao</td>
          <td>2 días hábiles</td>
          <td rowspan="3">El costo del envío será calculado automáticamente en la página web, según cantidad y distancia.</td>
        </tr>
        <tr>
          <td>Costa y Sierra</td>
          <td>3 días hábiles</td>
        </tr>
        <tr>
          <td>Selva</td>
          <td>4 días hábiles</td>
        </tr>
      </tbody>
    </table>

    <p class="note">
      Nuestra tienda online está disponible <strong>24/7</strong>.  
      Las órdenes recibidas después de las 12:00 p.m. serán consideradas como pedidos del día siguiente hábil.
    </p>
  </section>
</main>
@endsection
