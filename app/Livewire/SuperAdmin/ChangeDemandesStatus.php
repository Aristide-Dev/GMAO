<?php

namespace App\Livewire\SuperAdmin;
use App\Enums\StatusEnum;
use App\Models\DemandeIntervention;
use Livewire\Component;

class ChangeDemandesStatus extends Component
{
    public $demandes_count = 0;
    public $demandes_need_change = [];
    public $demandes_has_anuller_or_others = [];

    public function mount()
    {
        $this->loadData();
    }

    private function loadData()
    {
        $this->demandes_count = DemandeIntervention::count();
        $this->demandes_need_change = DemandeIntervention::where('status', 'Terminé')
            ->orWhere('status', 'terminé')
            ->get()
            ->toArray(); // Convertir en tableau pour éviter les erreurs
        
        $this->demandes_has_anuller_or_others = DemandeIntervention::where('status', 'rejeté')
            ->orWhere('status', 'annulé')
            ->get()
            ->toArray(); // Convertir en tableau pour éviter les erreurs
    }

    public function setCloture($demande = null)
    {
        if ($demande instanceof DemandeIntervention && !empty($demande)) {
            $demande->update(['status' => StatusEnum::CLOTURE]);
        } elseif (!empty($this->demandes_need_change)) {
            foreach ($this->demandes_need_change as $demande_intervention) {
                DemandeIntervention::find($demande_intervention['id'])->update(['status' => StatusEnum::CLOTURE]);
            }
        }
        $this->loadData();
    }

    public function changeOthersStatus($demande = null, $status = StatusEnum::AFFECTER_TRAVAUX)
    {
        if ($demande instanceof DemandeIntervention && !empty($demande)) {
            $demande->update(['status' => $status]);
        } elseif (!empty($this->demandes_has_anuller_or_others)) {
            foreach ($this->demandes_has_anuller_or_others as $demande_intervention) {
                DemandeIntervention::find($demande_intervention['id'])->update(['status' => $status]);
            }
        }
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.super-admin.change-demandes-status');
    }
}
