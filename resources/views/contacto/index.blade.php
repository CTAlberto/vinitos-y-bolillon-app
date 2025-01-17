@extends('layouts.app')
@section('main-content')
<h1>Contacto</h1>
<form method="POST" action="/contacto">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <button type="submit">Enviar</button>
</form>

@endsection