<?php

namespace App\Livewire\Admin;

use App\Models\Site;
use App\Models\User;
use Livewire\Component;

class SiteAffectation extends Component
{

    public $sites = [];
    public $selectedSites = [];
    public User $user;  // Assurez-vous que $user est de type User.


    public function mount(User $user)
    {
        $this->user = $user;
        $this->sites = Site::all(); // Tous les sites disponibles
        $this->selectedSites = $user->demandeur_sites->pluck('id')->toArray(); // Les sites auxquels l'utilisateur est déjà affecté
    }

    public function affecter()
    {
        $this->validate([
            'selectedSites' => 'required|array',
        ]);

        // Synchronisation des affectations
        $this->user->demandeur_sites()->sync($this->selectedSites);
        $this->selectedSites = $this->user->demandeur_sites->pluck('id')->toArray(); // Les sites auxquels l'utilisateur est déjà affecté

        session()->flash('success', 'Sites affectés avec succès !');
    }

    public function remove($siteId)
    {
        // Suppression de l'affectation du site spécifique pour l'utilisateur
        $this->user->demandeur_sites()->detach($siteId);

        // Mise à jour de la liste des sites sélectionnés
        $this->selectedSites = $this->user->demandeur_sites->pluck('id')->toArray();

        // Message de confirmation
        session()->flash('message', 'Affectation supprimée avec succès !');
    }


    public function render()
    {
        return view('livewire.admin.site-affectation');
    }
}
