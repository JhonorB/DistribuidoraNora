@extends('layouts.app')

@section('title', 'Distribuidoras - Lencería Nora')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/distribuidora.css') }}">
@endsection

@section('content')
<main class="main-nora">
    <div class="main-title-nora">
        <h1>Distribuidora Lencería Nora</h1>
        <p>Calidad, estilo y confianza en cada prenda</p>
        <p>Encuentra nuestras sucursales en Lima - La Victoria</p>
    </div>

    <!-- Tienda 1 -->
    <div class="store-one">
        <h2>Tienda 1</h2>
        <p>Dirección: Jr. América 325, Tienda 2, La Victoria 15018, Lima</p>
        <p>Teléfono: <a href="tel:976553014" class="phone-one">976553014</a></p>
        <p>Correo electrónico: <a href="mailto:lencerianora2026@gmail.com" class="email-one">lencerianora2026@gmail.com</a></p>
        <p><strong>Horario:</strong> Lunes a Sábado, de 9:00 a.m. a 7:00 p.m. (atención continua durante todo el día)</p>
        <div class="map-one">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.3124873409285!2d-77.0623!3d-12.0565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8bb78f8a3d7%3A0x0!2sJr.%20Am%C3%A9rica%20325%2C%20La%20Victoria%2015018!5e0!3m2!1ses-419!2spe!4v1693710000000!5m2!1ses-419!2spe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- Tienda 2 -->
    <div class="store-two">
        <h2>Tienda 2</h2>
        <p>Dirección: Jirón Hipólito Unanue 1457, Tienda 1, La Victoria 15018 (A una cuadra del Parque Cánepa, toldo color negro, cruzando la Av. Huánuco)</p>
        <p>Teléfono: <a href="tel:976553014" class="phone-two">976553014</a></p>
        <p>Correo electrónico: <a href="mailto:lencerianora2026@gmail.com" class="email-two">lencerianora2026@gmail.com</a></p>
        <p><strong>Horario:</strong> Lunes a Sábado, de 9:00 a.m. a 7:00 p.m. (horario corrido con atención personalizada en tienda)</p>
        <div class="map-two">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.102834567908!2d-77.023879!3d-12.066661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8a02b1c9c8d%3A0x0!2sJir%C3%B3n%20Hip%C3%B3lito%20Unanue%201457%2C%20Lima%2015018!5e0!3m2!1ses-419!2spe!4v1693710000000!5m2!1ses-419!2spe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</main>
@endsection
