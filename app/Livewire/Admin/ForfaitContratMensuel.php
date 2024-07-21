<?php

namespace App\Livewire\Admin;

use \Carbon\Carbon;
use App\Models\ForfaitContrat;
use Livewire\Component;

class ForfaitContratMensuel extends Component
{
    public $pendingForfaits;
    public $validateForfaits;

    public $year_filter;
    public $month_filter;
    public $periode_text = null;

    private function between()
    {
        $startDate = Carbon::createFromDate($this->year_filter, $this->month_filter, 1)->startOfDay();
        $endDate = $startDate->copy()->endOfMonth()->endOfDay();
        return [$startDate, $endDate];
    }
    
    public function mount()
    {
        // Initialiser les filtres avec l'année et le mois en cours
        $this->year_filter = date('Y');
        $this->month_filter = date('n');
        $this->initPeriode();
        $this->loadData();
    }

    private function initPeriode()
    {
        $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
        $endDate = $startDate->copy()->endOfMonth();
        $this->periode_text = "Période du " . $startDate->translatedFormat('d F Y') . " au " . $endDate->translatedFormat('d F Y');
    }

    private function loadData()
    {
        

        // $this->pendingForfaits = ForfaitContrat::where('validated', false)
        // ->get()
        // ->groupBy(function ($date) {
        //     return \Carbon\Carbon::parse($date->created_at)->format('Y-m'); // Grouper par année et mois
        // });

        $this->pendingForfaits = ForfaitContrat::where('validated', false)
        ->whereBetween('start_date', $this->between())
        ->get();

        $this->validateForfaits = ForfaitContrat::where('validated', true)
            ->whereBetween('start_date', $this->between())
            ->get();

    
        // Récupérer les forfaits validés et les regrouper par mois
        // $this->validateForfaits = ForfaitContrat::where('validated', true)
        // ->get()
        // ->groupBy(function ($date) {
        //     return Carbon::parse($date->created_at)->format('Y-m'); // Grouper par année et mois
        // });
    }

    public function updatedYearFilter()
    {
        $this->initPeriode();
        $this->loadData();
    }

    public function updatedMonthFilter()
    {
        $this->initPeriode();
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.admin.forfait-contrat-mensuel');
    }
}
