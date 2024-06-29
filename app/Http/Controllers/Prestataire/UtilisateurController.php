<?php

namespace App\Http\Controllers\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    public function index()
    {
        return view('prestataires.utilisateurs.index');
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
}
