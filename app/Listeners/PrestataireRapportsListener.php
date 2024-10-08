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
        $this->mailer->send(new RapportIntervention($event->rapport_interventon, $event->prestataire));
    }
}