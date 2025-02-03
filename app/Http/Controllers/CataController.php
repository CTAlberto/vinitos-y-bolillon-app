<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Contacto;

class CataController extends Controller
{
    // Muestra todas las catas disponibles
    public function index()
    {
        // Se obtienen solo los eventos con id_category igual a 1 (asegúrate de que esta condición sea la correcta)
        $catas = Event::where('id_category', 1)->get();
        return view('catas.index', compact('catas'));
    }

    // Muestra el detalle de una cata en específico
    public function show($id)
    {
        $catas = Event::findOrFail($id);
        return view('catas.show', compact('catas'));
    }

    // Muestra la vista de inscripción a una cata específica
    public function inscribirse($id)
    {
        $catas = Event::findOrFail($id);
        return view('inscribirse.index', compact('catas'));
    }

    public function procesarInscripcion(Request $request, $id)
    {
        // Buscar la cata
        $catas = Event::findOrFail($id);

        // Validar los datos del formulario
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Simulación de inscripción (puedes guardar en una tabla de inscripciones si lo requieres)
        return redirect()->route('inscribirse', $id)->with('success', '¡Inscripción realizada con éxito!');
    }

    public function create($id)
    {
        $catas = Event::findOrFail($id);
        return view('inscribirse', compact('catas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'tel'    => 'required|string|max:20',
            'email'  => 'required|email|max:255',
            'reason' => 'required|string',
        ]);
    
        Contact::create([
            'name'       => $request->name,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'event_id'   => $request->curso_id,
            'validation' => 'pending',
            'reason'     => $request->reason,
        ]);
    
        // Redirigir a la página de inscripción de la cata
        return redirect()->route('inscribirse', $request->curso_id)->with('success', '¡Inscripción realizada correctamente!');
    }
}
