<?php

namespace App\Exports;

use PDF;

class ExportPDF
{
    protected $demandes;

    public function __construct($demandes)
    {
        $this->demandes = $demandes;
    }

    public function download()
    {
        $pdf = PDF::loadView('exports.demandes', ['demandes' => $this->demandes]);
        return $pdf->download('demandes.pdf');
    }
}
