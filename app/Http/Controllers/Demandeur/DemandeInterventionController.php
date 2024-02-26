<?php

namespace App\Http\Controllers\Demandeur;

use App\Http\Controllers\Controller;
use App\Models\DemandeIntervention;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DemandeInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $demandeur_id = Auth::user()->id;
        // $sites = Site::all();
        // $demandes = DemandeIntervention::where("demandeur_id",$demandeur_id)->paginate(10);
        $sites = Site::all();
        $demandes = DemandeIntervention::paginate(10);
        // dd($demandes);
        return view('demandeur.demandes.index', compact('sites', 'demandes'));
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
            'site' => 'required|exists:sites,id',
            'photo_demande_intervention' => 'required|image|extensions:jpeg,jpg,png|max:2000',
        ]);

        $demandeur = Auth::user();
        if ($demandeur->role !== 'demandeur') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }

        $image = $request->file('photo_demande_intervention');

        if ($image) {
            $imagePath = $image->store("demandes", "public");
        } else {
            $imagePath = null;
        }

        $di_reference = $this->generateDIReference();
        $break_stepp = 0;
        // dd($di_reference,DemandeIntervention::where("di_reference",$di_reference)->first());

        while(DemandeIntervention::where("di_reference",$di_reference)->first())
        {
            if($break_stepp >= 10)
            {
                if($imagePath ==! null)
                {
                    Storage::disk('public')->delete($imagePath);
                }
                return redirect()->back()->with('error', 'Trop de tentative! Recommencer svp.');
            }
            $di_reference = $this->generateDIReference();
            $break_stepp += 1;
        }

        DemandeIntervention::create([
            'di_reference' => $di_reference,
            'site_id' => $request->site,
            'demandeur_id' => $demandeur->id,
            'demande_file' => $imagePath,
            'status' => "en attente de validation",
        ])->save();

        return redirect()->back()->with('success', 'Nouvelle demande créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DemandeIntervention $demandeIntervention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeIntervention $demandeIntervention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DemandeIntervention $demandeIntervention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeIntervention $demandeIntervention)
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
}
