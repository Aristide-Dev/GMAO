<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEquipements implements FromCollection, WithHeadings
{
    protected $equipements;

    public function __construct($equipements)
    {
        $this->equipements = $equipements;
    }

    public function collection()
    {
        return collect($this->equipements);
    }

    public function headings(): array
    {
        return [
            'Equipement',
            'Catégorie',
            'Numero de serie',
            'Forfait contrat',
            'Site',
            'Marque',
            'Type',
            'Produit',
            'Année de fabrication',
            'Puissance',
            'Observations',
            'Status',
        ];
    }
}
