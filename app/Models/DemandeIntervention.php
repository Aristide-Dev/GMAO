<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    


    public function statutIcon($taille = "2xl")
    {
        $color = StatusEnum::getColor($this->status);
        return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: '.$color.';"></i>';
    }

    public function statutColor()
    {
        return StatusEnum::getColor($this->status);
    }

    public function canDeleteAttribute()
    {
        
    }

    public function isHistoryCable()
    {
        if(count($this->bon_travails) > 1)
        {
            return true;
        }
        return false;
    }

    /**
     * Obtenir tous les anciens bons de travail sauf le plus récent.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function oldBonTravails()
    {
        // Get all associated BonTravail records ordered by creation date descending
        $bonTravails = BonTravail::where('di_reference',$this->di_reference)->orderBy('created_at', 'desc')->get();

        // Exclude the latest BonTravail record
        if ($bonTravails->count() > 1) {
            return $bonTravails->slice(1);
        }

        // If there's only one or none, return an empty collection
        return collect([]);
    }

    // public function statutColor()
    // {
    //     $statut = $this->status;
    //     if($statut == "injection de piece")
    //     {
    //         return "warning";
    //     }

    //     if($statut == "en cours")
    //     {
    //         return "primary";
    //     }

    //     if($statut == "annulé")
    //     {
    //         return "danger";
    //     }
    //     if($statut == "rejettée")
    //     {
    //         return "danger";
    //     }
    //     if($statut == "Clôturé")
    //     {
    //         return "success";
    //     }
    //     return "secondary";
    // }

    /**
     * Description des status
     * 1- EN ATTENTE
     *      Lorsque la demande vient d'etre crée
     * 2- ENCOURS
     *      Si le dernier bon de travail associé existe et que le statut du BT soit different de 'Clôturé', 'rejetté', 'annulé'
     * 3- ANNULEE, CLOTUREE
     *      Si l'admin l'a definis sur la demande
     *      Si le statut du BT est egale à l'un des deux
     */


    /**
     * BON DE TRAVAIL
     * 1- EN ATTENTE
     *      Si le rapport de constat est en attente
     * 2- EN COURS
     *      Si le prestataire n'a pas emis de rapport
     *      Si l'orsqu'une piece est injectée par l'admin
     * 3- ANNULEE, CLOTUREE
     *      Si l'admin l'a definis sur la demande
     *      Si le statut du rapport de constat est egale à l'un des deux
     * 4- REJETE
     *      Si le prestataire l'a rejeté du
     * 5- INJECTION PIECE
     *      Dès que le rapport d'injection de piece est crée
     *
     */


    /**
     * RAPPORTS D'INTERVENTION
     * 1- EN ATTENTE
     *      Si le rapport de constat est en attente
     * 2- EN COURS
     *      Si le prestataire n'a pas emis de rapport
     *      Si l'orsqu'une piece est injectée par l'admin
     * 3- ANNULEE, CLOTUREE
     *      Si l'admin l'a definis sur la demande
     *      Si le statut du rapport de constat est egale à l'un des deux
     * 4- REJETE
     *      Si le prestataire l'a rejeté du
     * 5- INJECTION PIECE
     *      Dès que le rapport d'injection de piece est crée
     *
     */
    // public function statutIcon($taille="2xl")
    // {
    //     $statut = $this->status;
    //     if($statut == "injection de piece")
    //     {
    //         return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
    //     }

    //     if($statut == 'en cours')
    //     {
    //         return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #74C0FC;"></i>';
    //     }

    //     if($statut == 'annulé')
    //     {
    //         return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FF0000;"></i>';
    //     }
    //     if($statut == 'rejettée')
    //     {
    //         return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FF0000;"></i>';
    //     }
    //     if($statut == 'Clôturé')
    //     {
    //         return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #63E6BE;"></i>';
    //     }
    //     return '<i class="fa-solid fa-circle-check fa-'.$taille.'" style="color: #FFD43B;"></i>';
    // }
}
