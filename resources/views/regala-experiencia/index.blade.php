@extends('layouts.app')

@section('main-content')
<div class="container pt-32 mt-5">
    <!-- Tarjeta de descripción general -->
    <div class="mb-5 p-4 text-center bg-gray-100 rounded-lg" data-aos="fade-up">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8" data-aos="fade-left">
                <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">Regala una Experiencia</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6 text-justify">
                    ¿Quieres sorprender a alguien especial? Regálales una experiencia única y memorable. Elige uno de nuestros cursos disponibles y haz un regalo que será inolvidable.
                </p>
            </div>
        </div>
    </div>

    <!-- Formulario para regalar una experiencia -->
    <h1 class="text-center mb-5 font-bold text-gray-800" data-aos="fade-up">Elige el curso para regalar</h1>

    <form action="{{ route('regala-experiencia.submit') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Selección del curso -->
            <div class="col-12 mb-4">
                <label for="course_id" class="form-label">Selecciona un curso:</label>
                <select name="course_id" id="course_id" class="form-select" required>
                    <option value="" disabled selected>Elige un curso</option>
                    @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->title_event }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nombre del destinatario -->
            <div class="col-12 mb-4">
                <label for="recipient_name" class="form-label">Nombre del destinatario:</label>
                <input type="text" name="recipient_name" id="recipient_name" class="form-control" required>
            </div>

            <!-- Correo del destinatario -->
            <div class="col-12 mb-4">
                <label for="recipient_email" class="form-label">Correo del destinatario:</label>
                <input type="email" name="recipient_email" id="recipient_email" class="form-control" required>
            </div>

            <!-- Mensaje personalizado -->
            <div class="col-12 mb-4">
                <label for="message" class="form-label">Mensaje personalizado:</label>
                <textarea name="message" id="message" class="form-control" rows="4"></textarea>
            </div>

            <!-- Botón de envío con margen -->
            <div class="col-12 mb-8"> <!-- Añadí mb-8 aquí para margen inferior -->
                <button type="submit" class="btn btn-primary px-4 py-2">Regalar experiencia</button>
            </div>
        </div>
    </form>
</div>
@endsection