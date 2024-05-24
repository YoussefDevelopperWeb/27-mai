<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Livraison::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_commande' => 'required|exists:commandes,id',
            'titre_liv' => 'required|string|max:255',
            'methode_liv' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);

        $livraison = Livraison::create($request->all());
        return response()->json($livraison, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $livraison = Livraison::find($id);

        if (is_null($livraison)) {
            return response()->json(['message' => 'Livraison not found'], 404);
        }

        return response()->json($livraison, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $livraison = Livraison::find($id);

        if (is_null($livraison)) {
            return response()->json(['message' => 'Livraison not found'], 404);
        }

        $request->validate([
            'id_commande' => 'exists:commandes,id',
            'titre_liv' => 'string|max:255',
            'methode_liv' => 'string|max:255',
            'statut' => 'string|max:255',
        ]);

        $livraison->update($request->all());
        return response()->json($livraison, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $livraison = Livraison::find($id);

        if (is_null($livraison)) {
            return response()->json(['message' => 'Livraison not found'], 404);
        }

        $livraison->delete();
        return response()->json(null, 204);
    }
}
