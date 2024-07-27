<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class RapportRemplacementPiece extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ri_reference',
        'rapport_remplacement_piece_file',
        'commentaire',
    ];



    public function rapport_intervention()
    {
        return $this->belongsTo(RapportIntervention::class, 'ri_reference', 'ri_reference');
    }



    public function document()
    {
        // Vérifiez d'abord si la demande a un fichier associé
        if ($this->rapport_remplacement_piece_file) {
            // Générez l'URL complète du fichier en utilisant Storage::url()
            try {
                return Storage::url($this->rapport_remplacement_piece_file);
            } catch (\Throwable $th) {
                return null;
            }
        }
        // Retournez null si aucun fichier n'est associé à la demande
        return null;
    }
}
