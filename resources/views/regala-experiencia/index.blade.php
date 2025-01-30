@extends('layouts.app')

@section('main-content')
<div class="container pt-16 mt-4 min-h-screen">
    <!-- Sección de Introducción -->
    <div class="text-center mb-6" data-aos="fade-up">
        <h1 class="text-4xl font-bold text-gray-800 mb-3">🎁 Regala una Experiencia Única</h1>
        <p class="text-lg text-gray-600">Sorprende a alguien especial con un curso de cata de vinos. ¡Haz que su día sea inolvidable!</p>
    </div>

    <!-- Caja de Regalo Interactiva -->
    <div class="bg-white shadow-lg rounded-lg p-6 min-h-[500px]" data-aos="fade-up" data-aos-delay="200">
        <!-- Paso 1: Selección del Curso (Carrusel) -->
        <div class="mb-6">
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
                <button onclick="prevSlide()" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-300 p-2 rounded-full">◀</button>
                <button onclick="nextSlide()" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-300 p-2 rounded-full">▶</button>
            </div>
            <input type="hidden" name="course_id" id="course_id" required>
        </div>

        <!-- Paso 2: Detalles del Destinatario -->
        <div class="mb-6" id="step2" style="display: none;">
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
            </div>
        </div>

        <!-- Paso 3: Seleccionar Fecha de Entrega -->
        <div class="mb-6" id="step3" style="display: none;">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">3. Selecciona la Fecha de Entrega</h2>
            <div>
                <label for="delivery_date" class="block text-base font-medium text-gray-700 mb-1">Fecha de Entrega</label>
                <input type="date" name="delivery_date" id="delivery_date" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-wine-500 focus:border-transparent" required>
            </div>
        </div>

        <!-- Paso 4: Mensaje Personalizado -->
        <div class="mb-6" id="step4" style="display: none;">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">4. Añade un Mensaje</h2>
            <textarea name="message" id="message" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-wine-500 focus:border-transparent" rows="3" placeholder="Escribe un mensaje especial..."></textarea>
        </div>

        <!-- Paso 5: Enviar Regalo -->
        <div class="text-center" id="step5" style="display: none;">
            <button type="submit" onclick="submitForm()" class="bg-wine-500 text-black px-6 py-3 rounded-full text-base font-semibold hover:bg-wine-600 transition-colors transform hover:scale-105">🎉 ¡Regalar Experiencia!</button>
        </div>
    </div>
</div>

<!-- Librería de Confeti -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        document.getElementById('step2').style.display = 'block';
        document.getElementById('step2').scrollIntoView({ behavior: 'smooth' });
    }

    function checkStep2() {
        const recipientName = document.getElementById('recipient_name').value.trim();
        const recipientEmail = document.getElementById('recipient_email').value.trim();

        if (recipientName !== '' && recipientEmail !== '') {
            document.getElementById('step3').style.display = 'block';
            document.getElementById('step3').scrollIntoView({ behavior: 'smooth' });
        } else {
            document.getElementById('step3').style.display = 'none';
        }
    }

    document.getElementById('recipient_name').addEventListener('input', checkStep2);
    document.getElementById('recipient_email').addEventListener('input', checkStep2);

    function checkStep3() {
        const deliveryDate = document.getElementById('delivery_date').value.trim();

        if (deliveryDate !== '') {
            document.getElementById('step4').style.display = 'block';
            document.getElementById('step4').scrollIntoView({ behavior: 'smooth' });
        } else {
            document.getElementById('step4').style.display = 'none';
        }
    }

    document.getElementById('delivery_date').addEventListener('input', checkStep3);

    document.getElementById('message').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            document.getElementById('step5').style.display = 'block';
            document.getElementById('step5').scrollIntoView({ behavior: 'smooth' });
        } else {
            document.getElementById('step5').style.display = 'none';
        }
    });

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
            }, 3000); // Esperar 3 segundos antes de redirigir
        });
    }
</script>
@endsection


