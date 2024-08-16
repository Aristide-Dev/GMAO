<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Site;
use App\Models\User;
use App\Models\Zone;
use App\Models\Piece;
use App\Enums\StatusEnum;
use Illuminate\Http\File;
use App\Models\Prestataire;
use App\Events\ClotureEvent;
use Illuminate\Http\Request;
use App\Events\CreateBTEvent;
use App\Models\InjectionPiece;
use Illuminate\Validation\Rule;
use App\Models\DemandeIntervention;
use App\Models\RapportIntervention;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\AdminInjectionPieceEvent;
use App\Events\CreateDemandeInterventionEvent;

class DemandeInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::all();
        $demandes = DemandeIntervention::paginate(10);
        $demandeurs = User::where("role", "demandeur")->get();
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
            'demandeur' => 'required|exists:users,id',
            'photo_demande_intervention' => 'required|image|extensions:jpeg,jpg,png|max:5000',
        ]);

        $auth_user = Auth::user();
        if ($auth_user->role !== 'super_admin' && $auth_user->role !== 'admin' && $auth_user->role !== 'maintenance') {
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

        $demande = DemandeIntervention::create([
            'di_reference' => $di_reference,
            'site_id' => $request->site,
            'demandeur_id' => $request->demandeur,
            'demande_file' => $imagePath,
            'status' => StatusEnum::PAS_TRAITE,
        ]);
        event(new CreateDemandeInterventionEvent($demande));

        return redirect()->back()->with('success', 'Nouvelle demande créée avec succès!');
    }

    /**
     * Clôture de la demande d'intervention en mettant à jour le rapport d'intervention.
     *
     * @param Request $request Les données de la requête contenant les informations nécessaires à la clôture de la demande.
     * @param RapportIntervention $rapportIntervention Le rapport d'intervention à mettre à jour.
     * @return \Illuminate\Http\RedirectResponse La redirection vers la page précédente avec un message de succès ou d'erreur.
     */
    public function cloture(Request $request, RapportIntervention $rapportIntervention)
    {
        $request->validateWithBag('create_cloture_rapport', [
            'status' => 'required|string|max:255',
            'numero_devis' => 'string|max:100|min:2',
            'bon_commande' => 'string|max:100|min:2',
            'commentaire' => 'nullable|string|max:255',
        ]);

        $auth_user = Auth::user();
        if ($auth_user->role !== 'super_admin' && $auth_user->role !== 'admin' && $auth_user->role !== 'maintenance') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }

        // dd($rapportIntervention->rapport_constats);
        $intervention_time = $rapportIntervention->rapport_constat->created_at ?? now();
        $temps_prise_en_charge = $rapportIntervention->bon_travail->demande->created_at->diff($intervention_time);

        if ($temps_prise_en_charge->d <= 0) {
            $temps_prise_en_charge = $temps_prise_en_charge->format('%H:%I:%S');
        } elseif ($temps_prise_en_charge->d >= 1) {
            if ($temps_prise_en_charge->i == 0) {
                $temps_prise_en_charge = $temps_prise_en_charge->days . " jour(s) et " . $temps_prise_en_charge->h . 'h ' . $temps_prise_en_charge->i;
            } else {
                $temps_prise_en_charge = $temps_prise_en_charge->days . " jour(s) et " . $temps_prise_en_charge->h . 'h ' . $temps_prise_en_charge->i . 'min ' . $temps_prise_en_charge->s . "s";
            }
        }

        $kpis = '0';
        // Calculer les KPIs
        if (strtotime($rapportIntervention->bon_travail->date_echeance) >= strtotime($intervention_time)) {
            // $kpis = "Dans les délais.";
            $kpis = '1';
        } else {
            // $kpis = "Hors délais.";
            $kpis = '0';
        }

        // dd($temps_prise_en_charge,$kpis);
        // dd($rapportIntervention->bon_travail->demande->created_at,$temps_prise_en_charge);

        // $priseEnChargeInfo = $this->calculerPriseEnCharge(
        //     $rapportIntervention->bon_travail->created_at,
        //     now(), // Utiliser la date de création du rapport d'intervention comme date d'intervention
        //     $rapportIntervention->bon_travail->date_echeance,
        // );

        // if(array_key_exists('error',$priseEnChargeInfo))
        // {
        //     return redirect()->back()->with('error', $priseEnChargeInfo['error']);
        // }
        // dd($priseEnChargeInfo);

        // $data = [
        //     'date declaration'=>$rapportIntervention->bon_travail->created_at,
        //     'date intervention'=>$rapportIntervention->date_intervention, // Utiliser la date de création du rapport d'intervention comme date d'intervention
        //     'date echeance'=>$rapportIntervention->bon_travail->date_echeance
        // ];
        // dd($data, $priseEnChargeInfo);



        $status = null;
        switch ($request->status) {
            case 'Clôturé':
                $status = StatusEnum::CLOTURE;
                break;
            case 'annulé':
                $status = StatusEnum::ANNULE;
                break;
            case 'affectées travaux':
                $status = StatusEnum::AFFECTER_TRAVAUX;
                break;
            default:
                $status = StatusEnum::ANNULE;
                break;
        }


        // Mettre à jour le rapport d'intervention avec les informations fournies et calculées
        $rapportIntervention->update([
            'status' => $status,
            'numero_devis' => $request->numero_devis,
            'bon_commande' => $request->bon_commande,
            'commentaire' => $request->commentaire,
            'temps_prise_en_charge' => $temps_prise_en_charge,
            'kpi' => $kpis,
            // 'temps_prise_en_charge' => $priseEnChargeInfo['temps_prise_en_charge'],
            // 'kpi' => $priseEnChargeInfo['kpis'],
        ]);

        $bon_travail = $rapportIntervention->bon_travail;
        $bon_travail->status = $status;
        $bon_travail->save();

        $bon_travail->demande->status = $status;
        $bon_travail->demande->save();
        event(new ClotureEvent($rapportIntervention, $bon_travail->prestataire));

        return redirect()->back()->with('success', 'Rapport d\'intervention clôturé avec succès!');
    }

    /**
     * Clôture de la demande d'intervention en mettant à jour le rapport d'intervention.
     *
     * @param Request $request Les données de la requête contenant les informations nécessaires à la clôture de la demande.
     * @param RapportIntervention $rapportIntervention Le rapport d'intervention à mettre à jour.
     * @return \Illuminate\Http\RedirectResponse La redirection vers la page précédente avec un message de succès ou d'erreur.
     */
    public function injection(Request $request, RapportIntervention $rapportIntervention)
    {
        // dd($rapportIntervention);
        $request->validateWithBag('create_injection_piece', [
            'piece' => 'required|exists:pieces,id',
            'pris_dans_le_stock' => 'string',
            'quantite' => 'required|numeric|min:1',
            'injection_file_file' => 'nullable|image|mimes:jpeg,jpg,png|max:2000',
        ]);

        $piece = Piece::findOrFail($request->piece);

        $validateData = [
            'piece_id' => $request->piece,
            'quantite' => $request->quantite,
            'ri_reference' => $rapportIntervention->ri_reference,
            'stock_price' => $piece->price,
        ];

        $validateData['take_in_stock'] = false;
        $validateData['take_in_fournisseur'] = false;
        $validateData['fournisseur_name'] = '';
        $validateData['fournisseur_price'] = 0;

        if ($request->pris_dans_le_stock == 'on') {

            if ($piece->quantite < $request->quantite) {
                return redirect()->back()->with('error', 'Pas asser de quantite dans le stock. il reste ' . $piece->quantite . ' ' . $piece->piece . ' dans le stock');
            }
            $validateData['take_in_stock'] = true;
        } else {
            $request->validateWithBag('create_injection_piece', [
                'nom_du_fournisseur' => 'required|string|max:255',
                'prix_du_fournissseur' => 'required|numeric|min:0',
            ]);

            $validateData['take_in_fournisseur'] = true;
            $validateData['fournisseur_name'] = $request->nom_du_fournisseur;
            $validateData['fournisseur_price'] = $request->prix_du_fournissseur;
        }
        // dd($validateData);

        if (!empty($request->injection_file_file)) {
            // Gestion du téléchargement et du stockage du fichier d'injection
            $injectionFile = $request->file('injection_file_file');
            $injectionFileName = $injectionFile->getClientOriginalName(); // Nom du fichier
            $injectionFilePath = $injectionFile->storeAs('injection_files', $injectionFileName); // Stockage du fichier

            $validateData['injection_file_file'] = $injectionFilePath;
        } else {
            $validateData['injection_file_file'] = null;
        }

        // Création de la nouvelle InjectionPiece
        // dd($validateData);
        InjectionPiece::create([
            'piece_id' => $validateData['piece_id'],
            'ri_reference' => $validateData['ri_reference'],
            'quantite' => $validateData['quantite'],
            'stock_price' => $validateData['stock_price'],
            'take_in_fournisseur' => $validateData['take_in_fournisseur'],
            'take_in_fournisseur' => $validateData['take_in_fournisseur'],
            'fournisseur_name' => $validateData['fournisseur_name'],
            'fournisseur_price' => $validateData['fournisseur_price'],
            'injection_file' => $validateData['injection_file_file'],
        ]);

        if ($validateData['take_in_stock'] == true) {
            $quantite = intval($request->quantite);
            $quantite = abs($quantite);

            $piece->quantite -= $quantite;
            $piece->save();
        }

        $rapportIntervention->status = StatusEnum::EN_ATTENTE;
        $rapportIntervention->save();

        $bon_travail = $rapportIntervention->bon_travail;
        $bon_travail->status = StatusEnum::EN_ATTENTE;
        $bon_travail->save();

        event(new AdminInjectionPieceEvent($rapportIntervention, $bon_travail->prestataire));

        return redirect()->back()->with('success', 'Nouvelle Pièce injectée avec succès!');
    }

    /**
     * Clôture de la demande d'intervention en mettant à jour le rapport d'intervention.
     *
     * @param Request $request Les données de la requête contenant les informations nécessaires à la clôture de la demande.
     * @param RapportIntervention $rapportIntervention Le rapport d'intervention à mettre à jour.
     * @return \Illuminate\Http\RedirectResponse La redirection vers la page précédente avec un message de succès ou d'erreur.
     */
    public function injection_update(Request $request, RapportIntervention $rapportIntervention)
    {
        // dd($rapportIntervention);
        $request->validateWithBag('create_injection_piece', [
            'piece' => 'required|exists:pieces,id',
            'pris_dans_le_stock' => 'string',
            'quantite' => 'required|numeric|min:1',
            'injection_file_file' => 'required|image|mimes:jpeg,jpg,png|max:2000',
        ]);

        $piece = Piece::findOrFail($request->piece);

        $validateData = [
            'piece_id' => $request->piece,
            'quantite' => $request->quantite,
            'ri_reference' => $rapportIntervention->ri_reference,
            'stock_price' => $piece->price,
        ];

        $validateData['take_in_stock'] = false;
        $validateData['take_in_fournisseur'] = false;
        $validateData['fournisseur_name'] = '';
        $validateData['fournisseur_price'] = 0;

        if ($request->pris_dans_le_stock == 'on') {

            if ($piece->quantite < $request->quantite) {
                return redirect()->back()->with('error', 'Pas asser de quantite dans le stock. il reste ' . $piece->quantite . ' ' . $piece->piece . ' dans le stock');
            }
            $validateData['take_in_stock'] = true;
        } else {
            $request->validateWithBag('create_injection_piece', [
                'nom_du_fournisseur' => 'required|string|max:255',
                'prix_du_fournissseur' => 'required|numeric|min:0',
            ]);

            $validateData['take_in_fournisseur'] = true;
            $validateData['fournisseur_name'] = $request->nom_du_fournisseur;
            $validateData['fournisseur_price'] = $request->prix_du_fournissseur;
        }
        // dd($validateData);

        // Gestion du téléchargement et du stockage du fichier d'injection
        $injectionFile = $request->file('injection_file_file');
        $injectionFileName = $injectionFile->getClientOriginalName(); // Nom du fichier
        $injectionFilePath = $injectionFile->storeAs('injection_files', $injectionFileName); // Stockage du fichier

        $validateData['injection_file_file'] = $injectionFilePath;

        // Création de la nouvelle InjectionPiece
        // dd($validateData);
        InjectionPiece::create([
            'piece_id' => $validateData['piece_id'],
            'ri_reference' => $validateData['ri_reference'],
            'quantite' => $validateData['quantite'],
            'stock_price' => $validateData['stock_price'],
            'take_in_fournisseur' => $validateData['take_in_fournisseur'],
            'take_in_fournisseur' => $validateData['take_in_fournisseur'],
            'fournisseur_name' => $validateData['fournisseur_name'],
            'fournisseur_price' => $validateData['fournisseur_price'],
            'injection_file' => $validateData['injection_file_file'],
        ]);

        if ($piece->quantite < $request->quantite) {
            $quantite = intval($request->quantite);
            $quantite = abs($quantite);

            $piece->quantite -= $quantite;
            $piece->save();
        }

        $rapportIntervention->status = StatusEnum::EN_ATTENTE;
        $rapportIntervention->save();

        $bon_travail = $rapportIntervention->bon_travail;
        $bon_travail = $rapportIntervention->bon_travail;
        $bon_travail->status = StatusEnum::EN_ATTENTE;
        $bon_travail->save();

        $bon_travail->demande->status = StatusEnum::EN_ATTENTE;
        $bon_travail->demande->save();

        return redirect()->back()->with('success', 'Nouvelle Pièce injectée avec succès!');
    }



    /**
     * Display the specified resource.
     */
    public function show(DemandeIntervention $demande)
    {
        // dd($demande->bon_travails,$demande->bon_travails->first());
        $zones = Zone::all();
        $prestataires = Prestataire::all();
        $pieces = Piece::all();
        return view('admin.demandes.show', compact('demande', 'zones', 'prestataires', 'pieces'));
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


    /**
     * Calculer la durée de prise en charge d'une demande et vérifier si elle est dans les délais.
     *
     * @param string $date_declaration La date de déclaration de la demande.
     * @param string $date_intervention La date d'intervention de la demande.
     * @param string $date_echeance La date d'échéance de la demande.
     *
     * @return array Un tableau contenant la durée de prise en charge et les KPIs.
     */
    private function calculerPriseEnCharge($date_declaration, $date_intervention, $date_echeance): array
    {
        $temps_prise_en_charge_format = '';
        $kpis = '';

        // Vérifier si la date d'intervention est postérieure à la date de déclaration
        // if (strtotime($date_declaration) > strtotime($date_intervention)) {
        //     return ['error' => 'La date d\'intervention ne peut pas être antérieure à la date de déclaration de cette demande.'];
        // }

        // Calculer la différence entre la date d'intervention et la date de déclaration
        $temps_prise_en_charge_seconds = strtotime($date_intervention) - strtotime($date_declaration);

        // Convertir le temps en heures, minutes et secondes
        $jours = floor($temps_prise_en_charge_seconds / (60 * 60 * 24));
        $heures = floor(($temps_prise_en_charge_seconds - ($jours * 60 * 60 * 24)) / (60 * 60));
        $minutes = floor(($temps_prise_en_charge_seconds - ($jours * 60 * 60 * 24) - ($heures * 60 * 60)) / 60);
        $secondes = $temps_prise_en_charge_seconds - ($jours * 60 * 60 * 24) - ($heures * 60 * 60) - ($minutes * 60);

        // Formater la durée de prise en charge
        if ($jours > 0) {
            $temps_prise_en_charge_format .= $jours . ' jour(s) ';
        }
        if ($heures > 0) {
            $temps_prise_en_charge_format .= $heures . ' heure(s) ';
        }
        if ($minutes > 0) {
            $temps_prise_en_charge_format .= $minutes . ' minute(s) ';
        }
        if ($secondes > 0) {
            $temps_prise_en_charge_format .= $secondes . ' seconde(s)';
        }

        // Calculer les KPIs
        if (strtotime($date_echeance) >= strtotime($date_intervention)) {
            // $kpis = "Dans les délais.";
            $kpis = 1;
        } else {
            // $kpis = "Hors délais.";
            $kpis = 0;
        }

        dd("date_declaration", $date_declaration, "date_intervention", $date_intervention, "date_echeance", $date_echeance, "temps_prise_en_charge_format", $temps_prise_en_charge_format, "kpis", $kpis);

        return ['temps_prise_en_charge' => $temps_prise_en_charge_format, 'kpis' => $kpis];
    }
}
