<?php

namespace App\Livewire;

use App\Models\DemandeIntervention;
use App\Models\Prestataire;
use App\Models\Site;
use App\Models\User;
use Livewire\Component;

class StatsCard extends Component
{
    public $total_demande = 0;
    public $total_site = 0;
    public $total_site_active = 0;
    public $total_prestataire = 0;
    public $total_users = 0;

    public function mount()
    {
        // Récupérer le nombre total de demandes d'intervention
        $this->total_demande = DemandeIntervention::count();
        
        // Récupérer le nombre total des sites
        $this->total_site = Site::count();
        // Récupérer le nombre total des sites actifs
        $this->total_site_active = Site::where('actif', 1)->count();
        
        // Récupérer le nombre total des prestataires
        $this->total_prestataire = Prestataire::count();

        // Récupérer le nombre total des utilisateurs
        $this->total_users = User::where('role', '<>', 'agent')->count();
    }
    
    public function render()
    {
        return view('livewire.stats-card');
    }
}
