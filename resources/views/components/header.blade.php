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
                
                <!-- Submenú para Cursos -->
                <li class="relative group" onmouseenter="showSubmenu('cursos')" onmouseleave="hideSubmenu('cursos')">
                    <a class="text-dark hover:text-[#7b1228] flex items-center" href="/cursos">
                        Cursos
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </a>
                    <!-- Submenú -->
                    <ul id="submenu-cursos" class="absolute hidden bg-white shadow-lg rounded-lg py-2 mt-2 transition-opacity duration-300 ease-in-out opacity-0"
                        onmouseenter="showSubmenu('cursos')" onmouseleave="hideSubmenu('cursos')">
                        <li>
                            <a class="block px-6 py-3 text-dark hover:text-white hover:bg-[#7b1228] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                                <i class="fas fa-calendar-alt mr-2"></i> Calendario
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Submenú para Catas -->
                <li class="relative group" onmouseenter="showSubmenu('catas')" onmouseleave="hideSubmenu('catas')">
                    <a class="text-dark hover:text-[#7b1228] flex items-center" href="/catas">
                        Catas
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </a>
                    <!-- Submenú -->
                    <ul id="submenu-catas" class="absolute hidden bg-white shadow-lg rounded-lg py-2 mt-2 transition-opacity duration-300 ease-in-out opacity-0"
                        onmouseenter="showSubmenu('catas')" onmouseleave="hideSubmenu('catas')">
                        <li>
                            <a class="block px-6 py-3 text-dark hover:text-white hover:bg-[#7b1228] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                                <i class="fas fa-calendar-alt mr-2"></i> Calendario
                            </a>
                        </li>
                    </ul>
                </li>

                <li><a class="text-dark hover:text-[#7b1228]" href="/sobre-nosotros">Sobre Nosotros</a></li>
                <li><a class="text-dark hover:text-[#7b1228]" href="/empresas">Empresa</a></li>
                <li><a class="text-dark hover:text-[#7b1228]" href="/contacto">Contacto</a></li>
                <li><a class="text-dark hover:text-[#7b1228]" href="/regala-experiencia">Regala Experiencia</a></li>
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
            <li>
                <a class="text-dark hover:text-[#7b1228] flex items-center justify-between" href="/cursos">
                    Cursos
                    <i class="fas fa-chevron-down text-sm"></i>
                </a>
                <ul class="pl-4 mt-2 space-y-2">
                    <li>
                        <a class="block px-6 py-3 text-dark hover:text-white hover:bg-[#7b1228] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                            <i class="fas fa-calendar-alt mr-2"></i> Calendario
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="text-dark hover:text-[#7b1228] flex items-center justify-between" href="/catas">
                    Catas
                    <i class="fas fa-chevron-down text-sm"></i>
                </a>
                <ul class="pl-4 mt-2 space-y-2">
                    <li>
                        <a class="block px-6 py-3 text-dark hover:text-white hover:bg-[#7b1228] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                            <i class="fas fa-calendar-alt mr-2"></i> Calendario
                        </a>
                    </li>
                </ul>
            </li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/sobre-nosotros">Sobre Nosotros</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/empresas">Empresa</a></li>
            <li><a class="text-dark hover:text-[#7b1228]" href="/contacto">Contacto</a></li>
        </ul>
    </div>
</header>

<script>
    // Funciones para mostrar y ocultar el submenú
    function showSubmenu(id) {
        const submenu = document.getElementById(`submenu-${id}`);
        submenu.classList.remove('hidden');
        setTimeout(() => {
            submenu.classList.remove('opacity-0');
        }, 10); // Pequeño retraso para permitir que el navegador procese la eliminación de 'hidden'
    }

    function hideSubmenu(id) {
        const submenu = document.getElementById(`submenu-${id}`);
        submenu.classList.add('opacity-0');
        setTimeout(() => {
            if (submenu.classList.contains('opacity-0')) {
                submenu.classList.add('hidden');
            }
        }, 300); // Tiempo de espera para que la transición de opacidad se complete
    }

    // Script para manejar el menú móvil
    document.getElementById('menu-toggle').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>