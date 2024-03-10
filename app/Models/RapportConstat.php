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
        'commentaire',
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
    

    public function statutIcon($taille="2xl")
    {
        $statut = $this->status;
        if($statut == "injection de piece")
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
        }

        if($statut == 'en attente')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #74C0FC;"></i>';
        }

        if($statut == 'annulé')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FF0000;"></i>';
        }
        if($statut == 'rejettée')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FF0000;"></i>';
        }
        if($statut == 'terminé')
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #63E6BE;"></i>';
        }
        return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
    }
}
