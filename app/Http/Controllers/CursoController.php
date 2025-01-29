<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Event;

class CursoController extends Controller
{
    // Muestra todos los cursos disponibles
    public function index()
    {
        $cursos = Event::where('id_category', 2)->get(); // Obtenemos solo los cursos con id_category igual a 2
        return view('cursos.index', compact('cursos'));
    }

    // Muestra el detalle de un curso en específico
    public function show($id)
    {
        $curso = Event::findOrFail($id); // Busca el curso, si no lo encuentra, lanza un error 404
        return view('cursos.show', compact('curso'));
    }

    // Muestra la vista de inscripción a un curso específico
    public function inscribirse($id)
    {
        $curso = Event::findOrFail($id); // Busca el curso por su ID
        return view('inscribirse.index', compact('curso')); // Carga la vista con los datos del curso
    }

    // Lógica para procesar la inscripción
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'reason' => 'required|string',
        ]);

        // Crear un nuevo registro de contacto
        Contact::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'event_id' => $request->curso_id,
            'validation' => 'pending',
            'reason' => $request->reason,
        ]);

        // Redirigir al inicio con mensaje de éxito
        return redirect()->route('welcome')->with('success', '¡Inscripción realizada correctamente!');
    }
}
