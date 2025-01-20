@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
    <!-- Título -->
    <h1 class="text-center mb-5" style="font-weight: bold; color: #333;" data-aos="fade-up">Información para Empresas</h1>

    <p class="text-center text-muted mb-5" style="font-size: 1.1rem;">
        Descubre cómo nuestras catas y cursos pueden ser la experiencia ideal para tus empleados o clientes. Desde eventos personalizados hasta actividades de formación únicas, encontrarás una opción que se ajuste a tus necesidades corporativas.
    </p>

    <!-- Listado de eventos -->
    <div class="row">
        @foreach ($eventos as $evento)
        <div class="col-12 mb-4">
            <div class="p-3" style="background-color: #f8f9fa; border-radius: 8px;" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="row g-3 align-items-center">
                    <!-- Imagen del evento -->
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/sample-event.jpg') }}" class="block w-full h-96 object-cover" alt="{{ $evento->title_event }}">
                    </div>
                    <!-- Contenido del evento -->
                    <div class="col-md-8" data-aos="fade-left">
                        <h5 class="card-title" style="font-weight: 600; color: #333;">{{ $evento->title_event }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $evento->location }}</h6>
                        <p class="text-muted mb-2" style="font-size: 0.95rem;">{{ Str::limit($evento->description, 150, '...') }}</p>
                        <ul class="list-inline text-muted mb-2" style="font-size: 0.9rem;">
                            <li class="list-inline-item"><strong>Tipo:</strong> {{ $evento->category->name }}</li>
                            <li class="list-inline-item"><strong>Fecha inicio:</strong> {{ $evento->ini_date }}</li>
                            <li class="list-inline-item"><strong>Capacidad:</strong> {{ $evento->capacity }}</li>
                        </ul>
                        <!-- Botón para más información -->
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="text-primary" style="font-weight: bold;">${{ $evento->price }}</span>
                            <a href="{{ route('empresas.evento', $evento->id) }}" class="btn btn-info px-4 py-2" data-aos="zoom-in">Informarme</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
