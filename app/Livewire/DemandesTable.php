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
        return $this->sortField == 'demandeur.name' ? 'created_at' : $this->sortField;
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
            $query->where("demandeur_id", Auth::id());
        }

        $query->where(function($query) {
            $query->where('di_reference', 'like', '%' . $this->search . '%')
                  ->orWhere('created_at', 'like', '%' . $this->search . '%')
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
            $query->orderBy($this->getDemandeursortField(), $this->sortDirection);
        }
        return $query;
    }

    public function render()
    {
        $url = $this->determineUrl($this->action);

        $demandes = $this->getDemandes()->paginate(10);
        $demandes_count = $this->getDemandes()->count();

        return view('livewire.demandes-table', [
            'url' => $url,
            'demandes' => $demandes,
            'demandes_count' => $demandes_count,
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
        $demandes = $this->getDemandes()->with(['demandeur', 'site', 'bon_travails.equipement', 'bon_travails.prestataire', 'bon_travails.rapportIntervention'])->get();

        $formattedDemandes = $demandes->map(function ($demande) {
            $bonTravail = $demande->bon_travails->first();
            $equipement = $bonTravail ? $bonTravail->equipement : null;
            $prestataire = $bonTravail ? $bonTravail->prestataire : null;
            $rapportIntervention = $bonTravail ? $bonTravail->rapportIntervention : null;

            return [
                'Reference' => $demande->di_reference,
                'Demandeur' => $demande->demandeur->first_name . ' ' . $demande->demandeur->last_name,
                'Site' => $demande->site->name,
                'Panne declarée' => $bonTravail ? $bonTravail->requete : '',
                'Nom et Réference équipement' => $equipement ? $equipement->name . " _ " . $equipement->numero_serie : '',
                'Prestataire' => $prestataire ? $prestataire->name : '',
                'Status' => $demande->status,
                'Heure d\'emission BT' => $bonTravail ? $bonTravail->created_at->format('Y-m-d à H:i:s') : '',
                'Heure d\'intervention Prestataire' => $rapportIntervention ? $rapportIntervention->created_at->format('Y-m-d à H:i:s') : '',
            ];
        });

        return Excel::download(new ExportExcel($formattedDemandes), 'liste_demandes_' . now()->format('Y_m_d_H_i_s') . '.xlsx');
    }

    public function exportPDF()
    {
        $demandes = $this->getDemandes()->with(['demandeur', 'site', 'bon_travails.equipement', 'bon_travails.prestataire', 'bon_travails.rapportIntervention'])->get();
        return (new ExportPDF($demandes))->download();
    }
}
