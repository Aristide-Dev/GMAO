<?php

namespace App\Livewire;

use App\Models\Site;
use App\Exports\ExportEquipements;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;

class SiteEquipementsData extends Component
{

    public Site $site;

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

        return Excel::download(new ExportEquipements($formattedequipements), 'Liste_des_equipements_' . $this->site->name . now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
}
