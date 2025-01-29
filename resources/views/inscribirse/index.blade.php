@extends('layouts.app')

@section('main-content')
<div class="flex justify-center items-center min-h-screen py-16">
    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-lg border border-gray-200 mt-20 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Inscripción al curso: {{ $curso->title_event }}</h1>
        <p class="text-gray-600 mb-4 text-left">{{ $curso->description }}</p>
        <p class="text-gray-600 text-left"><strong>Fecha de inicio:</strong> {{ $curso->ini_date }}</p>
        <p class="text-gray-600 text-left mb-6"><strong>Ubicación:</strong> {{ $curso->location }}</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $curso->id }}" data-lat="{{ $curso->latitude }}" data-lng="{{ $curso->longitude }}" data-aos="zoom-in" data-aos-duration="1000">
            <i class="fas fa-map-marker-alt"></i> Ubicación
        </button>
        
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
    
    <!-- Modal de Ubicación -->
    <div class="modal fade" id="modal-{{ $curso->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubicación del curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="map-{{ $curso->id }}" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none;">
        <input type="hidden" name="curso_id" value="{{ $curso->id }}">
    </div>
   
    <button type="submit" class="btn btn-primary">Inscribirse</button>
</form>
<div class="container mt-5 min-h-[30vh]">
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
        event.preventDefault(); // Evita el envío inmediato del formulario
        document.getElementById('modal').classList.remove('hidden'); // Muestra el modal
    });

    document.getElementById('confirmBtn').addEventListener('click', function() {
        document.getElementById('inscripcionForm').submit(); //envía el formulario
    });
</script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let maps = {};

        // Escuchar cuando cualquier modal se abre
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                const modalId = this.getAttribute('data-bs-target');
                const lat = this.getAttribute('data-lat');
                const lng = this.getAttribute('data-lng');

                // Inicializar el mapa al abrir el modal
                document.querySelector(modalId).addEventListener('shown.bs.modal', function () {
                    if (!maps[modalId]) {
                        maps[modalId] = L.map(modalId.replace('#modal-', 'map-')).setView([lat, lng], 13);
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; OpenStreetMap'
                        }).addTo(maps[modalId]);
                        L.marker([lat, lng]).addTo(maps[modalId]);
                    } else {
                        maps[modalId].invalidateSize();
                    }
                });
            });
        });
    });
</script>

@endsection
