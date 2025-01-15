<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CursoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la lista de cursos
        return view('cursos.index')->with('cursos', Event::all());
    }

    public function show($id)
    {
        // Lógica para mostrar el detalle de un curso
        return view('cursos.show', compact('id'));
    }
}
