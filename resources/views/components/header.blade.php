<!-- filepath: /c:/Users/jrubi/Documents/DAW/vinitos-y-bolillon-app/resources/views/components/header.blade.php -->
<header class="border-bottom bg-white fixed-top">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <!-- Logotipo y Nombre de la Academia -->
        <div class="d-flex align-items-center" style="margin-right: 2rem;">
            <!-- Logotipo -->
            <a href="/">
                <img src="{{ Vite::asset('resources/img/logotipo.png') }}" alt="Logotipo" class="block w-full h-full" style="height: 35px; margin-right: 1.5rem;">
            </a>
            <!-- Nombre de la Academia -->
            <h1 class="m-0" style="font-family: 'Playfair Display', serif; font-size: 1.5rem; color: black; white-space: nowrap;">
                South Wines Academy
            </h1>
        </div>
        <!-- Menú de Navegación -->
        <nav>
            <ul class="nav m-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/cursos">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/catas">Catas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/sobre-nosotros">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/empresas">Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/contacto">Contacto</a>
                </li>
            </ul>
        </nav>
    </div>
</header>