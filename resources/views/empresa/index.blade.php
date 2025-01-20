@extends('layouts.app')

@section('main-content')
<div class="container mx-auto mt-32 px-4">
    <!-- Título Principal -->
    <h1 class="text-center mb-10 text-4xl font-extrabold text-gray-800" data-aos="fade-up" data-aos-duration="1000">
        Cursos para Empresas
    </h1>

    <p class="text-center text-lg text-gray-600 mb-10" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
        Descubre cómo nuestros cursos pueden transformar tu equipo y llevar a tu empresa al siguiente nivel.
    </p>

    <!-- Sección de Beneficios -->
    <div class="bg-gray-100 rounded-lg p-8 mb-10" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">¿Por qué elegir nuestros cursos?</h2>
        <ul class="list-none text-lg text-gray-600 space-y-4 max-w-2xl mx-auto">
            <li class="flex items-center">
                <i class="bi bi-check-circle-fill text-blue-500 mr-2"></i>
                Mejora las habilidades de tus empleados de manera eficiente.
            </li>
            <li class="flex items-center">
                <i class="bi bi-check-circle-fill text-blue-500 mr-2"></i>
                Aumenta la productividad y el compromiso del equipo.
            </li>
            <li class="flex items-center">
                <i class="bi bi-check-circle-fill text-blue-500 mr-2"></i>
                Formación a medida: personalizamos los contenidos según las necesidades de tu empresa.
            </li>
            <li class="flex items-center">
                <i class="bi bi-check-circle-fill text-blue-500 mr-2"></i>
                Modalidades flexibles: online, presenciales o híbridos.
            </li>
            <li class="flex items-center">
                <i class="bi bi-check-circle-fill text-blue-500 mr-2"></i>
                Acceso a herramientas prácticas y contenidos actualizados.
            </li>
        </ul>
    </div>

    <!-- Metodología de Enseñanza -->
    <div class="bg-gray-200 rounded-lg p-8 mb-10" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Nuestra Metodología</h2>
        <p class="text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
            Nuestros cursos están diseñados para adaptarse a las necesidades y horarios de tu empresa. Utilizamos metodologías activas para garantizar que cada empleado no solo aprenda, sino que aplique los conocimientos adquiridos de manera efectiva.
        </p>
        <ul class="list-none text-lg text-gray-600 space-y-4 max-w-2xl mx-auto">
            <li class="flex items-center">
                <i class="bi bi-arrow-right-circle-fill text-blue-500 mr-2"></i>
                Métodos prácticos con casos reales y simulaciones.
            </li>
            <li class="flex items-center">
                <i class="bi bi-arrow-right-circle-fill text-blue-500 mr-2"></i>
                Clases interactivas y dinámicas.
            </li>
            <li class="flex items-center">
                <i class="bi bi-arrow-right-circle-fill text-blue-500 mr-2"></i>
                Evaluación continua y retroalimentación personalizada.
            </li>
            <li class="flex items-center">
                <i class="bi bi-arrow-right-circle-fill text-blue-500 mr-2"></i>
                Formación tanto individual como grupal según las necesidades.
            </li>
        </ul>
    </div>

    <!-- Testimonios de Empresas -->
    <div class="bg-gray-100 rounded-lg p-8 mb-10" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Testimonios</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <p class="text-lg text-gray-600">"La formación que recibimos fue increíblemente valiosa. Altamente recomendado."</p>
                    <h5 class="text-blue-500 font-semibold">Juan Pérez, Director de Recursos Humanos, XYZ Corp.</h5>
                </div>
                <div class="carousel-item">
                    <p class="text-lg text-gray-600">"Los cursos personalizados ayudaron a nuestro equipo a superar sus metas."</p>
                    <h5 class="text-blue-500 font-semibold">Maria Gómez, CEO, ABC Ltd.</h5>
                </div>
                <div class="carousel-item">
                    <p class="text-lg text-gray-600">"La experiencia en las catas fue increíble. Todo el equipo quedó encantado."</p>
                    <h5 class="text-blue-500 font-semibold">Carlos López, Gerente General, DEF S.A.</h5>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>

    <!-- Llamado a la Acción -->
    <div class="bg-gray-50 rounded-lg p-10 text-center" data-aos="fade-up" data-aos-duration="1000">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">¿Listo para transformar tu equipo?</h3>
        <p class="text-lg text-gray-600 mb-6">
            Ponte en contacto con nosotros para obtener más información o personalizar un plan de formación para tu empresa.
        </p>
        <a href="/contact" class="bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600">Contáctanos ahora</a>
    </div>
</div>
@endsection
