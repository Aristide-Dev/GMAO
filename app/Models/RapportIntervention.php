<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportIntervention extends Model
{
    use HasFactory;

    // protected $table = "rapport_interventions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ri_reference',
        'bt_reference',
        'status',
        'temps_prise_en_charge',
        'kpi',
        'numero_devis',
        'bon_commande',
    ];


    public function bon_travail()
    {
        return $this->belongsTo(BonTravail::class, 'bt_reference', 'bt_reference');
    }

    public function rapport_constat()
    {
        return $this->hasOne(RapportConstat::class, 'ri_reference', 'ri_reference');
    }

    public function rapport_remplacement_piece()
    {
        return $this->hasOne(RapportRemplacementPiece::class, 'ri_reference', 'ri_reference');
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
