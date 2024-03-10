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
    
    public function bon_travails()
    {
        return $this->hasMany(BonTravail::class, 'di_reference', 'di_reference');
    }

    public function demandeur()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        // Vérifiez d'abord si la demande a un fichier associé
        if ($this->demande_file) {
            // Générez l'URL complète du fichier en utilisant Storage::url()
            try {
                return Storage::url($this->demande_file);
            } catch (\Throwable $th) {
                return null;
            }
        }
        // Retournez null si aucun fichier n'est associé à la demande
        return null;
    }

    public function statutColor()
    {
        $statut = $this->status;
        if($statut == "injection de piece")
        {
            return "warning";
        }

        if($statut == "en cours")
        {
            return "primary";
        }

        if($statut == "annulé")
        {
            return "danger";
        }
        if($statut == "rejettée")
        {
            return "danger";
        }
        if($statut == "terminé")
        {
            return "success";
        }
        return "secondary";
    }

    public function statutIcon($taille="2xl")
    {
        $statut = $this->status;
        if($statut == "injection de piece")
        {
            return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
        }

        if($statut == 'en cours')
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
