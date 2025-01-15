<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            margin: 20px;
            text-align: center;
        }
        nav a {
            color: #343a40;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a Nuestra Academia de Vino</h1>
    </header>

    <nav>
        <a href="{{ url('/cursos') }}">Cursos</a>
        <a href="{{ url('/sobre-nosotros') }}">Sobre Nosotros</a>
        <a href="{{ url('/contacto') }}">Contacto</a>
        <a href="{{ url('/catas') }}">Catas</a>
        <a href="{{ url('/politica-de-privacidad') }}">Política de Privacidad</a>
        <a href="{{ url('/terminos-y-condiciones') }}">Términos y Condiciones</a>
    </nav>

    <section style="text-align: center; margin: 20px;">
        <p>
            Explora nuestros cursos especializados en vino, conoce más sobre nuestra misión y agenda, o ponte en contacto con nosotros para más información.
        </p>
    </section>

    <footer>
        &copy; {{ date('Y') }} Academia de Vino. Todos los derechos reservados.
    </footer>
</body>
</html>
