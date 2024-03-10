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


}
