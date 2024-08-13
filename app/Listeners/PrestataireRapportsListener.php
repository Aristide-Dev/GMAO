<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\RapportIntervention;
use App\Mail\rapportRemplacementMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrestataireRapportsListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if ($event->action == 'rapport_interventon') {
            $this->mailer->send(new RapportIntervention($event->rapport_interventon, $event->prestataire));
        } elseif ($event->action == 'rapportRemplacementPiece') {
            $this->mailer->send(new rapportRemplacementMail($event->rapportRemplacementPiece, $event->prestataire));
        }
    }
}