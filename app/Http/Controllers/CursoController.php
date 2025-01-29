<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Contacto;

class CursoController extends Controller
{
    // Muestra todos los cursos disponibles
    public function index()
    {
        $cursos = Event::all(); // Obtenemos todos los cursos
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
    public function procesarInscripcion(Request $request, $id)
{
    // Buscar el curso
    $curso = Event::findOrFail($id);

    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Simulación de inscripción (puedes guardar en una tabla de inscripciones si tienes una)
    return redirect()->route('inscribirse', $id)->with('success', '¡Inscripción realizada con éxito!');
}
    public function create($id)
    {
        $curso = Event::findOrFail($id);
        return view('inscribirse', compact('curso'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'reason' => 'required|string',
        ]);
    
        Contact::create([
            'name' => $request->name,
            'tel' => $request->tel, // Corregido el nombre del campo
            'email' => $request->email,
            'event_id' => $request->curso_id,
            'validation' => 'pending',
            'reason' => $request->reason,
        ]);
    
        // Redirigir a la página de inscripción del curso
        return redirect()->route('inscribirse', $request->curso_id)->with('success', '¡Inscripción realizada correctamente!');
    }
}
