@extends('layouts.app') <!-- Esto indica que esta vista usa la plantilla principal (layout.app) -->

@section('main-content') <!-- Define lo que debe insertarse en la sección 'main-content' -->
    <div style="display: flex; justify-content: center; align-items: center; height: calc(100vh - 80px); margin-top: 80px;">
        <div id="calendar" style="width: 80%; max-width: 1200px;"></div>
    </div>
@endsection