<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user());

        if(Auth::user())
        {
            $auth_user = Auth::user();
            $role = $auth_user->role ?? null;
            if($role == "super_admin" || $role == "admin" || $role == "maintenance")
            {
                $view = 'admin';
                // acctions à faire ................
            }elseif($role == "demandeur")
            {
                $view = 'demandeur';
            }else{
                abort(403);
                exit();
            }
            $view.='.sites.index';
            $sites = Site::all();
            return view($view, compact('sites'));
        }
        abort(403);
        exit();
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
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
