<?php

namespace App\Listeners;

use App\Events\CreateBTEvent;
use App\Mail\CreateBTMail;
use App\Notifications\CreateBTNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;

class CreateBTListener implements ShouldQueue
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
    public function handle(CreateBTEvent $event): void
    {
        // new CreateBTNotification($event->bon_travail, $event->prestataire);
        $this->mailer->send(new CreateBTMail($event->bon_travail, $event->prestataire));
    }
}
