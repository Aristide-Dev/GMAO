<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Site;
use App\Models\ForfaitContrat;
use Carbon\Carbon;

class GenerateMonthlyPendingForfaitContrat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:monthly-pending-forfait-contrat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate monthly pending forfait contrats for each site';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sites = Site::all();
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        // $startDate->addMonth(1);
        // $endDate->addMonth(1);

        foreach ($sites as $site) {
            ForfaitContrat::create([
                'site_id' => $site->id,
                'amount' => $this->calculateForfaitAmount($site),
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }

        $this->info('Monthly pending forfait contrats generated successfully for '.$startDate);

        return 0;
    }

    /**
     * Calculate the forfait amount for the site.
     *
     * @param Site $site
     * @return float
     */
    protected function calculateForfaitAmount(Site $site)
    {
        // Add logic to calculate the forfait amount based on site-specific criteria.
        return $site->calculateTotalForfaitContrat() ?? 0;
        // return 1000.00; // Example amount
    }
}
