<?php

namespace App\Http\Controllers\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UtilisateurController extends Controller
{
    public function index()
    {
        return view('prestataires.utilisateurs.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()->prestataire)
        {
            return redirect()->back()->with('error', 'Impossible de continuer votre action');
        }
        $request->validateWithBag('create_utilisateur',[
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
            'prestataire_own' => Auth::user()->prestataire->id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Nouvel utilisateur ajouté avec succès!');
    }

    public function show(User $utilisateur)
    {

        $agent = Auth::user();
        $prestataire = $agent->prestataire;
        // dd( Auth::user()->role,$utilisateur->prestataire_own,$prestataire->id);
        if($utilisateur->prestataire_own != $prestataire->id)
        {
            abort(403,"Vous n'etes pas autorisé à acceder à ces informations!");
        }

        if(Auth::user()->role != 'prestataire_admin')
        {
            abort(403,"Vous n'etes pas autorisé à acceder aux informations de cet utilisateur!");
        }
        return view('prestataires.utilisateurs.show', compact('utilisateur'));
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
