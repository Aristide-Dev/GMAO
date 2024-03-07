<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function demande()
    {
        return $this->belongsTo(DemandeIntervention::class, 'di_reference', 'di_reference');
    }

    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
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

}
