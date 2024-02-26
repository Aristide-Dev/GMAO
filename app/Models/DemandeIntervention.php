<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeIntervention extends Model
{
    use HasFactory;

    protected $table = "demande_interventions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'di_reference',
        'site_id',
        'demandeur_id',
        'demande_file',
        'status',
    ];


    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function demandeur()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return Storage::url($this->demande_file);
    }
}
