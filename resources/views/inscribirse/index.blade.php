@extends('layouts.app')

@section('main-content')
<div class="flex justify-center items-center min-h-screen py-16s";>
    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-lg border border-gray-200 mt-10">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Inscripción al curso: {{ $curso->title_event }}</h1>
        <p class="text-gray-600 mb-4 text-left">{{ $curso->description }}</p>
        <p class="text-gray-600 text-left"><strong>Fecha de inicio:</strong> {{ $curso->ini_date }}</p>
        <p class="text-gray-600 text-left mb-6"><strong>Ubicación:</strong> {{ $curso->location }}</p>
        
        <form id="inscripcionForm" action="{{ route('procesar.inscripcion') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-medium text-gray-700">Nombre:</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="tel" class="block font-medium text-gray-700">Teléfono:</label>
                <input type="tel" name="tel" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="email" class="block font-medium text-gray-700">Correo electrónico:</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="reason" class="block font-medium text-gray-700">Motivo inscripción:</label>
                <textarea name="reason" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            
            <input type="hidden" name="validation" value="pending">
            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Inscribirse</button>
        </form>
    </div>
</div>

<!-- Modal de Confirmación -->
<div id="modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-sm">
        <h2 class="text-lg font-bold text-gray-800">¡Inscripción enviada!</h2>
        <p class="text-gray-600 mt-2">Nos pondremos en contacto contigo por teléfono o correo.</p>
        <button id="confirmBtn" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Aceptar</button>
    </div>
</div>

<script>
    document.getElementById('inscripcionForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío real
        document.getElementById('modal').classList.remove('hidden');
    });
    document.getElementById('confirmBtn').addEventListener('click', function() {
        window.location.href = "{{ url('/') }}"; // Redirigir a la página principal
    });
</script>
@endsection