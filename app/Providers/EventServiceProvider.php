<?php

namespace App\Providers;

use App\Events\ClotureEvent;
use App\Events\CreateBTEvent;
use App\Events\FirstRapportConstatEvent;
use App\Listeners\ClotureListener;
use App\Listeners\CreateBTListener;
use App\Listeners\FirstRapportConstatListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
