<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandeIntervention;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class DemandeInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $demandeur_id = Auth::user()->id;
        // $sites = Site::all();
        // $demandes = Site::where("demandeur_id",$demandeur_id)->paginate(10);
        $sites = Site::all();
        $demandes = Site::paginate(10);
        $demandeurs = User::where("role","demandeur")->get();
        return view('admin.demandes.index', compact('sites', 'demandes', 'demandeurs'));
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
        if ($demandeur->role !== 'super_admin' && $demandeur->role !== 'admin' && $demandeur->role !== 'maintenance') {
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

        while(DemandeIntervention::where("di_reference",$di_reference)->get())
        {
            if($break_stepp >= 10)
            {
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
        ]);

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

        // Si aucun enregistrement n'existe, commencez à partir de 1
        if (!$lastDemandeIntervention) {
            $nextId = 1;
        } else {
            // Extraire le numéro d'identification de la référence
            $lastReference = $lastDemandeIntervention->reference;
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
