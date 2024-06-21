<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DemandeIntervention;

class DemandesTable extends Component
{
    use WithPagination;

    public $action = 'demandeur';
    public $search = '';

    protected $listeners = ['refreshDemandes' => '$refresh'];

    public function mount($action = 'demandeur')
    {
        $this->action = $action;
    }

    public function render()
    {
        $url = $this->determineUrl($this->action);

        $demandes = DemandeIntervention::where('di_reference', 'like', '%' . $this->search . '%')
                                            ->orwhere('created_at', 'like', '%'.$this->search.'%')
                                            ->orderby('created_at', 'desc')
                                            ->paginate(10);

        return view('livewire.demandes-table', [
            'url' => $url,
            'demandes' => $demandes
        ]);
    }

    private function determineUrl($action)
    {
        switch ($action) {
            case 'admin':
                return 'admin';
            case 'prestataires':
                return 'prestataires';
            default:
                return 'demandeur';
        }
    }
}
