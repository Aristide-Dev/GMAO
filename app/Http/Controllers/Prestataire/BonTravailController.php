<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
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
}
