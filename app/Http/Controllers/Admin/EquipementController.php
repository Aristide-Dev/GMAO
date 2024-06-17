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
        $request->validateWithBag('edit_equipement',[
            'name' => ['required', 'string', 'max:100', Rule::unique('sites')->ignore($site->id)],
            'numero_serie' => ['required', 'string', 'max:30', Rule::unique('sites')->ignore($site->id)],
            'categorie' => ['required', 'string', 'max:30', 'in:distributeur,stockage-et-tuyauterie,forage,servicing,branding,groupe-electrogene,electricite,equipement-incendie'],
            'forfait_contrat' => ['required', 'integer', 'min:0'],
        ]);

        $equipement->name = $request->name;
        $equipement->numero_serie = $request->numero_serie;
        $equipement->categorie = $request->categorie;
        $equipement->forfait_contrat = $request->forfait_contrat;
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
}
