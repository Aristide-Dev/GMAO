<?php

namespace App\Http\Controllers\Demandeur;

use App\Http\Controllers\Controller;
use App\Models\Equipement;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::paginate(2);
        return view("demandeur.sites.index", compact('sites'));
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
        $request->validateWithBag('create_site',[
            'name' => ['required', 'string', 'max:55'],
            'registre' => ['required', 'string', 'max:30'],
        ]);

        Site::create([
            'name' => $request->name,
            'registre' => $request->registre,
        ]);

        return redirect(route("demandeur.sites.index"))->with('success', 'Nouveau site ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        $sites = Site::all();
        return view("demandeur.sites.show", compact('site','sites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function add_equipement(Request $request, Site $site)
    {
        $request->validateWithBag('create_equipement',[
            'name' =>                   ['required', 'string', 'max:55'],
            'categorie' =>              ['required', 'string', 'max:30'],
            'numero_serie' =>           ['required', 'string', 'max:150'],
            'forfait_contrat' =>        ['required', 'integer', 'min:0'],
        ]);

        Equipement::create([
            'name' => $request->name,
            'categorie' => $request->categorie,
            'numero_serie' => $request->numero_serie,
            'forfait_contrat' => $request->forfait_contrat,
            'site_id' => $site->id,
        ]);

        return redirect()->back()->with('success', 'Nouveau site ajouté avec succès!');
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
        return view('demandeur.sites.equipements', ['site' => $site,'type_equipement' => $categorie_equipement,'equipements' => $equipements]);
    }
}
