<h1>Listado de Catas</h1>
<ul>
    {{-- Iterar sobre las catas y mostrarlas --}}
    @foreach ($catas as $cata)
        <li>{{ $cata->nombre }}</li>
    @endforeach
</ul>
