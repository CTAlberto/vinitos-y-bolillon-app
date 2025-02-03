@extends('layouts.app')

@section('main-content')
<div class="container pt-16 mt-4 min-h-screen">
    <!-- Sección de Introducción -->
    <div class="text-center mb-6" data-aos="fade-up">
        <h1 class="text-4xl font-bold text-gray-800 mb-3">Regala una Experiencia Única</h1>
        <p class="text-lg text-gray-600">Sorprende a alguien especial con un curso de cata de vinos o una cata exclusiva. ¡Haz que su día sea inolvidable!</p>
    </div>

    <!-- Caja de Regalo Interactiva -->
    <div class="bg-white shadow-lg rounded-lg p-6 min-h-[400px]" data-aos="fade-up" data-aos-delay="200">
        <!-- Contenedor Dinámico para los Pasos e Interfaces -->
        <div id="dynamicStepContainer"></div>
        

        <!-- Campo oculto para almacenar el ID seleccionado -->
        <input type="hidden" id="experience_id" name="experience_id">
    </div>
</div>

<!-- Templates Ocultos para las Listas de Cursos y Catas -->
<!-- Lista de Cursos -->
<div id="coursesList" class="hidden">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Elige un Curso</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($cursos as $curso)
        <div class="h-full flex">
            <div class="p-4 bg-gray-100 rounded-lg shadow-md transition-transform transform hover:scale-105 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex flex-col md:flex-row items-center h-full">
                    <!-- Imagen del curso -->
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/grapes-4290308_1280.jpg') }}" class="block w-full h-96 object-cover" alt="{{ $curso->title_event }}">
                    </div>
                    <!-- Contenido del curso -->
                    <div class="w-full md:w-2/3 md:pl-4 flex flex-col justify-between h-full" data-aos="fade-left">
                        <h5 class="font-semibold text-gray-800 text-lg">{{ $curso->title_event }}</h5>
                        <h6 class="text-gray-600 mb-2">{{ $curso->location }}</h6>
                        <p class="text-gray-600 text-sm flex-grow">{{ Str::limit($curso->description, 150, '...') }}</p>
                        <ul class="list-disc list-inside text-gray-600 mb-2 text-sm">
                            <li><strong>Fecha inicio:</strong> {{ $curso->ini_date }}</li>
                            <li><strong>Fecha final:</strong> {{ $curso->end_date }}</li>
                            <li><strong>Capacidad:</strong> {{ $curso->capacity }}</li>
                        </ul>
                        <!-- Botón para seleccionar el curso como regalo -->
                        <div class="flex justify-end mt-4">
                            <button type="button" 
                                onclick="selectCourse({{ $curso->id }})" 
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg transition-colors duration-300 hover:bg-blue-600">
                                Seleccionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-600">No hay cursos disponibles en este momento.</p>
        @endforelse
    </div>
    <button onclick="loadInitialCards()" class="mt-4 border px-4 py-2 rounded">← Atrás</button>
</div>

<!-- Lista de Catas -->
<div id="tastingsList" class="hidden">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Elige una Cata</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($catas as $cata)
        <div class="h-full flex">
            <div class="p-4 bg-gray-100 rounded-lg shadow-md transition-transform transform hover:scale-105 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex flex-col md:flex-row items-center h-full">
                    <!-- Imagen de la cata -->
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ Vite::asset('resources/img/wine-tasting.jpg') }}" class="block w-full h-96 object-cover" alt="{{ $cata->title_event }}">
                    </div>
                    <!-- Contenido de la cata -->
                    <div class="w-full md:w-2/3 md:pl-4 flex flex-col justify-between h-full" data-aos="fade-left">
                        <h5 class="font-semibold text-gray-800 text-lg">{{ $cata->title_event }}</h5>
                        <h6 class="text-gray-600 mb-2">{{ $cata->location }}</h6>
                        <p class="text-gray-600 text-sm flex-grow">{{ Str::limit($cata->description, 150, '...') }}</p>
                        <ul class="list-disc list-inside text-gray-600 mb-2 text-sm">
                            <li><strong>Fecha inicio:</strong> {{ $cata->ini_date }}</li>
                            <li><strong>Fecha final:</strong> {{ $cata->end_date }}</li>
                            <li><strong>Capacidad:</strong> {{ $cata->capacity }}</li>
                        </ul>
                        <!-- Botón para seleccionar la cata como regalo -->
                        <div class="flex justify-end mt-4">
                            <button type="button" 
                                onclick="selectTasting({{ $cata->id }})" 
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg transition-colors duration-300 hover:bg-blue-600">
                                Seleccionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-600">No hay catas disponibles en este momento.</p>
        @endforelse
    </div>
    <button onclick="loadInitialCards()" class="mt-4 border px-4 py-2 rounded">← Atrás</button>
