<?php

namespace App\Providers;

use App\Events\ClotureEvent;
use App\Events\CreateBTEvent;
use App\Listeners\ClotureListener;
use App\Listeners\CreateBTListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\AdminInjectionPieceEvent;
use App\Events\FirstRapportConstatEvent;
use App\Events\PrestataireRapportsEvent;
use App\Events\CreateDemandeInterventionEvent;
use App\Listeners\AdminInjectionPieceListener;
use App\Listeners\FirstRapportConstatListener;
use App\Listeners\PrestataireRapportsListener;
use App\Listeners\CreateDemandeInterventionListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // envois de mail au prestataire
        CreateBTEvent::class => [
            CreateBTListener::class,
        ],

        // envois de mail au prestataire
        FirstRapportConstatEvent::class => [
            FirstRapportConstatListener::class,
        ],

        // envois de mail au prestataire
        CreateDemandeInterventionEvent::class => [
            CreateDemandeInterventionListener::class,
        ],

        // envois de mail au prestataire
        AdminInjectionPieceEvent::class => [
            AdminInjectionPieceListener::class,
        ],

        // envois de mail au prestataire
        PrestataireRapportsEvent::class => [
            PrestataireRapportsListener::class,
        ],

        // cloture
        ClotureEvent::class => [
            ClotureListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
