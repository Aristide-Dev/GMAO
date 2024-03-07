<?php

namespace App\Http\Controllers\Prestataire;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\DemandeIntervention;
use App\Http\Controllers\Controller;
use App\Models\Prestataire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DemandeInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = Auth::user();
        $prestataire = $agent->prestataire;
        $bon_travails = $prestataire->bon_travails;
        return view('prestataires.demandes.index', compact('bon_travails'));
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
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(DemandeIntervention $demande)
    {
        return view('prestataires.demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeIntervention $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DemandeIntervention $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeIntervention $demande)
    {
        //
    }

    private function generateDIReference()
    {
        // Récupérer le dernier enregistrement
        $lastDemandeIntervention = DemandeIntervention::latest()->first();
        $nextId = 0;

        // Si aucun enregistrement n'existe, commencez à partir de 1
        if (!$lastDemandeIntervention) {
            $nextId = 1;
        } else {
            // Extraire le numéro d'identification de la référence
            $lastReference = $lastDemandeIntervention->di_reference;
            $lastId = (int)substr($lastReference, 2); // Extrait les chiffres après "DI"

            // Incrémenter l'ID pour le prochain enregistrement
            $nextId = $lastId + 1;
        }

        // Formater le numéro d'identification pour qu'il ait toujours 7 chiffres
        $formattedId = str_pad($nextId, 7, '0', STR_PAD_LEFT);

        // Retourner la référence complète
        return 'DI' . $formattedId;
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

        // dd($uniqueFileName. '.' . $imageExtension);

        // Répertoire de stockage dans le stockage Laravel
        $storageDirectory = 'public/' . $destinationFolder;

        // Utiliser Storage::putFileAs pour compresser et stocker l'image avec un nom spécifique
        $fuldirectory = Storage::putFileAs($storageDirectory, new File($image), $uniqueFileName . '.' . $imageExtension);

        // Retourner le nom du fichier généré
        return $fuldirectory;
    }
}
