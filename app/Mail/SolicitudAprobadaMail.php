<?php

namespace App\Mail;
use App\Http\Controllers\SolicitudController;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudAprobadaMail extends Mailable
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
            subject: '¡Tu solicitud de adopción fue aprobada!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.solicitud_aprobada'
        );
    }
}