<?php

namespace App\Models;

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


}
