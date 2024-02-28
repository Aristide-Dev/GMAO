<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Prestataire;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.prestataires.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prestataires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validateWithBag('create_site',[
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'string', 'max:100'],
            'telephone' => ['required', 'string', 'max:20'],
            'adresse' => ['required', 'string', 'max:100'],
        ]);

        $prestataire = Prestataire::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect(route("admin.prestataires.show", $prestataire))->with('success', 'Nouveau prestataire ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestataire $prestataire)
    {
        return view('admin.prestataires.show', compact('prestataire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestataire $prestataire)
    {
        return view('admin.prestataires.edit', compact('prestataire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestataire $prestataire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestataire $prestataire)
    {
        //
    }

    public function storeAdmin(Request $request, Prestataire $prestataire)
    {
        
    }
}
