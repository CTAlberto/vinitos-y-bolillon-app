<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\RegalaExperienciaMail; // Asegúrate de importar la clase correcta
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegalaExperienciaController extends Controller
{
    public function index()
    {
            $cursos = Event::all(); // Trae todos los cursos de la base de datos
        return view('regala-experiencia.index', compact('cursos'));
    }

    public function submit(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'event_id' => 'required|exists:courses,id',
            'recipient_name' => 'required|string|max:255',
            'recipient_email' => 'required|email',
            'message' => 'nullable|string',
        ]);

        // Obtener el curso seleccionado
        $curso = Event::find($request->course_id);

        // Enviar el correo usando la clase RegalaExperienciaMail
        Mail::to($request->recipient_email)->send(new RegalaExperienciaMail($curso, $request));

        // Retornar algún mensaje o redirigir
        return back()->with('success', 'La experiencia ha sido regalada con éxito!');
    }
}


