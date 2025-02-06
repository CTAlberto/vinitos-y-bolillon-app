@extends('layouts.app')
@section('main-content')

<!-- Estilos personalizados solo para #mapTest -->
<style>
    #mapTest {
        width: 100%;
        height: 600px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background-color: #F7F4E9;
    }
</style>

<div class="container pt-32 mt-5">
    <!-- Tarjeta de descripción general -->
    <div class="mb-5 p-4 text-center bg-[#F7F4E9] rounded-xl shadow-md" data-aos="fade-up">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8" data-aos="fade-left">
                <h2 class="text-4xl font-bold text-[#8B5C3B] mb-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">Nuestros cursos</h2>
                <p class="text-lg text-[#6F4E37] leading-relaxed mb-6 text-justify" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                    Ya seas un principiante curioso o un aficionado experimentado, nuestros programas están diseñados para adaptarse a tus necesidades y niveles de conocimiento. Cada curso te brindará las herramientas necesarias para comprender mejor los diferentes tipos de vino, sus procesos de elaboración, las técnicas de cata y mucho más.
                </p>
            </div>
        </div>
    </div>

    <!-- Listado de cursos -->
    <h1 class="text-center mb-5 text-3xl font-bold text-[#8B5C3B]">Cursos Disponibles</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($cursos as $curso)
        <div class="bg-[#F7F4E9] rounded-xl shadow-md p-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Imagen del curso -->
                <div class="md:w-1/3">
                    <img src="{{ Vite::asset('resources/img/grapes-4290308_1280.jpg') }}" alt="Curso {{ $curso->title_event }}" class="w-full h-64 object-cover rounded-md shadow-sm">
                </div>
                <!-- Contenido del curso -->
                <div class="md:w-2/3">
                    <h5 class="text-2xl font-bold text-[#8B5C3B]">{{ $curso->title_event }}</h5>
                    <h6 class="text-lg font-medium text-[#6F4E37]">{{ $curso->subtitle }}</h6>
                    <p class="text-base text-[#6F4E37]">{{ Str::limit($curso->description, 150, '...') }}</p>
                    <ul class="list-disc list-inside text-sm text-[#6F4E37]">
                        <li><strong>Inicio:</strong> {{ $curso->ini_date }}</li>
                        <li><strong>Ubicación:</strong> {{ $curso->location }}</li>
                        <li><strong>Capacidad:</strong> {{ $curso->capacity }}</li>
                        <li><strong>Idioma:</strong> {{ $curso->language }}</li>
                    </ul>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-xl font-bold text-[#8B5C3B]">{{ $curso->price }}€</span>
                        <div class="flex gap-2">
                            <a href="{{ route('inscribirse', $curso->id) }}" class="btn btn-primary bg-[#8B5C3B] hover:bg-[#6F4E37] text-white px-4 py-2 rounded-md shadow-sm transition duration-300">Inscribirse</a>
                            <button type="button" class="btn bg-[#8B5C3B] hover:bg-[#6F4E37] text-white px-4 py-2 rounded-md shadow-sm transition duration-300" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modal-{{ $curso->id }}" 
                                    data-lat="{{ $curso->latitude }}" 
                                    data-lng="{{ $curso->longitude }}">
                                <i class="fas fa-map-marker-alt"></i> Ubicación
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $curso->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-[#F7F4E9] text-[#6F4E37]">
                    <div class="modal-header">
                        <h5 class="modal-title text-[#8B5C3B] font-bold" id="exampleModalLabel">Ubicación del curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="mapTest"></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Script Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let maps = {};

        // Escuchar cuando cualquier modal se abre
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function () {
                const modalId = this.getAttribute('data-bs-target').replace('#', '');
                const lat = parseFloat(this.getAttribute('data-lat'));
                const lng = parseFloat(this.getAttribute('data-lng'));

                // Obtener el contenedor del mapa dentro del modal
                const mapContainer = document.getElementById(modalId).querySelector('#mapTest');

                // Inicializar el mapa cuando el modal sea mostrado
                document.getElementById(modalId).addEventListener('shown.bs.modal', function () {
                    if (!maps[modalId]) {
                        // Crear el mapa si no existe
                        maps[modalId] = L.map(mapContainer).setView([lat, lng], 13);

                        // Agregar la capa de tiles
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; OpenStreetMap'
                        }).addTo(maps[modalId]);

                        // Agregar un marcador en la ubicación
                        L.marker([lat, lng]).addTo(maps[modalId]);
                    } else {
                        // Recalibrar el tamaño del mapa si ya existe
                        maps[modalId].invalidateSize();
                    }
                });
            });
        });
    });
</script>

@endsection