<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la página de contacto
        return view('contacto.index');
    }
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tel' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'event_id' => 'required|exists:events,id',
            'reason' => 'nullable|string|max:500',
        ]);

        // Guardar los datos en la base de datos
        Contact::create([
            'name' => $validated['nombre'],
            'tel' => $validated['tel'],
            'email' => $validated['email'],
            'event_id' => $validated['event_id'],
            'validation' => 'pending', // Estado por defecto
            'reason' => $validated['reason'],
        ]);

        // Responder al cliente
        return response()->json(['message' => 'Contacto enviado correctamente.'], 200);
    }
}
