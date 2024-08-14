<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\AdminInjectionPieceMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminInjectionPieceListener
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
        $this->mailer->send(new AdminInjectionPieceMail($event->rapport_interventon, $event->prestataire));
    }
}