<?php

namespace App\Http\Controllers\Prestataire;
use App\Http\Controllers\Controller;
use App\Models\BonTravail;
use App\Models\RapportConstat;
use App\Models\DemandeIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
    public function store(Request $request,DemandeIntervention $demande, BonTravail $bonTravail)
    {
        $request->validateWithBag('create_rapport_constat', [
            'rapport_constat_file' => 'required|image|extensions:jpeg,jpg,png|max:2000',
            'status' => 'required|string|in:terminé,en attente,annulé',
            'commentaire' => 'nullable|string|max:250',
        ]);

        $image = $request->file('rapport_constat_file');
        $imagePath = $this->saveImageWithUniqueName($image, $demande->di_reference, 'rapport_constat');
        // Récupérer le rapport d'intervention associé au bon de travail
        $rapportIntervention = $bonTravail->rapportsIntervention;

        RapportConstat::create([
            'ri_reference' => "$rapportIntervention->ri_reference",
            'rapport_constat_file' => $imagePath,
            'commentaire' => $request->commentaire ?? "",
        ]);

        if($request->status == 'terminé')
        {
            $demande->status = 'terminé';
            $demande->save();
        }elseif($request->status == 'annulé')
        {
            $demande->status = 'annulé';
            $demande->save();
        }
        
        $bonTravail->status = $request->status;
        $bonTravail->save();
        

        // Modifier le statut du rapport d'intervention
        if ($rapportIntervention) {
            $rapportIntervention->status = $request->status;
            $rapportIntervention->save();
        }
        return redirect()->back()->with('success', 'Nouveau Rapport créée avec succès!');
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
