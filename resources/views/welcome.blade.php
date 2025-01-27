@extends('layouts.app')

@section('main-content')
<!-- Carrusel -->
<div class="container pt-32 mt-5" style="margin-top: 50px;">
    <div id="carouselExampleAutoplaying" class="relative carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner relative w-full overflow-hidden">

            <!-- Primer slide -->
            <div class="carousel-item active relative float-left w-full">
                <video class="block w-full h-96 object-cover" autoplay loop muted playsinline>
                    <source src="{{ Vite::asset('resources/videos/84226-586657520_small.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
                <div class="carousel-caption absolute bottom-0 left-0 flex flex-col items-start justify-start bg-opacity-75 p-6">
                    <h5 class="text-xl font-bold text-gray-100 bg-gray-800 bg-opacity-50 px-4 py-2 rounded">Vino exquisito</h5>
                    <p class="mt-2 text-gray-200 bg-gray-800 bg-opacity-50 px-4 py-2 rounded">Descubre los mejores vinos del mundo.</p>
                </div>
            </div>

            <!-- Segundo slide -->
            <div class="carousel-item relative float-left w-full">
                <video class="block w-full h-96 object-cover" autoplay loop muted playsinline>
                    <source src="{{ Vite::asset('resources/videos/130690-748155705_small.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
                <div class="carousel-caption absolute bottom-0 left-0 flex flex-col items-start justify-start bg-opacity-75 p-6">
                    <h5 class="text-xl font-bold text-gray-100 bg-gray-800 bg-opacity-50 px-4 py-2 rounded">La mejor selección</h5>
                    <p class="mt-2 text-gray-200 bg-gray-800 bg-opacity-50 px-4 py-2 rounded">Solo lo mejor para nuestros clientes.</p>
                </div>
            </div>

            <!-- Tercer slide -->
            <div class="carousel-item relative float-left w-full">
                <video class="block w-full h-96 object-cover" autoplay loop muted playsinline>
                    <source src="{{ Vite::asset('resources/videos/135643-762117669_small.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
                <div class="carousel-caption absolute bottom-0 left-0 flex flex-col items-start justify-start bg-opacity-75 p-6">
                    <h5 class="text-xl font-bold text-gray-100 bg-gray-800 bg-opacity-50 px-4 py-2 rounded">Un toque de elegancia</h5>
                    <p class="mt-2 text-gray-200 bg-gray-800 bg-opacity-50 px-4 py-2 rounded">Cada botella, una experiencia única.</p>
                </div>
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev absolute top-0 bottom-0 left-0 flex items-center justify-center p-0 text-center border-0 hover:opacity-75 focus:outline-none" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next absolute top-0 bottom-0 right-0 flex items-center justify-center p-0 text-center border-0 hover:opacity-75 focus:outline-none" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Sección Sobre Nosotros con animación -->
<div class="container mx-auto mt-10 mb-10 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-8 md:space-y-0 md:space-x-8">
        
        <div class="w-full md:w-1/2 p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Bienvenidos a South Wines Academy</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-6 text-justify">
                En el mundo del vino, cada botella cuenta una historia y cada sorbo es una experiencia única. Creemos firmemente que el conocimiento es la clave para disfrutar plenamente de esta fascinante cultura.
            </p>
            <p class="text-lg text-gray-700 leading-relaxed mb-6 text-justify">
                Te invitamos a explorar nuestro sitio, donde encontrarás información detallada sobre nuestros cursos, así como recursos adicionales que enriquecerán tu aprendizaje y pasión por el vino. Únete a nuestra comunidad y déjanos ser parte de tu viaje hacia el mundo del vino.
            </p>
            <p class="text-lg text-gray-700 leading-relaxed mb-4 text-justify">
                ¡Salud y bienvenidos a bordo!
            </p>
        </div>
        
        <div class="w-full md:w-1/2 p-6">
            <img src="{{ Vite::asset('resources/img/wine-786933_1280.jpg') }}" alt="Sobre Nosotros" class="w-full h-auto rounded-lg shadow-lg">
        </div>
    </div>
</div>

<!-- Sección Nuestro Producto con animación -->
<div class="container mx-auto mt-10 mb-10 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-8 md:space-y-0 md:space-x-8">
        
        <div class="w-full md:w-1/2 p-6">
            <img src="{{ Vite::asset('resources/img/grapes-957324_1280.jpg') }}" alt="Nuestro Producto" class="w-full h-auto rounded-lg shadow-lg">
        </div>
       
        <div class="w-full md:w-1/2 p-6">
            <h2 class="text-4xl font-bold text-gray-800 mb-6" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">Nuestro Producto</h2>
            <p class="text-lg text-gray-700 leading-relaxed" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                Nuestros vinos son seleccionados cuidadosamente por expertos en la materia, garantizando la mejor calidad y sabor en cada botella. Descubre nuestra colección y encuentra el vino perfecto para cada ocasión.
            </p>
        </div>
    </div>
</div>

<!-- Sección de Servicios -->
<div class="container mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
    <h2 class="text-3xl font-bold text-center mb-10">Nuestros Servicios</h2>
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Servicio 1 -->
        <div class="text-center w-full lg:w-1/3 p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <a href="/cursos" class="block bg-white shadow-lg hover:shadow-2xl transition-shadow p-6 rounded-lg">
                <img src="{{ Vite::asset('resources/img/came-2933943_1280.jpg') }}" alt="Cursos" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-gray-800" data-aos="fade-right" data-aos-delay="200">Cursos</h3>
                <p class="text-gray-600" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">Aprende sobre vinos con nuestros expertos.</p>
            </a>
        </div>

        <!-- Servicio 2 -->
        <div class="text-center w-full lg:w-1/3 p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <a href="/catas" class="block bg-white shadow-lg hover:shadow-2xl transition-shadow p-6 rounded-lg">
                <img src="{{ Vite::asset('resources/img/wineglass-553467_1280.jpg') }}" alt="Catas" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-gray-800" data-aos="fade-right" data-aos-delay="200">Catas</h3>
                <p class="text-gray-600" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">Disfruta de nuestras catas de vino exclusivas.</p>
            </a>
        </div>

        <!-- Servicio 3 -->
        <div class="text-center w-full lg:w-1/3 p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <a href="/sobre-nosotros" class="block bg-white shadow-lg hover:shadow-2xl transition-shadow p-6 rounded-lg">
                <img src="{{ Vite::asset('resources/img/came-2700089_1280.jpg') }}" alt="Sobre Nosotros" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-semibold text-gray-800" data-aos="fade-right" data-aos-delay="200">Sobre Nosotros</h3>
                <p class="text-gray-600" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">Conoce más sobre nuestra historia y misión.</p>
            </a>
        </div>
    </div>
</div>
</div>

@endsection