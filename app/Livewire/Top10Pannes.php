<?php

namespace App\Livewire;

use App\Models\DemandeIntervention;
use App\Models\Site;
use Livewire\Component;

class Top10Pannes extends Component
{
    public $topSites = [];
    public $total_demande = 0;

    public $year_filter;
    public $month_filter;

    private function between()
    {
        $startDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-01"));
        $endDate = date('Y-m-d', strtotime("$this->year_filter-$this->month_filter-" . date('t', strtotime($startDate))));
        return [$startDate, $endDate];
    }

    public function mount()
    {
        // Initialiser les filtres avec l'année et le mois en cours
        $this->year_filter = date('Y');
        $this->month_filter = date('n');

        // Charger les données initiales
        $this->loadData();
    }

    public function updatedYearFilter()
    {
        $this->loadData();
    }

    public function updatedMonthFilter()
    {
        $this->loadData();
    }

    private function loadData()
    {
        // Récupérer le nombre total de demandes d'intervention pour le mois et l'année sélectionnés
        $this->total_demande = DemandeIntervention::whereBetween('created_at', $this->between())->count();
        
        // Récupérer les sites avec le plus de bons de commande
        $this->topSites = Site::whereBetween('created_at', $this->between())->withCount('demande_interventions')
            ->orderBy('demande_interventions_count', 'desc')
            ->take(10)
            ->get();
    }

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        // Logique ou action spécifique lors du clic sur un point
    }

    public function handleOnSliceClick($slice)
    {
        // Logique ou action spécifique lors du clic sur une tranche
    }

    public function handleOnColumnClick($column)
    {
        // Logique ou action spécifique lors du clic sur une colonne
    }

    public function handleOnBlockClick($block)
    {
        // Logique ou action spécifique lors du clic sur un bloc
    }

    public function render()
    {
        return view('livewire.top10-pannes', [
            'topSites' => $this->topSites,
            'total_demande' => $this->total_demande,
        ]);
    }
}
