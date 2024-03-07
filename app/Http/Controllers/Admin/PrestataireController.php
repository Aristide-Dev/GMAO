<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Prestataire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

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

    public function create_admin(Request $request, Prestataire $prestataire)
    {
        
        $request->validateWithBag('create_presta_admin',[
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        $PrestaAdmin = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'role' => "prestataire_admin",
            'prestataire_own' => $prestataire->id, // Correction : Utiliser $prestataire->id
            'password' => Hash::make($request->password),
        ]);
        
        $prestataire->prestataire_admin_id = $PrestaAdmin->id; // Correction : Utiliser $PrestaAdmin->id
        $prestataire->save();

        return redirect()->back()->with('success', 'Nouvel administrateur ajouté avec succès!');
    }

    public function create_agent(Request $request, Prestataire $prestataire)
    {
        $request->validateWithBag('create_presta_agent',[
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'role' => "agent",
            'prestataire_own' => $prestataire->id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Nouvel Agent ajouté avec succès!');
    }

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    private function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
    }

}
