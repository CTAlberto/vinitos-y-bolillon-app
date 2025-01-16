<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/carrusel.js'])

    <style>
        
    </style>
    @include('components.header')
</head>
<body>
    <header>
        <!-- Aquí va el contenido del header si es necesario -->
    </header>

    <nav>
        <!-- Aquí va el contenido del nav si es necesario -->
    </nav>

    <!-- Carrusel de Tailwind -->
    <section class="w-full max-w-4xl mx-auto">
        <div id="carousel" class="relative overflow-hidden rounded-lg shadow-lg">
            <!-- Slides -->
            <div class="relative w-full h-64 md:h-96">
                <div class="carousel-item absolute inset-0 transition-transform transform translate-x-0">
                    <img src="{{ asset('img/vino2.jpg') }}" alt="Vino 2" class="w-full h-full object-cover">

                </div>
                <div class="carousel-item absolute inset-0 transition-transform transform translate-x-full">
                    <img src="{{ asset('img/vino3.jpg') }}" alt="Vino 3" class="w-full h-full object-cover">
                </div>
                <div class="carousel-item absolute inset-0 transition-transform transform translate-x-[200%]">
                    <img src="{{ asset('img/vino4.jpg') }}" alt="Vino 4" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Controles -->
            <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                &lt;
            </button>
            <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">
                &gt;
            </button>
        </div>
    </section>

    <!-- Botón centrado -->
    <section style="text-align: center; margin: 20px;">
        <a href="#cursos" 
           style="display: inline-block; padding: 15px 30px; background-color: #7B1228; color: #fff; text-decoration: none; font-size: 1.2rem; font-weight: bold; border-radius: 5px;">
            VER CURSOS
        </a>
    </section>

    <!-- Secciones de contenido (No cambian) -->
    <section style="display: flex; flex-wrap: wrap; background-color: #9AA75E; padding: 50px; align-items: center;">
        <div style="flex: 1; max-width: 50%; overflow: hidden;">
            <img src="{{ asset('img/descarga.jpg') }}" alt="Evento de Vino" style="width: 100%; object-fit: cover;">
        </div>
        <div style="flex: 1; max-width: 50%; padding: 20px; color: #fff; text-align: left;">
            <h2 style="font-size: 2.5rem; font-weight: bold; color: #000;">ABOUT US</h2>
            <p style="font-size: 1.2rem; line-height: 1.8; margin-top: 20px; color: #000;">
                Join our community of wine lovers! Whether you’re an enthusiastic hobbyist, work in the hospitality trade, or are a wine newbie – South Coast Wine Academy will help open your eyes into the world of wine. Our mission is to help you build your knowledge and confidence in wine in a fun and friendly environment.
            </p>
            <p style="font-size: 1.2rem; line-height: 1.8; margin-top: 20px; color: #000;">
                South Coast Wine Academy runs wine courses and tasting events in Kiama, NSW. We’re a WSET Approved Program Provider servicing the South Coast including the Illawarra, Wollongong, and the Southern Highlands.
            </p>
            <a href="#more-info" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #000; color: #fff; text-decoration: none; font-weight: bold; border-radius: 5px;">FIND OUT MORE</a>
        </div>
    </section>

    <section style="display: flex; flex-wrap: wrap; background-color: #7B1228; padding: 50px; align-items: center;">
        <div style="flex: 1; max-width: 50%; padding: 20px; color: #fff; text-align: left;">
            <h2 style="font-size: 2.5rem; font-weight: bold; color: #fff;">APRENDE EL ARTE DE LA CATA DE VINOS</h2>
            <p style="font-size: 1.2rem; line-height: 1.8; margin-top: 20px;">
                Descubre el fascinante mundo del vino con nuestros exclusivos <strong>cursos de cata</strong>. 
                Ya seas un amante del vino, un profesional de la hostelería o simplemente tengas curiosidad por explorar esta bebida, nuestros cursos están diseñados para mejorar tus habilidades de degustación y conocimiento.
            </p>
            <p style="font-size: 1.2rem; line-height: 1.8; margin-top: 20px;">
                Participa en nuestras sesiones interactivas guiadas por sommeliers certificados y aprende a identificar aromas, sabores y las historias detrás de cada botella. 
                Perfecto para individuos o grupos, nuestros cursos son divertidos, dinámicos y educativos.
            </p>
            <p style="font-size: 1.2rem; line-height: 1.8; margin-top: 20px;">
                Da el primer paso para convertirte en un experto en vinos o simplemente disfruta al máximo esta experiencia única.
            </p>
            <a href="#more-info" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #fff; color: #7B1228; text-decoration: none; font-weight: bold; border-radius: 5px;">INSCRÍBETE AHORA</a>
        </div>

        <div style="flex: 1; max-width: 50%; overflow: hidden;">
            <img src="{{ asset('img/descargaPrueba.jpg') }}" alt="Evento de Cata de Vinos" style="width: 100%; object-fit: cover;">
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Academia de Vino. Todos los derechos reservados.
    </footer>
</body>

@include('components.footer')
</html>
