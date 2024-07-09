<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registre',
        'actif',
    ];

    public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }

    public function demande_interventions()
    {
        return $this->hasMany(DemandeIntervention::class);
    }

    public function equipementsByCategory($category)
    {
        return $this->hasMany(Equipement::class)->where('categorie', $category)->get();
    }

    public function totalForfaitContratByCategory($category)
    {
        return $this->equipements()
                    ->where('categorie', $category)
                    ->sum('forfait_contrat');
    }

     /**
     * Calculate the total sum of forfait contrat for all equipment in this site.
     *
     * @return float
     */
    public function calculateTotalForfaitContrat()
    {
        return $this->equipements()->sum('forfait_contrat');
    }

    public function showForfaitContratForPeriod($year, $month)
    {
        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
        $totalCost = 0;
        $ValidateforfaitsContrat = ForfaitContrat::where('site_id', $this->id)->between($startDate, $endDate)->limit(1)->get();
        if($ValidateforfaitsContrat && $ValidateforfaitsContrat->validated == true)
        {
            return $ValidateforfaitsContrat->amount;
        }
        return $this->calculateTotalForfaitContrat;
    }

    public function calculateMonthlyCosts($year, $month)
    {
        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
        $totalCost = 0;
        
        foreach ($this->demande_interventions as $demande) {
            if ($demande->created_at->between($startDate, $endDate)) {
                foreach ($demande->bon_travails as $bonTravail) {
                    $rapportIntervention = $bonTravail->rapportIntervention;

                    if ($rapportIntervention->injection_pieces) {
                        foreach ($rapportIntervention->injection_pieces as $injectionPiece) {
                        // dd($injectionPiece);
                            $totalCost += $injectionPiece->take_in_stock ? ($injectionPiece->stock_price*$injectionPiece->quantite):($injectionPiece->fournisseur_price*$injectionPiece->quantite);
                        }
                    }
                }
            }
        }
        return $totalCost;
    }
}