</div>


<!-- Librerías y Scripts (Confeti, SweetAlert y Flatpickr) -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // Al cargar la página se muestra la pantalla inicial con las dos tarjetas
    document.addEventListener('DOMContentLoaded', function() {
        loadInitialCards();
    });

    // Función para cargar la pantalla inicial con las dos tarjetas: Cursos y Catas
    function loadInitialCards() {
        const initialCards = `
            <div id="initialCards">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Elige una Experiencia</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="cursor-pointer border rounded-lg p-6 hover:shadow-md transition-shadow transform hover:scale-105" onclick="showCourses()">
                        <img src="{{ Vite::asset('resources/img/regalocata.jpg') }}" alt="Cursos" class="w-full h-48 object-cover rounded-t-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mt-4">Cursos</h3>
                        <p class="text-gray-600">Explora nuestros cursos de cata.</p>
                    </div>
                    <div class="cursor-pointer border rounded-lg p-6 hover:shadow-md transition-shadow transform hover:scale-105" onclick="showTastings()">
                        <img src="{{ Vite::asset('resources/img/regalocata.jpg') }}" alt="Catas" class="w-full h-48 object-cover rounded-t-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mt-4">Catas</h3>
                        <p class="text-gray-600">Descubre nuestras catas exclusivas.</p>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('dynamicStepContainer').innerHTML = initialCards;
    }

    // Muestra la lista de cursos (plantilla oculta)
    function showCourses() {
        document.getElementById('dynamicStepContainer').innerHTML = document.getElementById('coursesList').innerHTML;
    }

    // Muestra la lista de catas (plantilla oculta)
    function showTastings() {
        document.getElementById('dynamicStepContainer').innerHTML = document.getElementById('tastingsList').innerHTML;
    }

    // Funciones para iniciar el flujo de pasos tras la selección
    // Estas funciones se usan en el botón "Seleccionar" de cada tarjeta (ya no se usa el botón "Inscribirse")
    function selectCourse(courseId) {
        document.getElementById('experience_id').value = courseId;
        loadStep2();
    }

    function selectTasting(tastingId) {
        document.getElementById('experience_id').value = tastingId;
        loadStep2();
    }

    // Funciones de los pasos 2 a 5 (igual que en tu código original)
    function loadStep2() {
        const step2Content = `
            <div id="step2">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">2. Dedica el Regalo</h2>
                <div class="space-y-4">
                    <div>
                        <label for="recipient_name" class="block text-base font-medium text-gray-700 mb-1">Nombre del Destinatario</label>
                        <input type="text" name="recipient_name" id="recipient_name" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-wine-500 focus:border-transparent" required>
                    </div>
                    <div>
                        <label for="recipient_email" class="block text-base font-medium text-gray-700 mb-1">Correo del Destinatario</label>
                        <input type="email" name="recipient_email" id="recipient_email" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-wine-500 focus:border-transparent" required>
                    </div>
                    <div class="flex justify-between mt-6">
                        <button onclick="loadInitialCards()" class="border border-gray-500 text-gray-700 px-5 py-2 rounded-lg text-base font-medium transition hover:bg-gray-100 hover:border-gray-700">
                            ← Atrás
                        </button>
                        <button onclick="checkStep2()" class="bg-wine-600 text-gray px-6 py-3 rounded-lg text-base font-semibold shadow-md transition hover:bg-wine-700 hover:shadow-lg">
                            Continuar →
                        </button>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('dynamicStepContainer').innerHTML = step2Content;
    }

    function checkStep2() {
        const recipientName = document.getElementById('recipient_name').value.trim();
        const recipientEmail = document.getElementById('recipient_email').value.trim();
        if (recipientName !== '' && recipientEmail !== '') {
            loadStep3();
        } else {
            alert('Por favor, completa todos los campos.');
        }
    }

    function loadStep3() {
        const step3Content = `
            <div id="step3">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">3. Selecciona la Fecha de Entrega</h2>
                <div>
                    <label for="delivery_date" class="block text-base font-medium text-gray-700 mb-1">Fecha de Entrega</label>
                    <input type="text" name="delivery_date" id="delivery_date" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-wine-500 focus:border-transparent" required>
                </div>
                <div class="flex justify-between mt-6">
                    <button onclick="loadStep2()" class="border border-gray-500 text-gray-700 px-5 py-2 rounded-lg text-base font-medium transition hover:bg-gray-100 hover:border-gray-700">
                        ← Atrás
                    </button>
                    <button onclick="checkStep3()" class="bg-wine-600 text-gray px-6 py-3 rounded-lg text-base font-semibold shadow-md transition hover:bg-wine-700 hover:shadow-lg">
                        Continuar →
                    </button>
                </div>
            </div>
        `;
        document.getElementById('dynamicStepContainer').innerHTML = step3Content;
        flatpickr("#delivery_date", {
            dateFormat: "Y-m-d",
            minDate: "today",
            locale: "es"
        });
    }

    function checkStep3() {
        const deliveryDate = document.getElementById('delivery_date').value.trim();
        if (deliveryDate !== '') {
            loadStep4();
        } else {
            alert('Por favor, selecciona una fecha.');
        }
    }

    function loadStep4() {
        const step4Content = `
            <div id="step4">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">4. Añade un Mensaje</h2>
                <textarea name="message" id="message" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-wine-500 focus:border-transparent" rows="3" placeholder="Escribe un mensaje especial..."></textarea>
                <div class="flex justify-between mt-6">
                    <button onclick="loadStep3()" class="border border-gray-500 text-gray-700 px-5 py-2 rounded-lg text-base font-medium transition hover:bg-gray-100 hover:border-gray-700">
                        ← Atrás
                    </button>
                    <button onclick="checkStep4()" class="bg-wine-600 text-gray px-6 py-3 rounded-lg text-base font-semibold shadow-md transition hover:bg-wine-700 hover:shadow-lg">
                        Continuar →
                    </button>
                </div>
            </div>
        `;
        document.getElementById('dynamicStepContainer').innerHTML = step4Content;
    }

    function checkStep4() {
        const message = document.getElementById('message').value.trim();
        if (message !== '') {
            loadStep5();
        } else {
            alert('Por favor, escribe un mensaje.');
        }
    }

    function loadStep5() {
        const step5Content = `
            <div id="step5" class="text-center bg-white shadow-lg rounded-lg p-8 flex flex-col items-center space-y-6">
                <div class="w-16 h-16 flex items-center justify-center bg-green-500 text-white text-3xl rounded-full shadow-md">
                    ✅
                </div>
                <h2 class="text-2xl font-bold text-gray-800">¡Todo Listo!</h2>
                <p class="text-lg text-gray-600">Tu regalo está preparado para enviarse. Presiona el botón para confirmar.</p>
                <button type="submit" onclick="submitForm()" class="bg-wine-500 text-black px-8 py-4 rounded-full text-lg font-semibold hover:bg-wine-600 transition-transform transform hover:scale-105 shadow-lg">
                    Enviar Regalo Ahora
                </button>
            </div>
        `;
        document.getElementById('dynamicStepContainer').innerHTML = step5Content;
    }

    function submitForm() {
        Swal.fire({
            title: '¡Éxito!',
            text: '🎉 ¡Regalo enviado con éxito!',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            backdrop: true,
            allowOutsideClick: false,
            timer: 3000
        }).then(() => {
            confetti({
                particleCount: 200,
                spread: 70,
                origin: { y: 0.6 }
            });
            setTimeout(() => {
                window.location.href = "{{ url('/welcome') }}";
            }, 1000);
        });
    }
</script>

@endsection