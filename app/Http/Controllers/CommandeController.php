<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Commande::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:users,id',
            'id_produit' => 'required|exists:produits,id',
            'qtt_produit' => 'required|integer',
            'date_commande' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        $commande = Commande::create($request->all());
        return response()->json($commande, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $commande = Commande::find($id);

        if (is_null($commande)) {
            return response()->json(['message' => 'Commande not found'], 404);
        }

        return response()->json($commande, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $commande = Commande::find($id);

        if (is_null($commande)) {
            return response()->json(['message' => 'Commande not found'], 404);
        }

        $request->validate([
            'id_client' => "integer",//'exists:users,id',
            'id_produit' => "integer",//'exists:produits,id',
            'qtt_produit' => 'integer',
            'date_commande' => 'date',
            'montant' => 'numeric',
        ]);

        $commande->update($request->all());
        return response()->json($commande, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commande = Commande::find($id);

        if (is_null($commande)) {
            return response()->json(['message' => 'Commande not found'], 404);
        }

        $commande->delete();
        return response()->json(null, 204);
    }
}
