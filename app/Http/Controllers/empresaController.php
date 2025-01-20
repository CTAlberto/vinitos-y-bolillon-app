<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(Request $request)
{
    // Obtener todos los eventos
    $events = Event::with('category'); // Cargar la relación con category

    // Si se pasa un parámetro 'category_id', filtrar los eventos por esa categoría
    if ($request->has('category_id')) {
        $events = $events->where('fk_id_category', $request->category_id);
    }

    // Obtener los eventos después de aplicar el filtro (si hay)
    $events = $events->get();

    return view('empresa.index', compact('events'));
}


public function show($id)
{
    $event = Event::with(['category', 'instructors'])->findOrFail($id);
    return view('empresa.show', compact('event'));
}
}
