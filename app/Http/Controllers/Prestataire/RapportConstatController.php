<?php

namespace App\Http\Controllers\Prestataire;

use App\Enums\StatusEnum;
use Illuminate\Http\File;
use App\Models\BonTravail;
use Illuminate\Http\Request;
use App\Models\RapportConstat;
use App\Models\DemandeIntervention;
use App\Rules\DateInterventionRule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Events\FirstRapportConstatEvent;
use App\Events\PrestataireRapportsEvent;

class RapportConstatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DemandeIntervention $demande, BonTravail $bonTravail)
    {
        $request->validateWithBag('create_rapport_constat', [
            'rapport_constat_file' => 'required|image|extensions:jpeg,jpg,png|max:5000',
            'status' => 'required|string|in:Clôturé,en cours',
            'date_intervention' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request, $demande) {
                    $dateTimeIntervention = $value . ' ' . $request->heure_intervention;
                    $rule = new DateInterventionRule($demande->created_at);
                    if (!$rule->passes($attribute, $dateTimeIntervention)) {
                        $fail($rule->message());
                    }
                }
            ],
            'heure_intervention' => [
                'required',
                'regex:/^(0[8-9]|1[0-7]):[0-5][0-9]$/',
                function ($attribute, $value, $fail) use ($request) {
                    $heure = intval(substr($value, 0, 2));
                    if ($heure < 8 || $heure > 17) {
                        $fail('L\'heure d\'intervention doit être comprise entre 08:00 et 17:59.');
                    }
                },
            ],
            'commentaire' => 'nullable|string|max:250',
        ]);

        $image = $request->file('rapport_constat_file');
        $imagePath = $this->saveImageWithUniqueName($image, $demande->di_reference, 'rapport_constat');
        // Récupérer le rapport d'intervention associé au bon de travail
        $rapportIntervention = $bonTravail->rapportIntervention;

        $rapportConstat = RapportConstat::create([
            'ri_reference' => $rapportIntervention->ri_reference,
            'rapport_constat_file' => $imagePath,
            'commentaire' => $request->commentaire ?? "",
        ]);

        switch ($request->status) {
            case 'Clôturé':
                $request->status = StatusEnum::CLOTURE;
                break;
            case 'en cours':
                $request->status = StatusEnum::EN_COURS;
                break;
            default:
                $request->status = StatusEnum::EN_COURS;
                break;
        }

        if ($request->status == StatusEnum::CLOTURE) {
            $bonTravail->status = StatusEnum::CLOTURE;

            if ($rapportIntervention) {
                $rapportIntervention->status = StatusEnum::EN_COURS;
                $rapportIntervention->date_intervention = $request->date_intervention . ' ' . $request->heure_intervention;
            }
        }

        if ($request->status == StatusEnum::EN_COURS) {
            $bonTravail->status = $request->status;

            if ($rapportIntervention) {
                $rapportIntervention->status = $request->status;
                $rapportIntervention->date_intervention = $request->date_intervention . ' ' . $request->heure_intervention;
            }
        }

        if ($request->status == StatusEnum::AFFECTER_TRAVAUX) {
            $bonTravail->status = $request->status;

            if ($rapportIntervention) {
                $rapportIntervention->status = $request->status;
                $rapportIntervention->date_intervention = $request->date_intervention . ' ' . $request->heure_intervention;
            }
        }

        $bonTravail->save();
        $rapportIntervention->save();

        // event(new FirstRapportConstatEvent($rapportIntervention, $bonTravail->prestataire));
        event(new PrestataireRapportsEvent($bonTravail->prestataire, $rapportIntervention));

        return redirect()->back()->with('success', 'Nouveau Rapport généré avec succès!');
    }



    /**
     * Display the specified resource.
     */
    public function show(RapportConstat $rapportConstat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RapportConstat $rapportConstat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RapportConstat $rapportConstat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RapportConstat $rapportConstat)
    {
        //
    }


    /**
     * Méthode saveImageWithUniqueName
     *
     * @param string $image [Chemin vers l'image]
     * @param string $imageName [Nom de l'image]
     * @param string $destinationFolder [Répertoire de destination dans le stockage Laravel]
     *
     * @return String $imageName
     */
    private function saveImageWithUniqueName($image, $imageName, $destinationFolder)
    {
        // Récupérer l'extension de l'image
        // $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $imageExtension = "jpg";

        // Générer un nom de fichier unique
        $uniqueFileName = $imageName . '_' . time();


        // Répertoire de stockage dans le stockage Laravel
        $storageDirectory = 'public/' . $destinationFolder;

        // Utiliser Storage::putFileAs pour compresser et stocker l'image avec un nom spécifique
        $fuldirectory = Storage::putFileAs($storageDirectory, new File($image), $uniqueFileName . '.' . $imageExtension);

        // Retourner le nom du fichier généré
        return $fuldirectory;
    }
}
