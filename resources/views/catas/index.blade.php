@extends('layouts.app')

@section('main-content')
<div class="container mt-5" style="margin-top: 50px;">
<div class="mb-5 p-4 text-center" style="background-color: #f8f9fa; border-radius: 8px;" data-aos="fade-up">
        <div class="row align-items-center justify-content-center">
            
            <div class="col-md-8" data-aos="fade-left">
                <h2 style="font-weight: bold; color: #333; text-align: center;">Aprende a catar</h2>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6; text-align: center;">
                Nuestras catas te brindan experiencias sensoriales únicas, ideales para descubrir y disfrutar del fascinante mundo de los sabores y aromas. Con horarios flexibles y ubicaciones variadas, nuestras catas están diseñadas tanto para principiantes como para conocedores, asegurando que encuentres la experiencia perfecta para tu paladar.
                </p>
                <p class="text-muted" style="font-size: 1rem; text-align: center;">
                    <i class="bi bi-clock-fill" style="color: #ff6f61;"></i> Horarios personalizables &nbsp;&bull;&nbsp; 
                    <i class="bi bi-geo-alt-fill" style="color: #ff6f61;"></i> Disponibles en distintas ciudades
                </p>
            </div>
        </div>
    </div>
    <!-- Listado de catas -->
    <h1 class="text-center mb-5" style="font-weight: bold; color: #333;" data-aos="fade-up">Listado de Catas</h1>
    <div class="row">
        @forelse ($catas as $cata)
        <div class="col-12 mb-4">
            <div class="p-3" style="background-color: #f8f9fa; border-radius: 8px;" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="row g-3 align-items-center">
                    <!-- Imagen de la cata -->
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/sample-cata.jpg') }}" class="block w-full h-96 object-cover" alt="{{ $cata->title_event }}">
                    </div>
                    <!-- Contenido de la cata -->
                    <div class="col-md-8" data-aos="fade-left">
                        <h5 class="card-title" style="font-weight: 600; color: #333;">{{ $cata->title_event }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $cata->location }}</h6>
                        <p class="text-muted mb-2" style="font-size: 0.95rem;">{{ Str::limit($cata->description, 150, '...') }}</p>
                        <ul class="list-inline text-muted mb-2" style="font-size: 0.9rem;">
                            <li class="list-inline-item"><strong>Fecha inicio:</strong> {{ $cata->ini_date }}</li>
                            <li class="list-inline-item"><strong>Fecha final:</strong> {{ $cata->end_date }}</li>
                            <li class="list-inline-item"><strong>Capacidad:</strong> {{ $cata->capacity }}</li>
                        </ul>
                        <!-- Botón de inscripción -->
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="text-primary" style="font-weight: bold;">${{ $cata->price }}</span>
                            <a href="{{ route('inscribirse', $cata->id) }}" class="btn btn-primary px-4 py-2" data-aos="zoom-in">Inscribirse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">No hay catas disponibles en este momento.</p>
        @endforelse
    </div>
</div>
@endsection

