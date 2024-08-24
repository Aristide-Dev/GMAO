<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = Auth::user();
        if ($auth_user->role !== 'super_admin' && $auth_user->role !== 'admin' && $auth_user->role !== 'maintenance' && $auth_user->role !== 'commercial') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }
        return view('formations.index');
    }

    public function viewPdf(Formation $formation)
    {
        $auth_user = Auth::user();
        if ($auth_user->role !== 'super_admin' && $auth_user->role !== 'admin' && $auth_user->role !== 'maintenance' && $auth_user->role !== 'commercial') {
            return redirect()->back()->with('error', 'Action non autorisée');
        }
        $path = Storage::path("public".DIRECTORY_SEPARATOR.$formation->pdf_path);

        if (!file_exists($path)) {
            abort(404);
        }

        return view('formations.showPdf', compact('path', 'formation'));

        // return response()->file($path);
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
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
