<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>South Wines Academy</title>
    <style>

        body, html {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: black;
            cursor: pointer;
        }
        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body onclick="window.location.href='/welcome'">
    <video autoplay muted playsinline>
    <source src="{{ Vite::asset('resources/videos/landing.mp4') }}" type="video/mp4">
        Tu navegador no soporta la reproducción de videos.
    </video>
</body>
</html>
