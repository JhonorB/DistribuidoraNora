@extends('layouts.app')

@section('title', 'Sobre Nosotros - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/nosotros.css') }}">
@endsection

@section('content')
  <main>
    <section class="section">
      <h1 class="section-title">
        Más que lencería, una declaración de empoderamiento femenino
      </h1>

      <p>La empresa fue fundada el 24 de noviembre de 2017, especializándose en la confección de ropa interior
        femenina, en particular lencería en todos sus estilos. Desde sus inicios, ha buscado optimizar la
        producción y distribución mediante tecnologías modernas y la capacitación continua de su personal, con
        el objetivo de reducir costos y elevar la calidad de sus productos.</p>

      <p>Queremos ser más que una marca: un reflejo de la fuerza, belleza y valor único de cada mujer, impactando
        positivamente en su autoestima, bienestar y estilo de vida. Valoramos a nuestros colaboradores,
        trabajando con ellos para que puedan crecer profesionalmente y disfrutar de múltiples beneficios.</p>
    </section>

    <!-- Sección principal sobre la empresa -->
    <section class="contenedor">

      <!-- Fila 1: Visión, Misión y Valores -->
      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-eye"></i>
          <span>VISIÓN DE DISTRIBUIDORA NORA</span>
        </h2>
        <p>
          Para 2035, Distribuidora Lencería Nora se consolidará como líder en la distribución de productos de lencería, destacando por su eficiencia, cobertura nacional y servicio confiable a distribuidores y clientes finales. Nuestro objetivo es que cada punto de venta reciba los productos de manera oportuna y profesional, garantizando calidad en la entrega y satisfacción tanto de nuestros socios comerciales como de los consumidores finales en todo el país.
        </p>
      </div>

      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-bullseye"></i>
          <span>MISIÓN DE DISTRIBUIDORA NORA</span>
        </h2>
        <p>
          La misión de Distribuidora Lencería Nora es distribuir productos de lencería con excelencia, apoyando a nuestros distribuidores para que puedan crecer y ofrecer productos de calidad a sus clientes. Nos comprometemos a mantener procesos logísticos ágiles, un servicio de soporte integral y una comunicación constante, fortaleciendo nuestras relaciones comerciales y asegurando que cada socio reciba atención personalizada y soluciones eficaces para optimizar su negocio y ventas.
        </p>
      </div>

      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-handshake"></i>
          <span>VALORES ORGANIZACIONALES</span>
        </h2>
        <p>
          En Distribuidora Lencería Nora, nuestros valores guían todas nuestras acciones. La Integridad asegura transparencia, el Compromiso garantiza entregas puntuales, y la Empatía nos permite comprender y apoyar a cada distribuidor. La Innovación impulsa mejoras continuas en logística y procesos de distribución. Finalmente, la Responsabilidad Social nos motiva a practicar sostenibilidad y contribuir al bienestar de la comunidad, asegurando relaciones éticas y duraderas con todos nuestros socios y clientes.
        </p>
      </div>

      <!-- Fila 2: Beneficios para los colaboradores -->
      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-utensils"></i>
          <span>ALIMENTACIÓN CON PROPÓSITO</span>
        </h2>
        <p>
          En Distribuidora Lencería Nora creemos que una alimentación adecuada impulsa el bienestar y el rendimiento de nuestros colaboradores. Por ello, ofrecemos menús elaborados por especialistas, adaptados a los distintos turnos de trabajo. Cubrimos un porcentaje del costo total para que todos disfruten de opciones nutritivas y deliciosas, promoviendo hábitos saludables. Así garantizamos que el equipo se mantenga activo, motivado y en las mejores condiciones para cumplir sus tareas diarias con excelencia y compromiso.
        </p>
      </div>

      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-gift"></i>
          <span>CELEBRAMOS TUS MOMENTOS</span>
        </h2>
        <p>
          En Distribuidora Lencería Nora acompañamos a nuestros colaboradores en los momentos que realmente importan. Brindamos apoyo en casos de maternidad, matrimonio y situaciones de salud, otorgando permisos especiales y auxilios económicos. Además, en fechas significativas como Día de la Madre o del Padre, promovemos tiempo libre para que puedan compartir con sus seres queridos, asegurando un equilibrio entre trabajo y vida personal, generando un ambiente laboral positivo, cercano y respetuoso que fomente la confianza y el bienestar del equipo.
        </p>
      </div>

      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-trophy"></i>
          <span>RECONOCIMIENTO QUE INSPIRA</span>
        </h2>
        <p>
          El esfuerzo y la dedicación de nuestro equipo merecen ser reconocidos. En Distribuidora Lencería Nora premiamos el cumplimiento de metas con incentivos especiales y entregamos obsequios simbólicos en fechas importantes, como muestra de agradecimiento. Valoramos la constancia, el compromiso y la excelencia, fomentando una cultura laboral motivadora que inspire a todos los colaboradores a dar lo mejor de sí, generando orgullo y satisfacción al contribuir al éxito de la empresa y al bienestar de los clientes.
        </p>
      </div>

      <!-- Fila 3: Más beneficios para colaboradores -->
      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-percent"></i>
          <span>DESCUENTOS Y OPORTUNIDADES</span>
        </h2>
        <p>
          Nuestros colaboradores en Distribuidora Lencería Nora disfrutan de descuentos exclusivos y facilidades de crédito para adquirir productos de lencería de alta calidad. Además, promovemos el espíritu emprendedor ofreciendo apoyo a quienes deseen iniciar sus propios negocios relacionados con nuestros productos. Esta iniciativa fomenta la creatividad, la independencia económica y fortalece la relación con nuestro equipo, generando oportunidades que impulsan tanto su desarrollo personal como el crecimiento sostenido de la empresa en el mercado nacional.
        </p>
      </div>

      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-leaf"></i>
          <span>COMPROMISO SOCIAL Y AMBIENTAL</span>
        </h2>
        <p>
          En Distribuidora Lencería Nora nos comprometemos con la sostenibilidad y la protección del medio ambiente. Nuestros empaques son 100% ecológicos, fabricados en cartón y papel reciclables, eliminando el uso de plástico. Adoptamos prácticas responsables en cada etapa de nuestra operación, desde la distribución hasta la entrega final, promoviendo conciencia ambiental entre nuestros colaboradores y clientes. Esta filosofía fortalece nuestra misión de ofrecer productos de calidad mientras contribuyen al cuidado del planeta y al bienestar de la comunidad.
        </p>
      </div>

      <div class="cuadro">
        <h2 class="subtitulo">
          <i class="fas fa-users"></i>
          <span>UN EQUIPO CON CORAZÓN</span>
        </h2>
        <p>
          Somos más que una empresa: en Distribuidora Lencería Nora formamos un equipo unido y apasionado por lo que hacemos. Valoramos a nuestros colaboradores, respetamos el medio ambiente y fomentamos un ambiente laboral basado en la cooperación y el compromiso. Cada día trabajamos con dedicación y orgullo, asegurando que cada acción fortalezca la confianza de nuestros distribuidores y clientes. Nuestro enfoque en la calidad, la ética y la responsabilidad social define la esencia de nuestro equipo y nuestra marca.
        </p>
      </div>
    </section>
  </main>
@endsection
