<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class CataController extends Controller
{
    public function index()
    {
        
        // Lógica para mostrar la lista de catas
        return view('catas.index')->with('catas', Event::all());;
    }

    public function show($id)
    {
        // Lógica para mostrar el detalle de una cata
        return view('catas.show', compact('id'));
    }
}
