<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/carrusel.js'])
    @include('components.header')
</head>
<body>
    <header>
        <!-- Header -->
    </header>

    <nav>
        <!-- Nav -->
    </nav>

    <!-- Carrusel de Tailwind -->
    <section class="w-full max-w-4xl mx-auto">
    <div id="carousel" class="relative overflow-hidden rounded-lg shadow-lg">
        <!-- Slides -->
        <div class="relative w-full h-64 md:h-96">
             <div class="carousel-item absolute inset-0 transition-transform transform translate-x-0">
                <img src="{{ Vite::asset('resources/img/vino2.jpg') }}" alt="Vino 2" 
                     class="block w-full h-full">
            </div>
            <div class="carousel-item absolute inset-0 transition-transform transform translate-x-full">
                <img src="{{ Vite::asset('resources/img/vino3.jpg') }}" alt="Vino 3" 
                     class="block w-full h-full">
            </div>
            <div class="carousel-item absolute inset-0 transition-transform transform translate-x-[200%]">
                <img src="{{ Vite::asset('resources/img/vino4.jpg') }}" alt="Vino 4" 
                     class="block w-full h-full">
            </div>
        </div>

        <!-- Controles -->
        <button id="prev" 
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-800 hover:bg-gray-700 text-white p-3 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
            &lt;
        </button>
        <button id="next" 
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-800 hover:bg-gray-700 text-white p-3 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
            &gt;
        </button>
    </div>
</section>



    <!-- Botón centrado -->
    <section class="text-center my-5">
        <a href="#cursos" class="inline-block px-8 py-4 bg-red-800 text-white text-lg font-bold rounded-lg">
            VER CURSOS
        </a>
    </section>

    <!-- Secciones de contenido -->
    <section class="flex flex-wrap bg-green-400 p-12 items-center">
        <div class="flex-1 max-w-1/2 overflow-hidden">
            <img src="{{ Vite::asset('resources/img/descarga.jpg') }}" alt="Evento de Vino" class="w-full object-cover">
        </div>
        <div class="flex-1 max-w-1/2 p-5 text-black text-left">
            <h2 class="text-4xl font-bold text-black">ABOUT US</h2>
            <p class="text-lg leading-8 mt-5 text-black">
                Join our community of wine lovers! Whether you’re an enthusiastic hobbyist, work in the hospitality trade, or are a wine newbie – South Coast Wine Academy will help open your eyes into the world of wine. Our mission is to help you build your knowledge and confidence in wine in a fun and friendly environment.
            </p>
            <p class="text-lg leading-8 mt-5 text-black">
                South Coast Wine Academy runs wine courses and tasting events in Kiama, NSW. We’re a WSET Approved Program Provider servicing the South Coast including the Illawarra, Wollongong, and the Southern Highlands.
            </p>
            <a href="#more-info" class="inline-block mt-5 px-5 py-2 bg-black text-white font-bold rounded-md">FIND OUT MORE</a>
        </div>
    </section>

    <section class="flex flex-wrap bg-red-800 p-12 items-center">
        <div class="flex-1 max-w-1/2 p-5 text-white text-left">
            <h2 class="text-4xl font-bold text-white">APRENDE EL ARTE DE LA CATA DE VINOS</h2>
            <p class="text-lg leading-8 mt-5">
                Descubre el fascinante mundo del vino con nuestros exclusivos <strong>cursos de cata</strong>. 
                Ya seas un amante del vino, un profesional de la hostelería o simplemente tengas curiosidad por explorar esta bebida, nuestros cursos están diseñados para mejorar tus habilidades de degustación y conocimiento.
            </p>
            <p class="text-lg leading-8 mt-5">
                Participa en nuestras sesiones interactivas guiadas por sommeliers certificados y aprende a identificar aromas, sabores y las historias detrás de cada botella. 
                Perfecto para individuos o grupos, nuestros cursos son divertidos, dinámicos y educativos.
            </p>
            <p class="text-lg leading-8 mt-5">
                Da el primer paso para convertirte en un experto en vinos o simplemente disfruta al máximo esta experiencia única.
            </p>
            <a href="#more-info" class="inline-block mt-5 px-5 py-2 bg-white text-red-800 font-bold rounded-md">INSCRÍBETE AHORA</a>
        </div>
        <div class="flex-1 max-w-1/2 overflow-hidden">
            <img src="{{ Vite::asset('resources/img/descargaPrueba.jpg') }}" alt="Evento de Cata de Vinos" class="w-full object-cover">
        </div>
    </section>

    <footer class="text-center mt-5">
        &copy; {{ date('Y') }} Academia de Vino. Todos los derechos reservados.
    </footer>
</body>
@include('components.footer')
</html>
