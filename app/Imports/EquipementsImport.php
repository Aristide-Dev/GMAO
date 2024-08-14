<?php

namespace App\Imports;

use App\Models\Site;
use App\Models\Equipement;
use App\Enums\EquipementEnum;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipementsImport implements ToModel, WithHeadingRow
{

    public function __construct(public Site $site)
    {
        
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $categorie = EquipementEnum::get($row['categorie']);
        $forfait_contrat = floatval($row['forfait_contrat']);

        return new Equipement([
            'name' => $row['equipement'],
            'categorie' => $categorie,  // Ajustez en fonction des noms de colonnes dans votre fichier Excel
            'numero_serie' => $row['numero_de_serie'],
            'forfait_contrat' => $forfait_contrat,
            'site_id' => $this->site->id,
            'marque' => $row['marque'],
            'type' => $row['type'],
            'produit' => $row['produit'],
            'annee_fabrication' => $row['annee_de_fabrication'],
            'puissance' => $row['puissance'],
            'observations' => $row['observations'],
            'actif' => $row['status'] === 'activé' ? true : false,
        ]);
    }
}
