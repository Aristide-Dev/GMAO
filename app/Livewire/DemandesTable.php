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
        return $this->sortField == 'demandeur.name' ? 'gmao_demande_interventions.created_at' : $this->sortField;
    }
    public function sortBy($field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }


    private function getDemandes()
    {
        $query = DemandeIntervention::with(['site', 'demandeur', 'bon_travail.rapportIntervention']);
        
        if ($this->action == 'demandeur') {
            $query->where("demandeur_id", Auth::id());
        }
    
        $query->where(function($query) {
            $query->where('demande_interventions.di_reference', 'like', '%' . $this->search . '%')
                  ->orWhere('demande_interventions.created_at', 'like', '%' . $this->search . '%')
                  ->orWhereHas('site', function($query) {
                      $query->where('name', 'like', '%' . $this->search . '%');
                  })
                  ->orWhereHas('demandeur', function($query) {
                      $query->where('first_name', 'like', '%' . $this->search . '%')
                            ->orWhere('last_name', 'like', '%' . $this->search . '%');
                  })
                  ->orWhereHas('bon_travail.rapportIntervention', function($query) {
                      $query->where('commentaire', 'like', '%' . $this->search . '%');
                  });
        });
    
        // Adjust sort logic based on the sort field
        if ($this->sortField === 'site.name') {
            $query->join('sites', 'demande_interventions.site_id', '=', 'sites.id')
                  ->orderBy('sites.name', $this->sortDirection);
        } elseif ($this->sortField === 'demandeur.first_name') {
            $query->join('users as demandeur', 'demande_interventions.demandeur_id', '=', 'demandeur.id')
                  ->orderBy('demandeur.first_name', $this->sortDirection);
        } elseif ($this->sortField === 'commentaires') {
            $query->join('bon_travails as bon_travails', 'demande_interventions.di_reference', '=', 'bon_travails.di_reference')
                  ->join('rapport_interventions as rapport', 'bon_travails.bt_reference', '=', 'rapport.bt_reference')
                  ->orderBy('rapport.commentaire', $this->sortDirection);
        } else {
            $query->orderBy('demande_interventions.' . $this->sortField, $this->sortDirection);
        }
    
        return $query;
    }
    
    
    
    


    public function render()
    {
        $url = $this->determineUrl($this->action);

        $demandes = $this->getDemandes()->paginate(50);
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
            case 'commercial':
                return 'commercial';
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
                'Commentaires' => $bonTravail->rapportIntervention->commentaire ?? '',
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
