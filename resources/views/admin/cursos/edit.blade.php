<h1>Editar Curso: {{ $curso->nombre }}</h1>
<form method="POST" action="/admin/cursos/{{ $curso->id }}/actualizar">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $curso->nombre }}" required>
    <button type="submit">Actualizar</button>
</form>

