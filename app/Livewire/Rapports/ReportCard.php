<?php

namespace App\Livewire\Rapports;

use App\Models\MonthlyReport;
use Livewire\Component;

class ReportCard extends Component
{
    public MonthlyReport $monthlyReport;

    public function mount(MonthlyReport $monthlyReport)
    {
        $this->monthlyReport = $monthlyReport;
    }

    public function render()
    {
        return view('livewire.rapports.report-card');
    }
}
