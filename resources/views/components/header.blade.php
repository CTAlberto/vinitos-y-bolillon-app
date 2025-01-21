@vite(['resources/css/app.css', 'resources/js/app.js'])
<header class="bg-white fixed-top w-full border-b">
    <div class="container mx-auto flex justify-between items-center py-3 px-4 md:px-8">
        <!-- Logotipo y Nombre de la Academia -->
        <div class="flex items-center">
    <a href="/" class="flex-shrink-0">
            <img src="{{ Vite::asset('resources/img/logotipo.png') }}" alt="Logotipo" style="max-height: 48px; min-height: 32px; height: auto;">
        </a>
        <h1 class="text-xl font-serif font-bold text-black whitespace-nowrap ml-3">
            South Wines Academy
        </h1>
    </div>


        
     <!-- Menú de Navegación -->
    <nav class="hidden md:block">
        <ul class="flex space-x-6">
            <li><a class="text-dark hover:text-[#7b1228]" href="/">Inicio</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/cursos">Cursos</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/catas">Catas</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/sobre-nosotros">Sobre Nosotros</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/empresas">Empresa</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/contacto">Contacto</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/calendar">Calendario</a></li> 
        </ul>
     </nav>

        <!-- Menú para pantallas pequeñas (hamburger) -->
        <button id="menu-toggle" class="md:hidden text-2xl text-[#7b1228]">
            <i class="fas fa-bars"></i>
        </button>
    </div>

   <!-- Menú desplegable en pantallas pequeñas -->
<div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-lg">
    <ul class="space-y-4 py-4 px-4">
        <li><a class="text-dark hover:text-[#7b1228]" href="/">Inicio</a></li>
        <li><a class="text-dark hover:text-[#7b1228]" href="/cursos">Cursos</a></li>
        <li><a class="text-dark hover:text-[#7b1228]" href="/catas">Catas</a></li>
        <li><a class="text-dark hover:text-[#7b1228]" href="/sobre-nosotros">Sobre Nosotros</a></li>
        <li><a class="text-dark hover:text-[#7b1228]" href="/empresas">Empresa</a></li>
        <li><a class="text-dark hover:text-[#7b1228]" href="/contacto">Contacto</a></li>
        <li><a class="text-dark hover:text-[#7b1228]" href="/calendar">Calendario</a></li> 
    </ul>
</div>
</header>


