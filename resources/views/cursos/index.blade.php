<?php

?>
<h1>Listado de Cursos</h1>
<ul>
    {{-- Iterar sobre los cursos y mostrarlos --}}
    @foreach ($cursos as $curso)
        <li>{{ $curso->nombre }}</li>
    @endforeach
</ul>
