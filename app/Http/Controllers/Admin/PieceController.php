<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pieces = Piece::paginate(30);
        return view("admin.stock.index", compact('pieces'));
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
        $request->validateWithBag('create_piece',[
            'piece' => ['required', 'string', 'max:55'],
            'prix' => ['required', 'numeric', 'min:0'],
            'quantite' => ['required', 'numeric', 'min:0'],
            'stock_min' => ['required', 'numeric', 'min:0'],
        ]);

        Piece::create([
            'piece' => $request->piece,
            'price' => $request->prix,
            'quantite' => $request->quantite,
            'stock_min' => $request->stock_min,
        ]);

        return redirect(route("admin.pieces.index"))->with('success', 'Nouvelle piece ajoutée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piece $piece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piece $piece)
    {
        //
    }
}
