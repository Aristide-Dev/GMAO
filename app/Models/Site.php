<?php

namespace App\Models;

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
}
