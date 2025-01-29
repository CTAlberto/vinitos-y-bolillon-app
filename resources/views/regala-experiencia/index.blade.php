@extends('layouts.app')

@section('main-content')
<div class="container pt-32 mt-5">
    <!-- Sección de Introducción -->
    <div class="text-center mb-8" data-aos="fade-up">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">🎁 Regala una Experiencia Única</h1>
        <p class="text-xl text-gray-600">Sorprende a alguien especial con un curso de cata de vinos. ¡Haz que su día sea inolvidable!</p>
    </div>

    <!-- Caja de Regalo Interactiva -->
    <div class="bg-white shadow-lg rounded-lg p-6" data-aos="fade-up" data-aos-delay="200">
        <!-- Paso 1: Selección del Curso -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">1. Elige el Curso</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($cursos as $curso)
                <div class="cursor-pointer border rounded-lg p-4 hover:shadow-md transition-shadow" onclick="selectCourse({{ $curso->id }})">
                    <img src="{{ Vite::asset('resources/img/grapes-4290308_1280.jpg') }}" class="block w-full h-96 object-cover" alt="Vino 2">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $curso->title_event }}</h3>
                    <p class="text-gray-600">{{ $curso->short_description }}</p>
                </div>
                @endforeach
            </div>
            <input type="hidden" name="course_id" id="course_id" required>
        </div>

        <!-- Paso 2: Detalles del Destinatario -->
        <div class="mb-8" id="step2" style="display: none;">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">2. Dedica el Regalo</h2>
            <div class="space-y-4">
                <div>
                    <label for="recipient_name" class="block text-lg font-medium text-gray-700">Nombre del Destinatario</label>
                    <input type="text" name="recipient_name" id="recipient_name" class="w-full p-2 border rounded-md" placeholder="¿Para quién es este regalo?" required>
                </div>
                <div>
                    <label for="recipient_email" class="block text-lg font-medium text-gray-700">Correo del Destinatario</label>
                    <input type="email" name="recipient_email" id="recipient_email" class="w-full p-2 border rounded-md" placeholder="¿A dónde enviamos los detalles?" required>
                </div>
            </div>
        </div>

        <!-- Paso 3: Mensaje Personalizado -->
        <div class="mb-8" id="step3" style="display: none;">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">3. Añade un Mensaje</h2>
            <textarea name="message" id="message" class="w-full p-2 border rounded-md" rows="4" placeholder="Escribe un mensaje especial..."></textarea>
        </div>

        <!-- Botón de Envío -->
        <div class="text-center" id="step4" style="display: none;">
            <button type="submit" class="bg-wine-500 text-black px-6 py-3 rounded-full text-lg font-semibold hover:bg-wine-600 transition-colors">🎉 ¡Regalar Experiencia!</button>
        </div>
    </div>
</div>

<script>
    // Función para seleccionar el curso
    function selectCourse(courseId) {
        document.getElementById('course_id').value = courseId;
        document.getElementById('step2').style.display = 'block';
        document.getElementById('step2').scrollIntoView({ behavior: 'smooth' });
    }

    // Función para verificar si los campos del Paso 2 están completos
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

    // Eventos para verificar los campos del Paso 2
    document.getElementById('recipient_name').addEventListener('input', checkStep2);
    document.getElementById('recipient_email').addEventListener('input', checkStep2);

    // Evento para mostrar el Paso 4 (Botón de Envío) cuando se completa el Paso 3
    document.getElementById('message').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            document.getElementById('step4').style.display = 'block';
            document.getElementById('step4').scrollIntoView({ behavior: 'smooth' });
        } else {
            document.getElementById('step4').style.display = 'none';
        }
    });
</script>
@endsection