<?php

namespace App\Livewire;

use App\Models\DemandeIntervention;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

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

        $demandeur_id = Auth::user()->id;

        if ($this->action == 'demandeur') {
            $demandes = DemandeIntervention::where("demandeur_id", $demandeur_id)
                ->where(function($query) {
                    $query->where('di_reference', 'like', '%' . $this->search . '%')
                          ->orWhere('created_at', 'like', '%' . $this->search . '%')
                          ->orWhereHas('site', function($query) {
                              $query->where('name', 'like', '%' . $this->search . '%');
                          });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } elseif ($this->action == 'admin') {
            $demandes = DemandeIntervention::where(function($query) {
                    $query->where('di_reference', 'like', '%' . $this->search . '%')
                          ->orWhere('created_at', 'like', '%' . $this->search . '%')
                          ->orWhereHas('site', function($query) {
                              $query->where('name', 'like', '%' . $this->search . '%');
                          })
                          ->orWhereHas('demandeur', function($query) {
                              $query->where('first_name', 'like', '%' . $this->search . '%');
                              $query->where('last_name', 'like', '%' . $this->search . '%');
                          });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

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
