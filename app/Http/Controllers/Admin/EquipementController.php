<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Equipement;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EquipementController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site, Equipement $equipement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site, Equipement $equipement)
    {
        return view('admin.sites.edit-equipement', compact('site', 'equipement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site, Equipement $equipement)
    {
        $request->validateWithBag('edit_equipement', [
            'name' => ['required', 'string', 'max:100', Rule::unique('sites')->ignore($site->id)],
            'numero_serie' => ['required', 'string', 'max:30'],
            'categorie' => ['required', 'string', 'max:30', 'in:distributeur,stockage-et-tuyauterie,forage,servicing,branding,groupe-electrogene,electricite,equipement-incendie,compteur-et-pompes-de-transfert,autres-equipements-et-immobiliers'],
            'forfait_contrat' => ['required', 'integer', 'min:0'],

            'marque' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'produit' => 'nullable|string|max:20',
            'annee_fabrication' => 'nullable|integer|min:1900|max:' . date('Y'),
            'date_mise_en_service' => 'nullable|date',
            'puissance' => 'nullable|integer|min:0',
            'capacite' => 'nullable|integer|min:0',
            'observations' => 'nullable|string',
        ]);

        $equipement->name = $request->name;
        $equipement->numero_serie = $request->numero_serie;
        $equipement->categorie = $request->categorie;
        $equipement->forfait_contrat = $request->forfait_contrat;

        $equipement->marque = $request->marque;
        $equipement->type = $request->type;
        $equipement->position = $request->position;
        $equipement->produit = $request->produit;
        $equipement->annee_fabrication = $request->annee_fabrication;
        $equipement->date_mise_en_service = $request->date_mise_en_service;
        $equipement->puissance = $request->puissance;
        $equipement->capacite = $request->capacite;
        $equipement->observations = $request->observations;
        $equipement->save();
        return redirect(route("admin.sites.equipement.categorie", ['site' => $site, 'categorie_equipement' => $equipement->categorie]))->with('success', 'Informations  de l\'equipement editées avec success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site, Equipement $equipement)
    {
        $equipement->delete();

        return redirect(route("admin.sites.show", $site))->with('success', 'Equipement supprimé avec success!');
    }

    /**
     * switch Status the specified resource from storage.
     */
    public function switchStatus(Site $site, $equipementId)
    {
        // Rechercher un équipement inactif en ignorant le scope global pour les actifs
        $equipement = Equipement::withoutGlobalScope('actif')->where('id', $equipementId)->first();

        $equipement->actif = !$equipement->actif;
        $equipement->save();

        $msg = $equipement->actif ? 'Equipement activé avec success!' : 'Equipement désactivé avec success!';

        return redirect(route("admin.sites.show", $site))->with('success', $msg);
    }
}