<?php

namespace App\Models;

use App\Enums\EquipementEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $registre
 * @property bool $actif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|Equipement[] $equipements
 * @property \Illuminate\Database\Eloquent\Collection|DemandeIntervention[] $demande_interventions
 */
class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registre',
        'actif',
    ];

    /**
     * Get the equipment associated with the site.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }

    /**
     * Get the intervention requests associated with the site.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function demande_interventions()
    {
        return $this->hasMany(DemandeIntervention::class);
    }

    /**
     * Get the equipment by category.
     *
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function equipementsByCategory($category)
    {
        return $this->equipements()->where('categorie', $category)->get();
    }

    /**
     * Calculate the total forfait contrat by category.
     *
     * @param string $category
     * @return float
     */
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

    /**
     * Show the forfait contrat for a specific period.
     *
     * @param int $year
     * @param int $month
     * @return float
     */
    public function showForfaitContratForPeriod($year=null, $month=null)
    {
        // dd($year,$month);

        $startDate = Carbon::createFromDate($year ?? date('Y'), $month??date('n'), 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year ?? date('Y'), $month??date('n'), 1)->endOfMonth();

        $forfaitContrat = ForfaitContrat::where('site_id', $this->id)
                                        ->whereBetween('start_date',[$startDate,$endDate])
                                        ->whereBetween('end_date',[$startDate,$endDate])
                                        // ->where('end_date', $endDate)
                                        ->first();
        // dd($forfaitContrat);


        if ($forfaitContrat) {
            return $forfaitContrat->validated == true ? $forfaitContrat->amount : 0;
        }

        return 0;
    }

    /**
     * Calculate the total maintenance cost for a specific period.
     *
     * @param int $year
     * @param int $month
     * @return float
     */
    public function calculateMonthlyCosts($year, $month)
    {
        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
        $totalCost = 0;

        foreach ($this->demande_interventions as $demande) {
            if ($demande->created_at->between($startDate, $endDate)) {
                foreach ($demande->bon_travails as $bonTravail) {
                    $rapportIntervention = $bonTravail->rapportIntervention;

                    if ($rapportIntervention && $rapportIntervention->injection_pieces) {
                        foreach ($rapportIntervention->injection_pieces as $injectionPiece) {
                            $totalCost += $injectionPiece->take_in_stock 
                                ? ($injectionPiece->stock_price * $injectionPiece->quantite)
                                : ($injectionPiece->fournisseur_price * $injectionPiece->quantite);
                        }
                    }
                }
            }
        }

        return $totalCost;
    }

    /**
     * Calculate the total maintenance cost for a specific period.
     *
     * @param string $startDate
     * @param string $endDate
     * @return float
     */
    public function calculateMonthlyMaintenanceCost($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();
        $totalCost = 0;
        

        foreach ($this->demande_interventions as $demande) {
            if ($demande->created_at->between($startDate, $endDate)) {
                foreach ($demande->bon_travails as $bonTravail) {
                    $rapportIntervention = $bonTravail->rapportIntervention;

                    if ($rapportIntervention && $rapportIntervention->injection_pieces) 
                    {
                        foreach ($rapportIntervention->injection_pieces as $injectionPiece) {
                            if($injectionPiece->created_at->between($startDate, $endDate))
                            {
                                $totalCost += $injectionPiece->take_in_stock 
                                    ? ($injectionPiece->stock_price * $injectionPiece->quantite)
                                    : ($injectionPiece->fournisseur_price * $injectionPiece->quantite);
                            }
                        }
                    }
                }
            }
        }


        return $totalCost;
    }

    public function categorieEquipementColor($categorie)
    {
        return EquipementEnum::getColor($categorie);
    }

    public function categorieEquipementText($categorie)
    {
        return EquipementEnum::getText($categorie);
    }
}
