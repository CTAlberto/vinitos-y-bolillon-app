@extends('layouts.app')

@section('main-content')
<div class="container pt-32 mt-5" style="margin-top: 50px;">
    <!-- Tarjeta de descripción general -->
    <div class="mb-5 p-4 text-center" style="background-color: #f8f9fa; border-radius: 8px;" data-aos="fade-up">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8" data-aos="fade-left">
            <h2 class="text-4xl font-bold text-gray-800 mb-6"data-aos="fade-right" data-aos-delay="200"data-aos-duration="1000">Nuestros cursos</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6 text-justify" style="margin-bottom: 0.5em;"data-aos="fade-left" data-aos-delay="200"data-aos-duration="1000">
                Ya seas un principiante curioso o un aficionado experimentado, nuestros programas están diseñados para adaptarse a tus necesidades y niveles de conocimiento. Cada curso te brindará las herramientas necesarias para comprender mejor los diferentes tipos de vino, sus procesos de elaboración, las técnicas de cata y mucho más.                 
                </p>

            </div>
        </div>
    </div>

    <!-- Listado de cursos -->
    <h1 class="text-center mb-5" style="font-weight: bold; color: #333;" data-aos="fade-up">Cursos Disponibles</h1>
    <div class="row">
        @foreach ($cursos as $curso)
        <div class="col-12 mb-4">
            <div class="p-3" style="background-color: #f8f9fa; border-radius: 8px;"data-aos="zoom-in" data-aos-duration="1000" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="row g-3 align-items-center">
                    <!-- Imagen del curso -->
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/grapes-4290308_1280.jpg') }}" class="block w-full h-96 object-cover" alt="Vino 2">
                        <!--<img src="{{ asset('images/cursos/' . $curso->image) }}" alt="{{ $curso->title_event }}" 
                             class="img-fluid rounded" 
                             style="object-fit: cover; height: 100%; width: 100%; border-radius: 8px;">-->
                    </div>
                    <!-- Contenido del curso -->
                    <div class="col-md-8" >
                        <h5 class="card-title" style="font-weight: 600; color: #333;">{{ $curso->title_event }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $curso->subtitle }}</h6>
                        <p class="text-muted mb-2" style="font-size: 0.95rem;">{{ Str::limit($curso->description, 300, '...') }}</p>
                        <ul class="list-inline text-muted mb-2" style="font-size: 0.9rem;">
                            <li class="list-inline-item"><strong>Inicio:</strong> {{ $curso->ini_date }}</li>
                            <li class="list-inline-item"><strong>Ubicación:</strong> {{ $curso->location }}</li>
                            <li class="list-inline-item"><strong>Capacidad:</strong> {{ $curso->capacity }}</li>
                            <li class="list-inline-item"><strong>Idioma:</strong> {{ $curso->language }}</li>
                        </ul>
                        <h5 class="card-title" style="font-weight: 600; color: #333;">Contenido:</h5>
                        <p>
                            {{ $curso->content }}
                        </p>
                        <!-- Botón de inscripción -->
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <span class="text-primary mb-2" style="font-weight: bold;">{{ $curso->price }}€</span>
                            <div class="d-flex gap-2 mt-4">
                                <a href="{{ route('inscribirse', $curso->id) }}" class="btn btn-primary px-4 py-2" data-aos="zoom-in">Inscribirse</a>
                                <a href="https://www.google.com/maps?q=37.39118345901626,-6.000890322464233" class="btn btn-primary px-4 py-2" data-aos="zoom-in" target="_blank">
                                    <i class="fas fa-map-marker-alt"></i> Ubicación
                                </a>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
