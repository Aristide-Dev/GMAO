<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasOne;

class BonTravail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bt_reference',
        'di_reference',
        'requete',
        'zone_name',
        'zone_priorite',
        'zone_delais',
        'equipement_id',
        'prestataire_id',
        'user_id',
        'status',
        'date_echeance',
    ];

    public function demande() :BelongsTo
    {
        return $this->belongsTo(DemandeIntervention::class, 'di_reference', 'di_reference');
    }

    public function rapportsIntervention() :hasOne
    {
        // return RapportIntervention::where('bt_reference', $this->bt_reference)->get();
        return $this->hasOne(RapportIntervention::class, 'bt_reference', 'bt_reference');
    }

    public function equipement() :BelongsTo
    {
        return $this->belongsTo(Equipement::class);
    }

    public function prestataire() :BelongsTo
    {
        return $this->BelongsTo(Prestataire::class);
    }

    public function prioriteText()
    {
        $priorite = $this->zone_priorite;

        if($priorite == 1)
        {
            return "Faible";
        }

        if($priorite == 2)
        {
            return "Moyen";
        }

        if($priorite == 3)
        {
            return "Prioritaire";
        }
        return "inconu";
    }


    public function prioriteColor()
    {
        $priorite = $this->zone_priorite;

        if($priorite == 1)
        {
            return "success";
        }

        if($priorite == 2)
        {
            return "warning";
        }

        if($priorite == 3)
        {
            return "danger";
        }
        return "secondary";
    }


    public function statutIcon($taille="2xl")
    {
        $statut = $this->status;
        if($statut == "injection de piece")
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
        }

        if($statut == 'en cours')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #74C0FC;"></i>';
        }

        if($statut == 'annulé')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FF0000;"></i>';
        }
        if($statut == 'rejettée')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FF0000;"></i>';
        }
        if($statut == 'terminé')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #63E6BE;"></i>';
        }
        return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
    }

}
