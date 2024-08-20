<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'telephone',
        'adresse',
        'commentaire',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'telephone_verified_at' => 'datetime',
    ];

    /**
     * Get the admin user for this prestataire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return User::where('id', $this->prestataire_admin_id)->first();
    }

    /**
     * Get the agents for this prestataire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(User::class, 'prestataire_own')->where('id', '<>', $this->prestataire_admin_id);
    }

    /**
     * Get the users for this prestataire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'prestataire_own');
    }

    /**
     * Get the bon_travails for this prestataire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bon_travails()
    {
        return $this->hasMany(BonTravail::class);
    }

    /**
     * Get all demandes attribuees to this prestataire via bon_travails.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function demandesAttribuees()
    {
        return $this->hasManyThrough(
            Demande::class,
            BonTravail::class,
            'prestataire_id', // Foreign key on bon_travails table
            'di_reference', // Foreign key on demandes table
            'id', // Local key on prestataires table
            'di_reference' // Local key on bon_travails table
        )->distinct();
    }

    /**
     * Get all rapports_interventions for this prestataire via bon_travails.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function rapport_intervention()
    {
        return $this->hasManyThrough(
            RapportIntervention::class,
            BonTravail::class,
            'prestataire_id', // Foreign key on bon_travails table
            'di_reference', // Foreign key on rapports_interventions table
            'id', // Local key on prestataires table
            'di_reference' // Local key on bon_travails table
        )->distinct();
    }

    /**
     * Calculate the performance index.
     *
     * @return float
     */
    public function indicePerformancePeriod($startDate = null, $endDate = null)
    {
        // Si aucune date de début ou de fin n'est fournie, on utilise la période complète.
        // $startDate = $startDate ?? now()->startOfYear();
        // $endDate = $endDate ?? now()->endOfYear();
    
        $query = $this->bon_travails()
                            ->whereNotIn('status', [StatusEnum::EN_ATTENTE, StatusEnum::EN_COURS, StatusEnum::PAS_TRAITE]);
                            
        if($startDate && $endDate)
        { 
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }                    

        $bonsTravail = $query->get();
    
        $totalRapports = 0;
        $kpiZeroCount = 0;
        $kpiOneCount = 0;
    
        foreach ($bonsTravail as $bt) {
            $rapport = $bt->rapportIntervention()->first();
            if ($rapport) {
                $totalRapports++;
                if ($rapport->kpi == 0) {
                    $kpiZeroCount++;
                } elseif ($rapport->kpi == 1) {
                    $kpiOneCount++;
                }
            }
        }
    
        if ($totalRapports == 0) {
            return 0; // Aucun rapport d'intervention
        }
    
        $performanceIndex = ($kpiOneCount * 100) / $totalRapports;
    
        return round($performanceIndex, 2); // Arrondir à deux décimales
    }

    /**
     * Calculate the performance index.
     *
     * @return float
     */
    public function getIndicePerformanceGeneralAttribute()
    {
        $bonsTravail = $this->bon_travails()
                            ->whereNotIn('status', [StatusEnum::EN_ATTENTE, StatusEnum::EN_COURS, StatusEnum::PAS_TRAITE])
                            ->get();
                            
        $totalRapports = 0;
        $OtheTtotalRapports = 0;
        $kpiZeroCount = 0;
        $kpiOneCount = 0;

        foreach ($bonsTravail as $bt) {
            $rapport = $bt->rapportIntervention()->first();
            if ($rapport) {
                $totalRapports++;
                if ($rapport->kpi == 0) {
                    $kpiZeroCount++;
                } elseif ($rapport->kpi == 1) {
                    $kpiOneCount++;
                }
            }
        }
        $OtheTtotalRapports = $kpiOneCount - $kpiZeroCount;

        if ($totalRapports == 0 || $OtheTtotalRapports == 0) {
            return 0; // Aucun rapport d'intervention
        }

        $performanceIndex = ($kpiOneCount * 100) / $OtheTtotalRapports;
        // $performanceIndex = ($kpiOneCount * 100) / $totalRapports;
        // var_dump("performanceIndex: ",$performanceIndex);


        return round($performanceIndex, 2); // Arrondir à deux décimales
    }

    /**
     * Calculate the performance index.
     *
     * @return float
     */
    public function getIndicePerformanceGeneralHorsDelaisAttribute()
    {
        $bonsTravail = $this->bon_travails()
                            ->whereNotIn('status', [StatusEnum::EN_ATTENTE, StatusEnum::EN_COURS, StatusEnum::PAS_TRAITE])
                            ->get();
                            
        $kpiZeroCount = 0;

        foreach ($bonsTravail as $bt) {
            $rapport = $bt->rapportIntervention()->first();
            if ($rapport) {
                if ($rapport->kpi == 0) {
                    $kpiZeroCount++;
                }
            }
        }

        return round($kpiZeroCount, 2); // Arrondir à deux décimales
    }

    /**
     * Calculate the performance index.
     *
     * @return float
     */
    public function getIndicePerformanceGeneralDansLesDelaisAttribute()
    {
        $bonsTravail = $this->bon_travails()
                            ->whereNotIn('status', [StatusEnum::EN_ATTENTE, StatusEnum::EN_COURS, StatusEnum::PAS_TRAITE])
                            ->get();
                            
        $kpiOneCount = 0;

        foreach ($bonsTravail as $bt) {
            $rapport = $bt->rapportIntervention()->first();
            if ($rapport) {
                if ($rapport->kpi == 1) {
                    $kpiOneCount++;
                }
            }
        }

        return round($kpiOneCount, 2); // Arrondir à deux décimales
    }

    public function indicePerformanceColor(int $value): array
    {
        $indices_performance = [
            'statut' => 'N/A',
            'color' => 'light',
        ];

        if($value < 0 && $value > 30 || $value < 0)
        {
            $indices_performance = [
                'statut' => 'Mauvais',
                'color' => 'danger',
            ];
        }

        if($value >= 30 && $value < 50)
        {
            $indices_performance = [
                'statut' => 'Moyen',
                'color' => 'warning',
            ];
        }

        if($value >= 50 && $value < 80)
        {
            $indices_performance = [
                'statut' => 'Bon',
                'color' => 'primary',
            ];
        }

        if($value >= 80)
        {
            $indices_performance = [
                'statut' => 'Excellent',
                'color' => 'success',
            ];
        }

        return $indices_performance;
    }
}
