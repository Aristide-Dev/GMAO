<?php

namespace App\Mail;

use App\Models\Prestataire;
use App\Models\RapportIntervention;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ColotureMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bonTravail;

    /**
     * Create a new message instance.
     */
    public function __construct(public RapportIntervention $rapport_interventon, public Prestataire $prestataire)
    {
        $this->bonTravail = $rapport_interventon->bon_travail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [
                new Address('maintenance@staroilgroup.com', 'Star oil Group / G-Maintenance'),
            ],
            subject: 'Cloture de la Requete - '.config('app.pays_name'),
            to: (config('app.env') !== 'production') ? 'aristidegnimassouu@gmail.com' :$this->prestataire->email,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.coloture-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
