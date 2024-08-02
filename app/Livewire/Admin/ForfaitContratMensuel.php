<?php

namespace App\Livewire\Admin;

use \Carbon\Carbon;
use App\Models\ForfaitContrat;
use Livewire\Component;

class ForfaitContratMensuel extends Component
{
    public $pendingForfaits;
    public $validateForfaits;
    public $amounts = [];

    public $year_filter;
    public $month_filter;
    public $periode_text = null;

    private function between()
    {
        $startDate = Carbon::createFromDate($this->year_filter, $this->month_filter, 1)->startOfDay();
        $endDate = $startDate->copy()->endOfMonth()->endOfDay();
        return [$startDate, $endDate];
    }

    public function mount()
    {
        // Initialiser les filtres avec l'année et le mois en cours
        $this->year_filter = date('Y');
        $this->month_filter = date('n');
        $this->initPeriode();
        $this->loadData();
    }

    private function initPeriode()
    {
        $startDate = Carbon::create($this->year_filter, $this->month_filter, 1);
        $endDate = $startDate->copy()->endOfMonth();
        $this->periode_text = "Période du " . $startDate->translatedFormat('d F Y') . " au " . $endDate->translatedFormat('d F Y');
    }

    private function loadData()
    {
        $this->pendingForfaits = ForfaitContrat::where('validated', false)
            ->whereBetween('start_date', $this->between())
            ->get();

        $this->validateForfaits = ForfaitContrat::where('validated', true)
            ->whereBetween('start_date', $this->between())
            ->get();

        // Initialiser les montants pour chaque forfait
        foreach ($this->pendingForfaits as $forfait) {
            $this->amounts[$forfait->id] = $forfait->amount;
        }
    }

    public function updatedYearFilter()
    {
        $this->initPeriode();
        $this->loadData();
    }

    public function updatedMonthFilter()
    {
        $this->initPeriode();
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.admin.forfait-contrat-mensuel');
    }

    public function saveForfait($forfaitId)
    {
        // Trouver le forfait par son ID
        $forfait = ForfaitContrat::find($forfaitId);

        // Valider l'input
        $this->validate([ 
            'amounts.'.$forfaitId => 'required|numeric|min:0',
        ]);

        // Mettre à jour le montant
        $forfait->update([
            'amount' => $this->amounts[$forfaitId],
            'validated' => true,
        ]);

        // Recharger les données après mise à jour
        $this->loadData();

        // Eventuellement, envoyer un message de succès ou de confirmation
        session()->flash('success', 'Forfait mis à jour avec succès.');
    }
}
