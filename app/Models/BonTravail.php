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
        'zone_id',
        'equipement_id',
        'prestataire_id',
        'user_id',
        'status',
    ];
    
    public function demande()
    {
        return $this->belongsTo(DemandeIntervention::class);
    }
}
