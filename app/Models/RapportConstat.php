<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class RapportConstat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bt_reference',
        'rapport_constat_file',
        'status',
    ];



    public function bon_travail()
    {
        return $this->belongsTo(BonTravail::class, 'bt_reference', 'bt_reference');
    }

    public function document()
    {
        // Vérifiez d'abord si la demande a un fichier associé
        if ($this->rapport_constat_file) {
            // Générez l'URL complète du fichier en utilisant Storage::url()
            try {
                return Storage::url($this->rapport_constat_file);
            } catch (\Throwable $th) {
                return null;
            }
        }
        // Retournez null si aucun fichier n'est associé à la demande
        return null;
    }
}
