<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Event::all(); // Obtenemos los eventos
        dd($cursos); // Muestra los datos en pantalla y detiene la ejecución
        return view('cursos.index', compact('cursos'));
    }
    


    public function show($id)
    {
        // Lógica para mostrar el detalle de un curso
        return view('cursos.show', compact('id'));
    }
}
