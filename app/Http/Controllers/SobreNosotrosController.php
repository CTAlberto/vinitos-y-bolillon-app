<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosotrosController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la página de "Sobre Nosotros"
        return view('sobre-nosotros.index');
    }
}