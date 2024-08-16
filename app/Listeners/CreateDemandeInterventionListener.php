<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreateDemandeInterventionMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\DemandeInterventionSendMailJob;
use App\Events\CreateDemandeInterventionEvent;

class CreateDemandeInterventionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateDemandeInterventionEvent $event): void
    {
        DemandeInterventionSendMailJob::dispatch($event->demande);
        // $this->mailer->send(new CreateDemandeInterventionMail($event->demande));
    }
}
