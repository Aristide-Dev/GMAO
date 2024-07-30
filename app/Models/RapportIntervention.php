<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Models\BonTravail;
use App\Models\InjectionPiece;
use App\Models\RapportConstat;
use Illuminate\Database\Eloquent\Model;
use App\Models\RapportRemplacementPiece;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'date_intervention',
        'commentaire',
    ];


    public function bon_travail()
    {
        return $this->belongsTo(BonTravail::class, 'bt_reference', 'bt_reference');
    }

    public function rapport_constat()
    {
        return $this->hasOne(RapportConstat::class, 'ri_reference', 'ri_reference');
    }

    public function rapport_constats()
    {
        return $this->hasMany(RapportConstat::class, 'ri_reference', 'ri_reference');
    }

    public function rapport_remplacement_piece()
    {
        return $this->hasMany(RapportRemplacementPiece::class, 'ri_reference', 'ri_reference');
    }

    public function injection_piece()
    {
        return $this->hasOne(InjectionPiece::class, 'ri_reference', 'ri_reference');
    }

    public function injection_pieces()
    {
        return $this->hasMany(InjectionPiece::class, 'ri_reference', 'ri_reference');
    }
    
    public function injection_pieces_amounts()
    {
        $total = 0;
        foreach ($this->injection_pieces as $injection_piece) {
            $total += $injection_piece->totalAmount();
        }
        return $total;
    }
    




    public function statutIcon($taille = "2xl")
    {
        $color = StatusEnum::getColor($this->status);
        return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: '.$color.';"></i>';
    }

    public function statutColor()
    {
        return StatusEnum::getColor($this->status);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_intervention' => 'datetime',
    ];
}
