<?php
namespace App\Mail;

use App\Models\Event;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegalaExperienciaMail extends Mailable
{
    use SerializesModels;

    public $cursos;
    public $recipient_name;
    public $message;

    public function __construct(Event $cursos, $request)
    {
        $this->cursos = $cursos;
        $this->recipient_name = $request->recipient_name;
        $this->message = $request->message;
    }

    public function build()
    {
        return $this->subject("¡Te han regalado una experiencia!")
                    ->view('emails.regala_experiencia'); // Asegúrate de crear la vista para el correo
    }
}
