<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        // Obtener todos los eventos (catas y cursos)
        $eventos = Event::with('category')->get();

        return view('empresa.index', compact('eventos'));
    }

    public function show($id)
    {
        // Mostrar detalles de un evento
        $evento = Event::with('category')->findOrFail($id);

        return view('empresa.show', compact('evento'));
    }
}
