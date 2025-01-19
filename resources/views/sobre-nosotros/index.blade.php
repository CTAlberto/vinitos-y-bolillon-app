@extends('layouts.app')

@section('main-content')
<div class="container mx-auto px-4 lg:px-20 mt-28 mb-20" data-aos="fade-up" data-aos-duration="1000">
    <div class="text-center mb-12" data-aos="fade-down" data-aos-duration="1000">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">Sobre Nosotros</h1>
        <p class="text-lg text-gray-600">Conoce más acerca de nuestra misión, valores y pasión por el vino.</p>
    </div>

    <!-- Sección Historia -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
        <div class="flex items-center" data-aos="fade-right" data-aos-duration="1000">
            <img src="{{ Vite::asset('resources/img/vino.jpg') }}" alt="Nuestra historia" class="rounded-lg shadow-lg w-full h-auto">
        </div>
        <div class="flex flex-col justify-center" data-aos="fade-left" data-aos-duration="1000">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nuestra Historia</h2>
            <p class="text-gray-700 leading-relaxed">
                Nuestra pasión por el vino comenzó hace más de 20 años, cuando decidimos compartir nuestra experiencia
                con el mundo. Desde entonces, hemos trabajado incansablemente para ofrecer a nuestros clientes no solo
                los mejores vinos, sino también un conocimiento profundo sobre su arte y cultura.
            </p>
        </div>
    </div>

    <!-- Sección Misión y Visión -->
    <div class="bg-gray-100 p-8 rounded-lg shadow-lg mb-16" data-aos="zoom-in" data-aos-duration="1000">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Misión -->
            <div data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nuestra Misión</h2>
                <p class="text-gray-700 leading-relaxed">
                    Inspirar a nuestros clientes a descubrir y disfrutar los vinos de la mejor calidad, combinando
                    tradición y modernidad para crear experiencias inolvidables.
                </p>
            </div>
            <!-- Visión -->
            <div data-aos="fade-left" data-aos-duration="1000">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nuestra Visión</h2>
                <p class="text-gray-700 leading-relaxed">
                    Convertirnos en un referente mundial en la distribución y educación sobre vinos, guiando a las
                    personas en su viaje para encontrar el vino perfecto para cada momento especial.
                </p>
            </div>
        </div>
    </div>

    <!-- Sección Equipo -->
    <div class="mb-16">
        <div class="text-center mb-12" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="text-4xl font-semibold text-gray-800">Nuestro Equipo</h2>
            <p class="text-lg text-gray-600">Personas apasionadas que hacen todo esto posible.</p>
        </div>

        <!-- Miembros del equipo -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="text-center" data-aos="flip-left" data-aos-duration="1000">
                <img src="{{ Vite::asset('resources/img/maria.jpg') }}"  class="w-48 h-48 object-cover rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">María López</h3>
                <p class="text-gray-600">Sumiller Experta</p>
            </div>
            <div class="text-center" data-aos="flip-left" data-aos-duration="1000">
                <img src="{{ Vite::asset('resources/img/pilar.jpg') }}"  class="w-48 h-48 object-cover rounded-full mx-auto mb-4 shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Pilar Pérez Vaca</h3>
                <p class="text-gray-600">Profesora de Formación Profesional, Sumiller.</p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-gray-200 to-gray-300 p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center" data-aos="fade-down" data-aos-duration="1000">Nuestros Valores</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="text-center">
                <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-duration="1000">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pasión</h3>
                    <p class="text-gray-700">Amamos lo que hacemos y compartimos nuestra pasión en cada detalle.</p>
                </div>
            </div>
            <div class="text-center">
                <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Calidad</h3>
                    <p class="text-gray-700">Seleccionamos los mejores productos para garantizar una experiencia única.</p>
                </div>
            </div>
            <div class="text-center">
                <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Innovación</h3>
                    <p class="text-gray-700">Buscamos nuevas formas de conectar a las personas con el mundo del vino.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
