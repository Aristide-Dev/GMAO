<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'categorie',
        'numero_serie',
        'forfait_contrat',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
