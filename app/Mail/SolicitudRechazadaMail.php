<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitudRechazadaMail extends Mailable
{
    use SerializesModels;

    public $usuario;
    public $mascota;

    public function __construct($usuario, $mascota)
    {
        $this->usuario = $usuario;
        $this->mascota = $mascota;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Resultado de tu solicitud de adopción'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.solicitud_rechazada'
        );
    }
}