<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zones = Zone::paginate(30);
        return view("admin.zones.index", compact('zones'));
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
        $request->validateWithBag('create_zone',[
            'name' => ['required', 'string', 'max:55'],
            'priorite' => ['required', 'numeric', 'in:1,2,3'],
            'delais' => ['required', 'numeric', 'min:1', 'max:100'],
        ]);

        Zone::create([
            'name' => $request->name,
            'priorite' => $request->priorite,
            'delais' => $request->delais,
        ]);

        return redirect(route("admin.zones.index"))->with('success', 'Nouvelle zone ajoutée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zone $zone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zone $zone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        //
    }
}
