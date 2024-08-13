<?php

namespace App\Mail;

use App\Models\Prestataire;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\RapportRemplacementPiece;
use Illuminate\Contracts\Queue\ShouldQueue;

class rapportRemplacementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bonTravail;

    /**
     * Create a new message instance.
     */
    public function __construct(public RapportRemplacementPiece $rapportRemplacementPiece, public Prestataire $prestataire)
    {
        $this->bonTravail = $rapportRemplacementPiece->bon_travail;
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
            subject: 'Rapport de Remplacement de Pièce de Rechange - ' . config('app.pays_name'),
            to: (config('app.env') !== 'production') ? 'aristidegnimassouu@gmail.com' : 'maintenance@staroilgroup.com',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.rapport-remplacement-mail',
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
