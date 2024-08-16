<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\DemandeIntervention;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreateDemandeInterventionMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DemandeInterventionSendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public DemandeIntervention $demande)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Envoyer l'email en utilisant la classe Mailable
        $to = (config('app.env') !== 'production') ? 'aristidegnimassouu@gmail.com' : 'maintenance@staroilgroup.com';
        Mail::to($to)->send(
            new CreateDemandeInterventionMail($this->demande)
        );
    }
}
