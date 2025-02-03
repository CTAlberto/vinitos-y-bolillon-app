@extends('layouts.app')

@section('main-content')
<div class="container pt-16 mt-4 min-h-screen">
    <!-- Sección de Introducción -->
    <div class="text-center mb-6" data-aos="fade-up">
        <h1 class="text-4xl font-bold text-gray-800 mb-3"> Regala una Experiencia Única</h1>
        <p class="text-lg text-gray-600">Sorprende a alguien especial con un curso de cata de vinos. ¡Haz que su día sea inolvidable!</p>
    </div>

    <!-- Caja de Regalo Interactiva -->
    <div class="bg-white shadow-lg rounded-lg p-6 min-h-[400px]" data-aos="fade-up" data-aos-delay="200">
        <!-- Contenedor Dinámico para los Pasos -->
        <div id="dynamicStepContainer">
            <!-- Paso 1: Selección del Curso (Carrusel) -->
            <div id="step1">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">1. Elige el Curso</h2>
                <div id="carouselCursos" class="relative overflow-hidden w-full">
                    <div class="flex transition-transform duration-300 ease-in-out" id="carouselInner">
                        @foreach ($cursos as $curso)
                        <div class="w-full flex-shrink-0 p-4 text-center">
                            <div class="cursor-pointer border rounded-lg p-4 hover:shadow-md transition-shadow transform hover:scale-105" onclick="selectCourse({{ $curso->id }})">
                                <img src="{{ Vite::asset('resources/img/grapes-4290308_1280.jpg') }}" class="block w-full h-48 object-cover rounded-t-lg" alt="{{ $curso->title_event }}">
                                <div class="p-3">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $curso->title_event }}</h3>
                                    <p class="text-sm text-gray-600">{{ $curso->short_description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button onclick="prevSlide()" 
    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 border border-gray-400 text-gray-700 p-3 rounded-full shadow-md transition hover:bg-gray-200 hover:scale-105">
    ❮
</button>
<button onclick="nextSlide()" 
    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 border border-gray-400 text-gray-700 p-3 rounded-full shadow-md transition hover:bg-gray-200 hover:scale-105">
    ❯
</button>
                </div>
                <input type="hidden" name="course_id" id="course_id" required>
            </div>
        </div>
    </div>
</div>

<!-- Librería de Confeti -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Librería flatpickr para selección de fechas -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll("#carouselInner > div");
    const totalSlides = slides.length;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        document.getElementById("carouselInner").style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    }

    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalSlides - 1;
        }
        updateCarousel();
    }

    function selectCourse(courseId) {
        document.getElementById('course_id').value = courseId;
        loadStep2();
    }

    function loadStep1() {
    document.getElementById('dynamicStepContainer').innerHTML = document.getElementById('step1').outerHTML;
    }

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
    <button onclick="loadStep1()" 
        class="border border-gray-500 text-gray-700 px-5 py-2 rounded-lg text-base font-medium transition hover:bg-gray-100 hover:border-gray-700">
        ← Atrás
    </button>
    <button onclick="checkStep2()" 
        class="bg-wine-600 text-gray px-6 py-3 rounded-lg text-base font-semibold shadow-md transition hover:bg-wine-700 hover:shadow-lg">
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
    <button onclick="loadStep2()" 
        class="border border-gray-500 text-gray-700 px-5 py-2 rounded-lg text-base font-medium transition hover:bg-gray-100 hover:border-gray-700">
        ← Atrás
    </button>
    <button onclick="checkStep3()" 
        class="bg-wine-600 text-gray px-6 py-3 rounded-lg text-base font-semibold shadow-md transition hover:bg-wine-700 hover:shadow-lg">
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
    <button onclick="loadStep3()" 
        class="border border-gray-500 text-gray-700 px-5 py-2 rounded-lg text-base font-medium transition hover:bg-gray-100 hover:border-gray-700">
        ← Atrás
    </button>
    <button onclick="checkStep4()" 
        class="bg-wine-600 text-gray px-6 py-3 rounded-lg text-base font-semibold shadow-md transition hover:bg-wine-700 hover:shadow-lg">
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
            <button type="submit" onclick="submitForm()" 
                class="bg-wine-500 text-black px-8 py-4 rounded-full text-lg font-semibold hover:bg-wine-600 transition-transform transform hover:scale-105 shadow-lg">
                 Enviar Regalo Ahora
            </button>
        </div>
    `;
    document.getElementById('dynamicStepContainer').innerHTML = step5Content;
}

    function submitForm() {
        // Mostrar alerta de confirmación usando SweetAlert
        Swal.fire({
            title: '¡Éxito!',
            text: '🎉 ¡Regalo enviado con éxito!',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            backdrop: true,
            allowOutsideClick: false,
            timer: 3000 // Cerrar automáticamente después de 3 segundos
        }).then(() => {
            // Animación de confeti
            confetti({
                particleCount: 200,
                spread: 70,
                origin: { y: 0.6 }
            });

            // Redirigir a la página de inicio después de que el usuario cierre la alerta
            setTimeout(() => {
                window.location.href = "{{ url('/') }}";
            }, 1000); // Esperar 1 segundo antes de redirigir
        });
    }
</script>
@endsection