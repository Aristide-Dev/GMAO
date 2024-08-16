<?php

namespace App\Mail;

use App\Models\Prestataire;
use App\Models\RapportIntervention as ModelRapportIntervention;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminInjectionPieceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bonTravail;
    public $email_to_send;

    /**
     * Create a new message instance.
     */
    public function __construct(public ModelRapportIntervention $rapport_interventon, public Prestataire $prestataire)
    {
        $this->bonTravail = $rapport_interventon->bon_travail;

        if (config('app.env') !== 'production') {
            $this->email_to_send = 'aristidegnimassouu@gmail.com';
        }else{
            if($this->prestataire->admin())
            {
                $this->email_to_send = $this->prestataire->admin()->email;
            }else{
                $this->email_to_send = $this->prestataire->email;
            }
        }
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
            subject: 'Remplacement des pièces validées  - '.config('app.pays_name'),
            to: $this->email_to_send,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admin-injection-piece-mail',
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
