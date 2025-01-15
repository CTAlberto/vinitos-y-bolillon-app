<?php
$curso = (object) [
    'nombre' => 'Laravel',
    'descripcion' => 'El mejor framework de PHP',
];
?>
<h1>Detalle del Curso: {{ $curso->nombre }}</h1>
<p>{{ $curso->descripcion }}</p>
