@extends('layouts.app')

@section('main-content')
<div class="bg-gray-50 py-10">
    <div class="container mx-auto max-w-4xl bg-white shadow-md rounded-lg p-6 mt-16"> <!-- Aquí añadimos 'mt-16' -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4 border-b-2 border-gray-200 pb-2">Política de Privacidad</h1>
        <p class="text-gray-600 mb-6">Última actualización: <span class="font-semibold">{{ date('d/m/Y') }}</span></p>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">1. Introducción</h2>
            <p class="text-gray-600 leading-relaxed">
                En <strong class="text-gray-800">South Wines Academy</strong>, respetamos tu privacidad y estamos comprometidos a proteger cualquier información personal que compartas con nosotros.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">2. Información que recopilamos</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Datos personales como nombre, correo electrónico, y otros detalles que proporciones.</li>
                <li>Información de navegación como dirección IP, navegador, y tipo de dispositivo.</li>
                <li>Cookies y tecnologías similares para mejorar tu experiencia en el sitio.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">3. Cómo usamos la información</h2>
            <p class="text-gray-600 leading-relaxed">Utilizamos la información recopilada para:</p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Proporcionar y mejorar nuestros servicios.</li>
                <li>Personalizar tu experiencia en nuestra plataforma.</li>
                <li>Realizar análisis para entender cómo se utiliza nuestro sitio web.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">4. Compartición de información</h2>
            <p class="text-gray-600 leading-relaxed">
                No compartimos tu información personal con terceros, excepto en las siguientes situaciones:
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Cumplir con requisitos legales o regulatorios.</li>
                <li>Colaborar con servicios de confianza necesarios para operar nuestra plataforma.</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">5. Seguridad de los datos</h2>
            <p class="text-gray-600 leading-relaxed">
                Implementamos medidas de seguridad avanzadas para proteger tus datos personales contra accesos no autorizados, pérdida o alteración.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">6. Derechos del usuario</h2>
            <p class="text-gray-600 leading-relaxed">
                Tienes derecho a acceder, corregir o eliminar tus datos personales. Para ejercer estos derechos, contáctanos a través del correo: 
                <a href="mailto:info@southwinesacademy.com" class="text-blue-600 underline">info@southwinesacademy.com</a>.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">7. Cambios en la política</h2>
            <p class="text-gray-600 leading-relaxed">
                Nos reservamos el derecho de modificar esta política en cualquier momento. Notificaremos cualquier cambio significativo a través de nuestra plataforma.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-3">8. Contacto</h2>
            <p class="text-gray-600 leading-relaxed">
                Si tienes preguntas o inquietudes sobre nuestra política de privacidad, puedes contactarnos en:
            </p>
            <p class="text-gray-800 font-medium">Email: <a href="mailto:info@southwinesacademy.com" class="text-blue-600 underline">info@southwinesacademy.com</a></p>
        </section>
    </div>
</div>
@endsection