<?php

namespace App\Console\Commands;

use App\Models\MonthlyReport;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateMonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Monthly Report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        MonthlyReport::create([
            'year' => $year,
            'month' => $month,
            'validated' => false,
        ]);

        $this->info('Monthly reports generated successfully.');
    }


    public function __construct()
    {
        parent::__construct();
    }
}
