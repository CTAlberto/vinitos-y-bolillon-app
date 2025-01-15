<?php
$curso = (object) [
    'nombre' => 'Laravel',
    'descripcion' => 'El mejor framework de PHP',
];
?>
<h1>Reseñas del Curso: {{ $curso->nombre }}</h1>
<ul>
    @foreach ($reseñas as $reseña)
        <li>{{ $reseña->comentario }} - {{ $reseña->usuario }}</li>
    @endforeach
</ul>
