<?php

namespace App\Livewire;

use App\Exports\ExportExcel;
use App\Exports\ExportPDF;
use App\Models\DemandeIntervention;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class DemandesTable extends Component
{
    use WithPagination;

    public $action = 'demandeur';
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $listeners = ['refreshDemandes' => '$refresh'];

    public function mount($action = 'demandeur')
    {
        $this->action = $action;
    }

    private function getDemandeursortField()
    {
        if($this->sortField == 'demandeur.name')
        {
            return 'created_at';
        }
        return $this->sortField;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    private function getDemandes()
    {
        $query = DemandeIntervention::query();

        if ($this->action == 'demandeur') {
            $query->where("demandeur_id", $demandeur_id);
        }

        $query->where(function($query) {
            $query->where('di_reference', 'like', '%' . $this->search . '%')
                  ->orWhere('demande_interventions.created_at', 'like', '%' . $this->search . '%')
                  ->orWhereHas('site', function($query) {
                      $query->where('name', 'like', '%' . $this->search . '%');
                  })
                  ->orWhereHas('demandeur', function($query) {
                      $query->where('first_name', 'like', '%' . $this->search . '%')
                            ->orWhere('last_name', 'like', '%' . $this->search . '%');
                  });
        });

        if (in_array($this->sortField, ['site.name', 'demandeur.first_name', 'demandeur.last_name'])) {
            $query->join('sites as sites', 'demande_interventions.site_id', '=', 'sites.id')
                  ->join('users as users', 'demande_interventions.demandeur_id', '=', 'users.id')
                  ->orderBy($this->sortField == 'site.name' ? 'sites.name' : ($this->sortField == 'demandeur.first_name' ? 'users.first_name' : 'users.last_name'), $this->sortDirection)
                  ->select('demande_interventions.*');
        } else {
            $query->orderBy('demande_interventions.' . $this->getDemandeursortField(), $this->sortDirection);
        }

        return $query;
    }

    public function render()
    {
        $url = $this->determineUrl($this->action);

        $demandes = $this->getDemandes()->paginate(10);

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

    public function exportExcel()
    {
        $demandes = $this->getDemandes()->get()->map(function ($demande) {
            return [
                'ID' => $demande->id,
                'Reference' => $demande->di_reference,
                'Demandeur' => $demande->demandeur->first_name . ' ' . $demande->demandeur->last_name,
                'Site' => $demande->site->name,
                'Status' => $demande->status,
                'Created At' => $demande->created_at,
                'Updated At' => $demande->updated_at,
            ];
        });
        
        return Excel::download(new ExportExcel($demandes), 'demandes.xlsx');
    }


    public function exportPDF()
    {
        $demandes = $this->getDemandes()->get();
        return (new ExportPDF($demandes))->download();
    }
}
