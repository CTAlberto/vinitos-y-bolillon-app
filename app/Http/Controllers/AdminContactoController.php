<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContactoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar los contactos enviados en administración
        return view('admin.contactos.index');
    }
}
