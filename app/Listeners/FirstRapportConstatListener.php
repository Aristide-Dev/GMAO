<?php

namespace App\Listeners;

use App\Mail\RapportIntervention;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;

class FirstRapportConstatListener implements ShouldQueue
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
