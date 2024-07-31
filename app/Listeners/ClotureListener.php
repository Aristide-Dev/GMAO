<?php

namespace App\Listeners;

use App\Mail\ColotureMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;

class ClotureListener
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
        $this->mailer->send(new ColotureMail($event->rapport_interventon, $event->prestataire));
    }
}
