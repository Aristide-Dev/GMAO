<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = User::paginate(10);
        return view('admin.utilisateurs.index', compact('utilisateurs'));
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
        $request->validateWithBag('create_utilisateur',[
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Nouvel utilisateur ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $utilisateur)
    {
        if(Auth::user()->role != 'super_admin' && $utilisateur->role == 'super_admin')
        {
            abort(403,'Action non autorisé');
        }
        return view('admin.utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $utilisateur = $user;
        return view('admin.utilisateurs.edit', compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $utilisateur)
    {
        $request->validateWithBag('edit_utilisateur',[
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($utilisateur->id)],
            'telephone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($utilisateur->id)],
        ]);

        $utilisateur->first_name = $request->first_name;
        $utilisateur->last_name = $request->last_name;
        $utilisateur->last_name = $request->last_name;
        $utilisateur->email = $request->email;
        $utilisateur->telephone = $request->telephone;
        $utilisateur->save();

        return redirect()->back()->with('success', 'Informations modifiées avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function status(User $utilisateur)
    {
        $status_msg="";
        if($utilisateur->status == true)
        {
            $utilisateur->status = false;
            $status_msg="bloqué";
        }else{
            $utilisateur->status = true;
            $status_msg="débloqué";
        }
        $utilisateur->save();
        return redirect()->back()->with('success', 'Utilisateur '.$status_msg.' avec succès!');
    }


    public function switchRole(Request $request, User $utilisateur)
    {
        $request->validateWithBag('switchRole',[
            'role' => ['required', 'string'],
        ]);

        $utilisateur->role = $request->role;
        $utilisateur->save();
        return redirect()->back()->with('success', 'Role Changé avec succès!');
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
