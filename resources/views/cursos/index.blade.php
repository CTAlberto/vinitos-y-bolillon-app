@extends('layouts.app')

@section('main-content')
<div class="container mt-5" style="margin-top: 50px;">
    <!-- Tarjeta de descripción general -->
    <div class="mb-5 p-4 text-center" style="background-color: #f8f9fa; border-radius: 8px;" data-aos="fade-up">
        <div class="row align-items-center justify-content-center">
            
            <div class="col-md-8" data-aos="fade-left">
                <h2 style="font-weight: bold; color: #333; text-align: center;">Aprende de los Mejores</h2>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.6; text-align: center;">
                    Nuestros cursos te ofrecen experiencias educativas únicas, con horarios flexibles y múltiples localizaciones. Ya seas un principiante o un profesional, encontrarás un curso que se ajuste a tus necesidades.
                </p>
                <p class="text-muted" style="font-size: 1rem; text-align: center;">
                    <i class="bi bi-clock-fill" style="color: #ff6f61;"></i> Horarios personalizables &nbsp;&bull;&nbsp; 
                    <i class="bi bi-geo-alt-fill" style="color: #ff6f61;"></i> Disponibles en distintas ciudades
                </p>
            </div>
        </div>
    </div>

    <!-- Listado de cursos -->
    <h1 class="text-center mb-5" style="font-weight: bold; color: #333;" data-aos="fade-up">Cursos Disponibles</h1>
    <div class="row">
        @foreach ($cursos as $curso)
        <div class="col-12 mb-4">
            <div class="p-3" style="background-color: #f8f9fa; border-radius: 8px;" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="row g-3 align-items-center">
                    <!-- Imagen del curso -->
                    

                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/grapes-4290308_1280.jpg') }}" class="block w-full h-96 object-cover" alt="Vino 2">
                        <!--<img src="{{ asset('images/cursos/' . $curso->image) }}" alt="{{ $curso->title_event }}" 
                             class="img-fluid rounded" 
                             style="object-fit: cover; height: 100%; width: 100%; border-radius: 8px;">-->
                    </div>
                    <!-- Contenido del curso -->
                    <div class="col-md-8" data-aos="fade-left">
                        <h5 class="card-title" style="font-weight: 600; color: #333;">{{ $curso->title_event }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $curso->subtitle }}</h6>
                        <p class="text-muted mb-2" style="font-size: 0.95rem;">{{ Str::limit($curso->description, 150, '...') }}</p>
                        <ul class="list-inline text-muted mb-2" style="font-size: 0.9rem;">
                            <li class="list-inline-item"><strong>Inicio:</strong> {{ $curso->ini_date }}</li>
                            <li class="list-inline-item"><strong>Ubicación:</strong> {{ $curso->location }}</li>
                            <li class="list-inline-item"><strong>Capacidad:</strong> {{ $curso->capacity }}</li>
                        </ul>
                        <!-- Botón de inscripción -->
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="text-primary" style="font-weight: bold;">${{ $curso->price }}</span>
                            <a href="{{ route('inscribirse', $curso->id) }}" class="btn btn-primary px-4 py-2" data-aos="zoom-in">Inscribirse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
