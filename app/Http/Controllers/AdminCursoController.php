<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCursoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la lista de cursos en administración
        return view('admin.cursos.index');
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de un curso
        return view('admin.cursos.edit', compact('id'));
    }
}
