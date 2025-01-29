@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
    <h1 class="mb-4">Inscripción al curso: {{ $curso->title_event }}</h1>
    <p><strong>Descripción:</strong> {{ $curso->description }}</p>
    <p><strong>Fecha de inicio:</strong> {{ $curso->ini_date }}</p>
    <p><strong>Ubicación:</strong> {{ $curso->location }}</p>
    
    <form action="{{ route('procesar.inscripcion') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="tel" class="form-label">Teléfono:</label>
        <input type="tel" name="tel" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
            <label for="textarea" class="form-label">Motivo inscripción:</label>
            <input type="textarea" name="reason" class="form-control" required>
        </div>
    <div style="display: none;">
        <input type="hidden" name="validation" value="pending">
    </div>
    <div style="display: none;">
        <input type="hidden" name="curso_id" value="{{ $curso->id }}">
    </div>
   
    <button type="submit" class="btn btn-primary">Inscribirse</button>
</form>
<div class="container mt-5 min-h-[30vh]">
</div>
@endsection
