<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\DemandeIntervention;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Enums\StatusEnum;

class CommercialController extends Controller
{
    public function index()
    {
        return view('commercial.index');
    }

    public function demandes()
    {
        $sites = Site::all();
        return view('commercial.demandes.index', compact('sites'));
    }

    public function store_demande(Request $request)
    {
        $request->validateWithBag('create_demande_intervention', [
            'site' => 'required|exists:sites,id',
            'photo_demande_intervention' => 'required|image|extensions:jpeg,jpg,png|max:5000',
        ]);

        $commercial = Auth::user();
        if ($commercial->role !== 'commercial') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }

        $di_reference = $this->generateDIReference();
        $break_stepp = 0;
        // dd($di_reference,DemandeIntervention::where("di_reference",$di_reference)->first());

        while (DemandeIntervention::where("di_reference", $di_reference)->first()) {
            if ($break_stepp >= 10) {
                return redirect()->back()->with('error', 'Trop de tentative! Recommencer svp.');
            }
            $di_reference = $this->generateDIReference();
            $break_stepp += 1;
        }

        $image = $request->file('photo_demande_intervention');

        $imagePath = $this->saveImageWithUniqueName($image, $di_reference, 'demandes');

        DemandeIntervention::create([
            'di_reference' => $di_reference,
            'site_id' => $request->site,
            'demandeur_id' => $commercial->id,
            'demande_file' => $imagePath,
            'status' => StatusEnum::PAS_TRAITE,
        ])->save();

        return redirect()->back()->with('success', 'Nouvelle demande créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function demandes_show(DemandeIntervention $demande)
    {
        // dd($demande);
        return view('commercial.demandes.show', compact('demande'));
    }

    public function sites()
    {
        return view('commercial.sites.index');
    }

    public function sites_show(Site $site)
    {
        return view('commercial.sites.show', compact('site'));
    }

    public function show_categorie_equipement(Site $site, $categorie_equipement)
    {
        // Tableau des catégories disponibles
        $categories_disponibles =
        [
            'distributeur',
            'stockage-et-tuyauterie',
            'forage',
            'servicing',
            'branding',
            'groupe-electrogene',
            'electricite',
            'equipement-incendie',
        ]; // Remplacez par vos catégories

        // Vérifier si la catégorie spécifiée existe dans le tableau des catégories disponibles
        if (!in_array($categorie_equipement, $categories_disponibles)) {
            // Catégorie non valide, rediriger ou afficher un message d'erreur
            return redirect()->back()->with('error', 'Type d\'equipement invalide.');
        }

        // Récupérer les équipements de la catégorie spécifiée pour le site donné
        $equipements = $site->equipements()->where('categorie', $categorie_equipement)->get();

        // Retourner la vue avec les équipements
        return view('commercial.sites.equipements', ['site' => $site,'type_equipement' => $categorie_equipement,'equipements' => $equipements]);
    }

    public function zones_index()
    {
        return view("commercial.zones.index");
    }

    public function forfaits_contrat_index()
    {
        return view("commercial.forfaits_contrat.index");
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
