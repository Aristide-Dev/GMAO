<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonTravail;
use App\Models\DemandeIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonTravailController extends Controller
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
        
        // dd($request);
        $request->validateWithBag('create_demande_intervention', [
            'requete' => 'required|string|max:255',
            'zone' => 'required|exists:zones,id',
            'equipement' => 'required|exists:equipements,id',
            'prestataire' => 'required|exists:prestataires,id',
            'di_reference' => 'required|exists:demande_interventions,di_reference',
        ]);

        $auth_user = Auth::user();
        if ($auth_user->role !== 'super_admin' && $auth_user->role !== 'admin' && $auth_user->role !== 'maintenance') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }

        $demande = DemandeIntervention::findOrFail('di_reference', $request->di_reference);

        $bt_reference = $this->generateBTReference();
        $break_stepp = 0;
        // dd($bt_reference,BonTravail::where("bt_reference",$bt_reference)->first());

        while (BonTravail::where("bt_reference", $bt_reference)->first()) {
            if ($break_stepp >= 50) {
                return redirect()->back()->with('error', 'Trop de tentative! Recommencer svp.');
            }
            $bt_reference = $this->generateBTReference();
            $break_stepp += 1;
        }

        BonTravail::create([
            'bt_reference' => $bt_reference,
            'di_reference' => $request->di_reference,
            'zone_id' => $request->zone,
            'equipement_id' => $request->equipement,
            'prestataire_id' => $request->prestataire,
            'status' => "en attente de validation",
        ]);

        return redirect()->back()->with('success', 'Nouvelle demande créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BonTravail $bonTravail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BonTravail $bonTravail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BonTravail $bonTravail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonTravail $bonTravail)
    {
        //
    }

    private function generateBTReference()
    {
        // Récupérer le dernier enregistrement
        $lastBonTravail = BonTravail::latest()->first();
        $nextId = 0;

        // Si aucun enregistrement n'existe, commencez à partir de 1
        if (!$lastBonTravail) {
            $nextId = 1;
        } else {
            // Extraire le numéro d'identification de la référence
            $lastReference = $lastBonTravail->bt_reference;
            $lastId = (int)substr($lastReference, 2); // Extrait les chiffres après "DI"

            // Incrémenter l'ID pour le prochain enregistrement
            $nextId = $lastId + 1;
        }

        // Formater le numéro d'identification pour qu'il ait toujours 7 chiffres
        $formattedId = str_pad($nextId, 7, '0', STR_PAD_LEFT);

        // Retourner la référence complète
        return 'BT' . $formattedId;
    }
}
