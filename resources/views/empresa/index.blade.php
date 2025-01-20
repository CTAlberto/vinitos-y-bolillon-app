@extends('layouts.app')

@section('main-content')
<div class="container mt-5">
    <!-- Título Principal -->
    <h1 class="text-center mb-5" style="font-weight: bold; color: #333;" data-aos="fade-up" data-aos-duration="1000">Cursos para Empresas</h1>

    <p class="text-center text-muted mb-5" style="font-size: 1.1rem;" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
        Descubre cómo nuestros cursos pueden transformar tu equipo y llevar a tu empresa al siguiente nivel.
    </p>

    <!-- Sección de Beneficios -->
    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-12 text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 style="font-weight: bold; color: #333;">¿Por qué elegir nuestros cursos?</h2>
            <ul class="list-unstyled text-muted" style="font-size: 1.1rem;">
                <li><i class="bi bi-check-circle-fill"></i> Mejora las habilidades de tus empleados de manera eficiente.</li>
                <li><i class="bi bi-check-circle-fill"></i> Aumenta la productividad y el compromiso del equipo.</li>
                <li><i class="bi bi-check-circle-fill"></i> Formación a medida: personalizamos los contenidos según las necesidades de tu empresa.</li>
                <li><i class="bi bi-check-circle-fill"></i> Modalidades flexibles: ofrecemos cursos online, presenciales o híbridos.</li>
                <li><i class="bi bi-check-circle-fill"></i> Acceso a herramientas prácticas y contenidos actualizados.</li>
            </ul>
        </div>
    </div>

    <!-- Metodología de Enseñanza -->
    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-12 text-center">
            <h2 class="mb-4" style="font-weight: bold; color: #333;">Nuestra Metodología</h2>
            <p class="text-muted" style="font-size: 1.1rem;" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                Nuestros cursos están diseñados para adaptarse a las necesidades y horarios de tu empresa. Utilizamos metodologías activas para garantizar que cada empleado no solo aprenda, sino que aplique los conocimientos adquiridos de manera efectiva.
            </p>
            <ul class="list-unstyled text-muted" style="font-size: 1.1rem;" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
                <li><i class="bi bi-arrow-right-circle-fill"></i> Métodos prácticos con casos reales y simulaciones.</li>
                <li><i class="bi bi-arrow-right-circle-fill"></i> Clases interactivas y dinámicas.</li>
                <li><i class="bi bi-arrow-right-circle-fill"></i> Evaluación continua y retroalimentación personalizada.</li>
                <li><i class="bi bi-arrow-right-circle-fill"></i> Formación tanto individual como grupal según las necesidades.</li>
            </ul>
        </div>
    </div>

    <!-- Testimonios de Empresas -->
    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-12 text-center">
            <h2 class="mb-4" style="font-weight: bold; color: #333;">Testimonios</h2>
            <p class="text-muted" style="font-size: 1.1rem;" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                "La formación que hemos recibido ha tenido un impacto increíble en el rendimiento de nuestro equipo. Los cursos fueron prácticos, interactivos y muy relevantes para nuestra industria."
            </p>
            <h5 class="text-primary">Juan Pérez, Director de Recursos Humanos, XYZ Corp.</h5>
        </div>
    </div>

    <!-- Llamado a la Acción -->
    <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-6 text-center">
            <h3 style="font-weight: bold; color: #333;">¿Listo para transformar tu equipo?</h3>
            <p class="text-muted" style="font-size: 1.1rem;" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                Ponte en contacto con nosotros para obtener más información o personalizar un plan de formación para tu empresa.
            </p>
            
        </div>
    </div>
</div>
@endsection
