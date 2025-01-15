<?php

?>
<h1>Listado de Cursos</h1>
<ul>
    {{-- Iterar sobre los cursos y mostrarlos --}}
    @foreach ($cursos as $curso)
    <li>{{ $curso->title_event }}</li>
    <li>{{ $curso->subtitle }}</li>
    <li>{{ $curso->description }}</li>
    <li>{{ $curso->content }}</li>
    <li>{{ $curso->requirements }}</li>
    <li>{{ $curso->ini_date }}</li>
    <li>{{ $curso->end_date }}</li>
    <li>{{ $curso->price }}</li>
    <li>{{ $curso->location }}</li>
    <li>{{ $curso->capacity }}</li>
    <li>{{ $curso->language }}</li>
    @endforeach
</ul>
