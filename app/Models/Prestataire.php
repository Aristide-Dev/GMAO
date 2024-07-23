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

    public function admin()
    {
        return User::where('id', $this->prestataire_admin_id)->first();
    }

    public function agents()
    {
        return User::where('prestataire_own', $this->id)
                    ->where('id', '<>', $this->prestataire_admin_id)
                    ->get();
    }

    public function users()
    {
        return $this->hasMany(User::class,'prestataire_own');
    }

    public function bon_travails()
    {
        return $this->hasMany(BonTravail::class);
    }

    /**
     * Récupère toutes les demandes attribuées à ce prestataire via les bons de travail.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function demandesAttribuees()
    {
        return $this->hasManyThrough(
            Demande::class, // Modèle de la demande
            BonTravail::class, // Modèle du bon de travail
            'prestataire_id', // Clé étrangère du prestataire dans le bon de travail
            'di_reference', // Clé étrangère du bon de travail dans la demande
            'id', // Clé primaire du prestataire
            'di_reference' // Clé primaire du bon de travail
        )->distinct();
    }

    /**
     * Récupère toutes les demandes attribuées à ce prestataire via les bons de travail.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function rapport_intervention()
    {
        return $this->hasManyThrough(
            BonTravail::class, // Modèle de bon travail
            RapportIntervention::class, // Modèle du rapport d'intervention
            'prestataire_id', // Clé étrangère du prestataire dans le rapport d'intervention
            'di_reference', // Clé étrangère du bon de travail dans la demande
            'id', // Clé primaire du prestataire
            'di_reference' // Clé primaire du bon de travail
        )->distinct();
    }

    public function getIndicePerformanceGeneralAttribute()
    {
        $bonsTravail = $this->bon_travails;
        $bonsTravail = BonTravail::where('prestataire_id',$this->id)
                                ->where('status','<>',StatusEnum::EN_ATTENTE)
                                ->where('status','<>',StatusEnum::EN_COURS)
                                ->where('status','<>',StatusEnum::PAS_TRAITE)
                                ->get();
        $totalRapports = 0;
        $kpiZeroCount = 0;
        $kpiOneCount = 0;
        // dd($bonsTravail);

        if($bonsTravail)
        {
            foreach ($bonsTravail as $bt) {
                $rapport = $bt->rapportIntervention;
                if($rapport)
                {
                    $totalRapports += 1;
                    
                    if ($rapport->kpi == 0) {
                        $kpiZeroCount++;
                    } elseif ($rapport->kpi == 1) {
                        $kpiOneCount++;
                    }
                }
                // $totalRapports += $rapports->count();
            }
        }
        

        if ($totalRapports == 0) {
            return 0; // Aucun rapport d'intervention
        }

        // Calculer l'indice de performance
        // $performanceIndex = ($kpiOneCount - $kpiZeroCount) / $totalRapports;
        $performanceIndex = ($kpiOneCount *100) / $totalRapports;
        // dd($kpiOneCount,$kpiZeroCount,$totalRapports);

        return round($performanceIndex, 2); // Arrondir à deux décimales
    }


}
