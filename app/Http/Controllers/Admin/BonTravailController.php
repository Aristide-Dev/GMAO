<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Events\CreateBTEvent;
use App\Http\Controllers\Controller;
use App\Mail\CreateBTMail;
use App\Models\BonTravail;
use App\Models\DemandeIntervention;
use App\Models\Prestataire;
use App\Models\RapportIntervention;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $request->validateWithBag('create_bon_travail', [
            'requete' => 'required|string|max:255',
            'zone' => 'required|exists:zones,id',
            'equipement' => 'required|exists:equipements,id',
            'prestataire' => 'required|exists:prestataires,id',
            'di_reference' => 'required|exists:demande_interventions,di_reference',
            'create_bt_affectee_travaux' => 'nullable|boolean',
        ]);

        $auth_user = Auth::user();
        if ($auth_user->role !== 'super_admin' && $auth_user->role !== 'admin' && $auth_user->role !== 'maintenance') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }

        $zone = Zone::where('id', $request->zone)->first();
        $demande = DemandeIntervention::where('di_reference', $request->di_reference)->first();
        $prestataire = Prestataire::where('id', $request->prestataire)->first();
        // $date_echeance = $this->generateDateEcheane($demande->created_at,$zone->delais);
        $date_echeance = $this->getIntervalTime($demande->created_at,$zone->delais);
        // dd($date_echeance,$date_echeance_2);

        if($demande && $demande->bon_travails)
        {
            return redirect()->back()->with('error', 'Il existe deja un bon de travail pour cette demande');
        }
        // dd($demande);
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

        $break_stepp = 0;
        $ri_reference = $this->generateRIReference();
        while (RapportIntervention::where("ri_reference", $ri_reference)->first()) {
            if ($break_stepp >= 50) {
                Log::error("Failed to generate a unique BT reference after 50 attempts.");
                return redirect()->back()->with('error', 'Trop de tentative! Recommencer svp.');
            }
            $ri_reference = $this->generateRIReference();
            $break_stepp += 1;
        }

        $status =  $request->create_bt_affectee_travaux?StatusEnum::AFFECTER_TRAVAUX:StatusEnum::EN_COURS;

        // $bon_travail = BonTravail::create([
        //     'requete' => $request->requete,
        //     'bt_reference' => $bt_reference,
        //     'di_reference' => $request->di_reference,
        //     'zone_name' => $zone->name,
        //     'zone_priorite' => $zone->priorite,
        //     'zone_delais' => $zone->delais,
        //     'equipement_id' => $request->equipement,
        //     'prestataire_id' => $prestataire->id,
        //     'user_id' => $auth_user->id,
        //     'date_echeance' => $date_echeance,
        //     'status' => $status,
        // ]);

        // $rapport_intervention = RapportIntervention::create([
        //     'ri_reference' => $ri_reference,
        //     'bt_reference' => $bon_travail->bt_reference,
        //     'status' => $status,
        // ]);

        // $demande->status = StatusEnum::EN_COURS;
        // $demande->save();

        $bon_travail = DB::transaction(function () use ($request, $zone, $demande, $prestataire, $auth_user, $bt_reference, $ri_reference, $date_echeance, $status) {
            $bon_travail = BonTravail::create([
                'requete' => $request->requete,
                'bt_reference' => $bt_reference,
                'di_reference' => $request->di_reference,
                'zone_name' => $zone->name,
                'zone_priorite' => $zone->priorite,
                'zone_delais' => $zone->delais,
                'equipement_id' => $request->equipement,
                'prestataire_id' => $prestataire->id,
                'user_id' => $auth_user->id,
                'date_echeance' => $date_echeance,
                'status' => $status,
            ]);
        
            RapportIntervention::create([
                'ri_reference' => $ri_reference,
                'bt_reference' => $bon_travail->bt_reference,
                'status' => $status,
            ]);
        
            $demande->status = $status;
            $demande->save();

            return $bon_travail;
        });
        
        // dd($bon_travail);
        

        event(new CreateBTEvent($bon_travail, $prestataire));
        // Mail::send(new CreateBTMail($bon_travail, $prestataire));

        return redirect()->back()->with('success', 'Nouveau bon de travail créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\BonTravail $bonTravail)
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

    private function generateRIReference()
    {
        // Récupérer le dernier enregistrement
        $lastRapportIntercnetion = RapportIntervention::latest()->first();
        $nextId = 0;

        // Si aucun enregistrement n'existe, commencez à partir de 1
        if (!$lastRapportIntercnetion) {
            $nextId = 1;
        } else {
            // Extraire le numéro d'identification de la référence
            $lastReference = $lastRapportIntercnetion->ri_reference;
            $lastId = (int)substr($lastReference, 2); // Extrait les chiffres après "RI"

            // Incrémenter l'ID pour le prochain enregistrement
            $nextId = $lastId + 1;
        }

        // Formater le numéro d'identification pour qu'il ait toujours 7 chiffres
        $formattedId = str_pad($nextId, 7, '0', STR_PAD_LEFT);

        // Retourner la référence complète
        return 'RI' . $formattedId;
    }

    public function generateDateEcheane($dateStart, $limitTime)
    {
        // Heure de travail = 8h-17h => 9h
        $dateStart = Carbon::parse($dateStart)->setTime(8, 0, 0);

        if ($dateStart->isSunday()) {
            $dateStart->addDay(); // Ajouter un jour si c'est dimanche
        }

        while ($limitTime > 0) {
            $heureJourEnCours = $dateStart->hour;
            $reste = $heureJourEnCours + $limitTime - 17;
            if ($reste > 0) {
                $limitTime = abs($reste);
                $dateStart->addDay()->setHour(8); // Passer au jour suivant et définir l'heure de début
            } else {
                $reste = $limitTime;
                $limitTime = 0;
                if ($heureJourEnCours < 8) {
                    $dateStart->setHour(8); // Si l'heure est avant 8h, définir l'heure de début à 8h
                }
                $dateStart->addHours($reste); // Ajouter le reste du temps
            }
        }
        return $dateStart;
    }

    public function getIntervalTime($dateStart, $delaisHeure)
    {
        //heure de travail = 8h-17h => 9h
        $dateStart = date("Y-m-d H:i:s", strtotime($dateStart));


        $test_dimanche = date("Y-m-d", strtotime($dateStart));
        $test_dimanche = explode("-", $test_dimanche);
        $test_dimanche = mktime(0, 0, 0, $test_dimanche[1], $test_dimanche[2], $test_dimanche[0]);
        $dimanche = date("w", $test_dimanche);
        if ($dimanche == 0) {
            $dateStart = date('Y-m-d H:i:s', strtotime("+1 day", strtotime(substr($dateStart, 0, 10) . " 08:00:00")));
        }
        // die(json_encode('dateStart: ' . $dateStart));
        while ($delaisHeure > 0) {

            $heureJourEnCours = intval(substr($dateStart, 11, -6));
            $reste = $heureJourEnCours + $delaisHeure - 17;
            if (($reste) > 0) {
                $delaisHeure = abs($reste);
                $dateStart = date('Y-m-d H:i:s', strtotime("+1 day", strtotime(substr($dateStart, 0, 10) . " 08:" . substr($dateStart, 14, -3))));
            } else {
                $reste = $delaisHeure;
                $delaisHeure = 0;
                if ($heureJourEnCours < 8) {
                    $dateStart = date("Y-m-d H:i:s", strtotime(substr($dateStart, 0, 10) . " 08:" . substr($dateStart, 14, -3)));
                }
                $dateStart = date('Y-m-d H:i:s', strtotime("+{$reste} hour", strtotime($dateStart)));
            }
        }
        return $dateStart;
    }

}
