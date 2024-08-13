<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreateDemandeInterventionMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateDemandeInterventionListener
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
        $this->mailer->send(new CreateDemandeInterventionMail($event->demande));
    }
}
