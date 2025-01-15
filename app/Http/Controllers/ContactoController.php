<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la página de contacto
        return view('contacto.index');
    }
}
