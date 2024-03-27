<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Enums\ZonePrioriteEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return ZonePrioriteEnum::getText($this->zone_priorite);
    }


    public function prioriteColor()
    {
        return ZonePrioriteEnum::getColor($this->zone_priorite);
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
        // 'status' => StatusEnum::class,
        'telephone_verified_at' => 'datetime',
    ];

}
