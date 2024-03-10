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

        RapportConstat::create([
            'bt_reference' => $bonTravail->bt_reference,
            'rapport_constat_file' => $imagePath,
            'status' => $request->status,
            'commentaire' => $request->commentaire ?? "",
        ]);

        $bt_s = BonTravail::where('bt_reference', $demande->di_reference)->get();
        if($bt_s)
        {
            if($request->status == 'terminé')
            {
                $bonTravail->status = 'terminé';
                $bonTravail->save();

                $demande->status = 'terminé';
                $demande->save();
            }elseif($request->status == 'en attente')
            {
                $bonTravail->status = 'en attente';
                $bonTravail->save();
            }elseif($request->status == 'annulé')
            {
                $bonTravail->status = 'annulé';
                $bonTravail->save();

                $demande->status = 'annulé';
                $demande->save();
            }

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
