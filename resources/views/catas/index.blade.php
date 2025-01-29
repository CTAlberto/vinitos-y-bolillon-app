@extends('layouts.app')

@section('main-content')
<div class="container pt-32 mt-5">
    <!-- Tarjeta de descripción general -->
    <div class="mb-5 p-4 text-center bg-gray-100 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="fade-up">
        <div class="flex items-center justify-center">
            <div class="w-full md:w-2/3" data-aos="fade-left">
                <h2 class="font-bold text-gray-800 text-3xl mb-2">Aprende a catar</h2>
                
                <p class="text-gray-700 text-lg leading-relaxed mb-4">
                    Nuestras catas te brindan experiencias sensoriales únicas, ideales para descubrir y disfrutar del fascinante mundo de los sabores y aromas. Con horarios flexibles y ubicaciones variadas, nuestras catas están diseñadas tanto para principiantes como para conocedores, asegurando que encuentres la experiencia perfecta para tu paladar.
                </p>
                <p class="text-gray-600 text-base">
                    <i class="bi bi-clock-fill text-red-500"></i> Horarios personalizables &nbsp;&bull;&nbsp; 
                    <i class="bi bi-geo-alt-fill text-red-500"></i> Disponibles en distintas ciudades
                </p>
            </div>
        </div>
    </div>

    <!-- Listado de catas -->
    <h1 class="text-center mb-5 font-bold text-gray-800 text-3xl" data-aos="fade-up">Listado de Catas</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($catas as $cata)
        <div class="mb-4">
            <div class="p-4 bg-gray-100 rounded-lg shadow-md transition-transform transform hover:scale-105" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex flex-col md:flex-row g-3 items-center">
                    <!-- Imagen de la cata -->
                    <div class="md:w-1/3" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/sample-cata.jpg') }}" class="w-full h-48 object-cover rounded-lg shadow-sm" alt="{{ $cata->title_event }}">
                    </div>
                    <!-- Contenido de la cata -->
                    <div class="md:w-2/3 md:pl-4" data-aos="fade-left">
                        <h5 class="font-semibold text-gray-800 text-lg">{{ $cata->title_event }}</h5>
                        <h6 class="text-gray-600 mb-2">{{ $cata->location }}</h6>
                        <p class="text-gray-600 mb-2 text-sm">{{ Str::limit($cata->description, 150, '...') }}</p>
                        <ul class="list-disc list-inside text-gray-600 mb-2 text-sm">
                            <li><strong>Fecha inicio:</strong> {{ $cata->ini_date }}</li>
                            <li><strong>Fecha final:</strong> {{ $cata->end_date }}</li>
                            <li><strong>Capacidad:</strong> {{ $cata->capacity }}</li>
                        </ul>
                        <!-- Botón de inscripción -->
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-red-600 font-bold text-lg">${{ $cata->price }}</span>
                            <a href="{{ route('inscribirse', $cata->id) }}" class="bg-red-500 text-white px-4 py-2 rounded-lg transition-colors duration-300 hover:bg-red-600" data-aos="zoom-in">Inscribirse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-600">No hay catas disponibles en este momento.</p>
        @endforelse
    </div>
</div>
@endsection