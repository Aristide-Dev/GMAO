<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForfaitContrat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForfaitContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.forfaits_contrat.index');
    }
    
    

    public function validateForfait($id)
    {
        $pendingForfait = ForfaitContrat::find($id);
        if ($pendingForfait) {
            $pendingForfait->validated = true;
            $pendingForfait->save();

            // Move to actual ForfaitContrat table if needed
            // ForfaitContrat::create([
            //     'site_id' => $pendingForfait->site_id,
            //     'amount' => $pendingForfait->amount,
            //     'start_date' => $pendingForfait->start_date,
            //     'end_date' => $pendingForfait->end_date,
            // ]);

            return redirect()->back()->with('success', 'Forfait validé avec succès');
        }

        return redirect()->back()->with('error', 'Forfait non trouvé');
    }
    
    /**
     * Récupérer les forfaits de contrats pour un mois spécifique.
     *
     * @param int $year
     * @param int $month
     * @return \Illuminate\Http\Response
     */
    public function getForfaitsByMonth($year, $month)
    {
        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        $forfaits = ForfaitContrat::whereBetween('start_date', [$startDate, $endDate])
                                        ->get();

        return view('admin.forfaits_contrat.show', compact('forfaits'));
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
    public function show(ForfaitContrat $forfaitContrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForfaitContrat $forfaitContrat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForfaitContrat $forfaitContrat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForfaitContrat $forfaitContrat)
    {
        //
    }
}
