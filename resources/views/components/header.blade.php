@vite(['resources/css/app.css', 'resources/js/app.js'])

<header class="bg-[#4C1A2B] fixed-top w-full border-b border-[#D4A017] shadow-lg">
    <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-6">
        <!-- Logotipo y Nombre de la Academia -->
        <div class="flex items-center">
            <h1 class="text-xl font-serif font-bold text-[#D4A017] whitespace-nowrap ml-5">
                South Wines Academy
            </h1>
        </div>

        <!-- Menú de Navegación -->
        <nav class="hidden md:block">
            <ul class="flex space-x-6">
                <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/">Inicio</a></li>
                
                <!-- Submenú para Cursos -->
                <li class="relative group" onmouseenter="showSubmenu('cursos')" onmouseleave="hideSubmenu('cursos')">
                    <a class="text-[#D4A017] hover:text-[#B76E79] flex items-center" href="/cursos">
                        Cursos
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </a>
                    <!-- Submenú -->
                    <ul id="submenu-cursos" class="absolute hidden bg-[#4C1A2B] shadow-lg rounded-lg py-2 mt-2 transition-opacity duration-300 ease-in-out opacity-0"
                        onmouseenter="showSubmenu('cursos')" onmouseleave="hideSubmenu('cursos')">
                        <li>
                            <a class="block px-6 py-3 text-[#D4A017] hover:text-white hover:bg-[#722F37] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                                <i class="fas fa-calendar-alt mr-2"></i> Calendario
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Submenú para Catas -->
                <li class="relative group" onmouseenter="showSubmenu('catas')" onmouseleave="hideSubmenu('catas')">
                    <a class="text-[#D4A017] hover:text-[#B76E79] flex items-center" href="/catas">
                        Catas
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </a>
                    <!-- Submenú -->
                    <ul id="submenu-catas" class="absolute hidden bg-[#4C1A2B] shadow-lg rounded-lg py-2 mt-2 transition-opacity duration-300 ease-in-out opacity-0"
                        onmouseenter="showSubmenu('catas')" onmouseleave="hideSubmenu('catas')">
                        <li>
                            <a class="block px-6 py-3 text-[#D4A017] hover:text-white hover:bg-[#722F37] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                                <i class="fas fa-calendar-alt mr-2"></i> Calendario
                            </a>
                        </li>
                    </ul>
                </li>

                <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/sobre-nosotros">Sobre Nosotros</a></li>
                <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/empresas">Empresa</a></li>
                <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/contacto">Contacto</a></li>
                <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/regala-experiencia">Regala Experiencia</a></li>
            </ul>
        </nav>

        <!-- Menú para pantallas pequeñas (hamburger) -->
        <button id="menu-toggle" class="md:hidden text-2xl text-[#D4A017]">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Menú desplegable en pantallas pequeñas -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-[#4C1A2B] shadow-lg">
        <ul class="space-y-4 py-4 px-4">
            <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/">Inicio</a></li>
            <li>
                <a class="text-[#D4A017] hover:text-[#B76E79] flex items-center justify-between" href="/cursos">
                    Cursos
                    <i class="fas fa-chevron-down text-sm"></i>
                </a>
                <ul class="pl-4 mt-2 space-y-2">
                    <li>
                        <a class="block px-6 py-3 text-[#D4A017] hover:text-white hover:bg-[#722F37] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                            <i class="fas fa-calendar-alt mr-2"></i> Calendario
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="text-[#D4A017] hover:text-[#B76E79] flex items-center justify-between" href="/catas">
                    Catas
                    <i class="fas fa-chevron-down text-sm"></i>
                </a>
                <ul class="pl-4 mt-2 space-y-2">
                    <li>
                        <a class="block px-6 py-3 text-[#D4A017] hover:text-white hover:bg-[#722F37] transition-all duration-300 rounded-lg transform hover:scale-105" href="/calendar">
                            <i class="fas fa-calendar-alt mr-2"></i> Calendario
                        </a>
                    </li>
                </ul>
            </li>
            <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/sobre-nosotros">Sobre Nosotros</a></li>
            <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/empresas">Empresa</a></li>
            <li><a class="text-[#D4A017] hover:text-[#B76E79]" href="/contacto">Contacto</a></li>
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

<!-- Iconos sacados de Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">