@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
.carousel-inner img {
    max-height: 500px;  /* Limitar el alto de las imágenes */
    object-fit: cover;  /* Mantener el aspecto de la imagen */
}

/* Asegura que haya espacio debajo del carrusel */
.container.mt-5.mb-5 {
    padding-bottom: 80px;  /* Agregar espacio en la parte inferior */
}

/* Botones de navegación */
.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: #000;  /* Botones con fondo negro */
    border-radius: 50%;  /* Controles redondeados */
}

</style>
@section('main-content')
<div class="container mt-5 mb-5">
    <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Primer slide -->
            <div class="carousel-item active">
                <img src="{{ Vite::asset('resources/img/istockphoto-1192104610-1024x1024.jpg') }}" class="d-block w-100" alt="Vino 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark bg-light bg-opacity-75 p-2 rounded">Vino Exquisito</h5>
                    <p class="text-dark bg-light bg-opacity-75 p-2 rounded">Descubre los mejores vinos del mundo.</p>
                </div>
            </div>
            <!-- Segundo slide -->
            <div class="carousel-item">
                <img src="{{ Vite::asset('resources/img/istockphoto-1446478773-1024x1024.jpg') }}" class="d-block w-100" alt="Vino 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark bg-light bg-opacity-75 p-2 rounded">La Mejor Selección</h5>
                    <p class="text-dark bg-light bg-opacity-75 p-2 rounded">Solo lo mejor para nuestros clientes.</p>
                </div>
            </div>
            <!-- Tercer slide -->
            <div class="carousel-item">
                <img src="{{ Vite::asset('resources/img/istockphoto-1446478773-1024x1024.jpg') }}" class="d-block w-100" alt="Vino 4">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-dark bg-light bg-opacity-75 p-2 rounded">Un Toque de Elegancia</h5>
                    <p class="text-dark bg-light bg-opacity-75 p-2 rounded">Cada botella, una experiencia única.</p>
                </div>
            </div>
        </div>
        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

@endsection

