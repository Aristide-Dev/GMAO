<?php

namespace App\Livewire;

use App\Models\Site;
use App\Exports\ExportEquipements;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EquipementsImport;
use Livewire\WithFileUploads;
use Livewire\Component;

class SiteEquipementsData extends Component
{
    use WithFileUploads;

    public Site $site;
    public $importFile;

    public function mount(Site $site)
    {
        $this->site = $site;
    }

    public function render()
    {
        return view('livewire.site-equipements-data');
    }

    public function exportExcel()
    {
        try {
            // On ne récupère que les équipements actifs
            $equipements = $this->site->equipements;

            $formattedequipements = $equipements->map(function ($equipement) {
                return [
                    'Equipement' => $equipement->name,
                    'Catégorie' => $this->site->categorieEquipementText($equipement->categorie),
                    'Numero de serie' => $equipement->numero_serie,
                    'Forfait contrat' => $equipement->forfait_contrat,
                    'Site' => $this->site->name,
                    'Marque' => $equipement->marque,
                    'Type' => $equipement->type,
                    'Produit' => $equipement->produit,
                    'Année de fabrication' => $equipement->annee_fabrication,
                    'Puissance' => $equipement->puissance,
                    'Observations' => $equipement->observations,
                    'Status' => $equipement->actif ? 'activé' : 'désactivé',
                ];
            });

            return Excel::download(new ExportEquipements($formattedequipements), 'Liste_des_equipements_' . $this->site->name .'_'. now()->format('Y_m_d_H_i_s') . '.xlsx');

        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de l\'exportation des équipements : ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function importExcel()
    {
        $this->validate([
            'importFile' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new EquipementsImport($this->site), $this->importFile);

        session()->flash('success', 'Équipements importés avec succès!');

        // Recharger la page
        return redirect()->to(request()->header('Referer'));
    }
}
