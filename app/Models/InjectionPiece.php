<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InjectionPiece extends Model
{
    use HasFactory;

    protected $table ="injection_pieces";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'piece_id',
        'ri_reference',
        'take_in_stock',
        'quantite',
        'stock_price',
        'take_in_fournisseur',
        'fournisseur_name',
        'fournisseur_price',
        'injection_file',
    ];

    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

    public function rapport_intervention()
    {
        return $this->belongsTo(RapportIntervention::class, 'ri_reference', 'ri_reference');
    }


    public function document()
    {
        // Vérifiez d'abord si la demande a un fichier associé
        if ($this->injection_file) {
            // Générez l'URL complète du fichier en utilisant Storage::url()
            try {
                return Storage::url($this->injection_file);
            } catch (\Throwable $th) {
                return null;
            }
        }
        // Retournez null si aucun fichier n'est associé à la demande
        return null;
    }
}
