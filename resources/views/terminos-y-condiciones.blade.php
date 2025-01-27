@extends('layouts.app')

@section('main-content')
<div class="bg-gray-50 py-10">
    <div class="container mx-auto max-w-4xl bg-white shadow-md rounded-lg p-6 mt-16">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 border-b-2 border-gray-200 pb-2">Términos y Condiciones</h1>
        <p class="text-gray-600 mb-6">Última actualización: <span class="font-semibold">{{ date('d/m/Y') }}</span></p>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">1. Introducción</h2>
            <p class="text-gray-600 leading-relaxed">
                Bienvenido a <strong class="text-gray-800">South Wines Academy</strong>. Al utilizar nuestro sitio web o servicios, aceptas estos términos y condiciones. Por favor, léelos detenidamente antes de continuar.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">2. Uso permitido</h2>
            <p class="text-gray-600 leading-relaxed">
                Como usuario, aceptas:
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Usar el sitio únicamente para fines legales.</li>
                <li>No realizar actividades que puedan dañar, interrumpir o afectar el funcionamiento del sitio.</li>
                <li>Proporcionar información precisa y completa al registrarte o interactuar con nuestros servicios.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">3. Propiedad intelectual</h2>
            <p class="text-gray-600 leading-relaxed">
                Todos los contenidos, diseños, logotipos, textos, gráficos y otros materiales disponibles en <strong class="text-gray-800">South Wines Academy</strong> son propiedad de nuestra empresa o de nuestros colaboradores. No está permitido reproducir, distribuir o usar estos contenidos sin previa autorización.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">4. Limitación de responsabilidad</h2>
            <p class="text-gray-600 leading-relaxed">
                No nos hacemos responsables por:
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Errores técnicos o interrupciones del sitio.</li>
                <li>Pérdidas o daños derivados del uso o incapacidad de usar nuestros servicios.</li>
                <li>Contenido proporcionado por terceros en nuestra plataforma.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">5. Modificaciones de los términos</h2>
            <p class="text-gray-600 leading-relaxed">
                Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Te recomendamos revisar esta página periódicamente para estar al tanto de las actualizaciones.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">6. Ley aplicable</h2>
            <p class="text-gray-600 leading-relaxed">
                Estos términos se rigen por las leyes de [país o jurisdicción]. Cualquier disputa relacionada con el uso del sitio será resuelta en los tribunales correspondientes de esta jurisdicción.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">7. Contacto</h2>
            <p class="text-gray-600 leading-relaxed">
                Si tienes preguntas o comentarios sobre estos términos, contáctanos:
            </p>
            <p class="text-gray-800 font-medium">Email: <a href="mailto:info@southwinesacademy.com" class="text-blue-600 underline">info@southwinesacademy.com</a></p>
        </section>
    </div>
</div>
@endsection