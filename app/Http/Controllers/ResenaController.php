<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResenaController extends Controller
{
    public function index($id)
    {
        // Lógica para mostrar las reseñas de un curso
        return view('cursos.reseñas', compact('id'));
    }
}
