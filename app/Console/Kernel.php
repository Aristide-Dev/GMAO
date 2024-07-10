<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('inspire')->hourly();
        // Planifier la génération des forfaits de contrat mensuels en attente de validation
        $schedule->command('generate:monthly-pending-forfait-contrat')->monthlyOn(1, '00:00');

        // Planifier la génération du rapport mensuel
        $schedule->command('generate:report')->monthlyOn(1, '00:00');
        $schedule->command('generate:report')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
