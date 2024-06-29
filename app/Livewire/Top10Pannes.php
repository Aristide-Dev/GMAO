<?php

namespace App\Livewire;

use App\Models\DemandeIntervention;
use App\Models\Site;
use Livewire\Component;

class Top10Pannes extends Component
{
    public $topSites = [];
    public $total_demande = 0;

    public function mount()
    {
        // Récupérer le nombre total de demandes d'intervention
        $this->total_demande = DemandeIntervention::count();

        // Récupérer les sites avec le plus de bons de commande
        $this->topSites = Site::withCount('demande_interventions')
            ->orderBy('demande_interventions_count', 'desc')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.top10-pannes', [
            'topSites' => $this->topSites,
            'total_demande' => $this->total_demande,
        ]);
    }
}
