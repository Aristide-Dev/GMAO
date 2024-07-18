<?php

namespace App\Livewire\SuperAdmin;
use App\Enums\StatusEnum;
use App\Models\DemandeIntervention;
use Livewire\Component;

class ChangeDemandesStatus extends Component
{
    public $demandes_count;
    public $demandes_need_change;

    public function mount()
    {
        $this->loadData();
    }

    private function loadData()
    {
        $this->demandes_count = DemandeIntervention::count();
        $this->demandes_need_change = DemandeIntervention::where('status','Terminé')
                                                            ->orwhere('status','terminé')
                                                            ->get();
    }

    public function changeStatus()
    {
        if(!empty($this->demandes_need_change))
        {
            foreach($this->demandes_need_change as $demande)
            {
                $demande->update(['status' => StatusEnum::CLOTURE]);
                $this->loadData();
            }
        }
    }


    public function render()
    {
        return view('livewire.super-admin.change-demandes-status');
    }
}
