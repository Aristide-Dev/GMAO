<?php

namespace App\Mail;

use App\Models\Prestataire;
use App\Models\BonTravail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateBTMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public BonTravail $bonTravail, public Prestataire $prestataire)
    {
        // dd($this);
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
            subject: 'Demande d\'intervention - ' . config('app.pays_name'),
            to: (config('app.env') !== 'production') ? 'aristidegnimassouu@gmail.com' : $this->prestataire->email,
            cc: (config('app.env') !== 'production') ? 'aristechdev@gmail.com' : 'maintenance@staroilgroup.com',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.create-b-t-mail'
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
