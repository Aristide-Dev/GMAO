<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection, WithHeadings
{
    protected $demandes;

    public function __construct($demandes)
    {
        $this->demandes = $demandes;
    }

    public function collection()
    {
        return collect($this->demandes);
    }

    public function headings(): array
    {
        return [
            'Reference',
            'Commentaires',
            'Demandeur',
            'Site',
            'Panne declarée',
            'Nom et Réference équipement',
            'Prestataire',
            'Status',
            'Heure d\'emission BT',
            'Heure d\'intervention Prestataire',
        ];
    }
}
