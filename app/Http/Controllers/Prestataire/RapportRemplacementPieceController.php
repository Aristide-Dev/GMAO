<?php

namespace App\Http\Controllers\Prestataire;
use App\Http\Controllers\Controller;

use App\Models\RapportRemplacementPiece;
use App\Models\BonTravail;
use App\Models\DemandeIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Enums\StatusEnum;

class RapportRemplacementPieceController extends Controller
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
        $request->validateWithBag('create_rapport_remplacement_piece', [
            'rapport_remplacement_piece_file' => 'required|image|extensions:jpeg,jpg,png|max:5000',
            'commentaire' => 'nullable|string|max:250',
        ]);


        $image = $request->file('rapport_remplacement_piece_file');
        $imagePath = $this->saveImageWithUniqueName($image, $demande->di_reference, 'rapport_remplacement_piece');
        // Récupérer le rapport d'intervention associé au bon de travail
        $rapportIntervention = $bonTravail->rapportIntervention;

        RapportRemplacementPiece::create([
            'ri_reference' => "$rapportIntervention->ri_reference",
            'rapport_remplacement_piece_file' => $imagePath,
            'commentaire' => $request->commentaire ?? "",
        ]);
        
        $rapportIntervention->status = StatusEnum::INJECTION_PIECE;
        $rapportIntervention->save();

        $bonTravail->status = StatusEnum::INJECTION_PIECE;
        $bonTravail->save();

        $demande->status = StatusEnum::INJECTION_PIECE;
        $demande->save();

        return redirect()->back()->with('success', 'Nouveau Rapport de remplacement de piece créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RapportRemplacementPiece $rapportRemplacementPiece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RapportRemplacementPiece $rapportRemplacementPiece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RapportRemplacementPiece $rapportRemplacementPiece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RapportRemplacementPiece $rapportRemplacementPiece)
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
