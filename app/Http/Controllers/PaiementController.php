<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Paiement::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_commande' => 'required|exists:commandes,id',
            'montant' => 'required|numeric',
            'dateP' => 'required|date',
            'methode' => 'required|string|max:255',
        ]);

        $paiement = Paiement::create($request->all());
        return response()->json($paiement, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paiement = Paiement::find($id);

        if (is_null($paiement)) {
            return response()->json(['message' => 'Paiement not found'], 404);
        }

        return response()->json($paiement, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paiement = Paiement::find($id);

        if (is_null($paiement)) {
            return response()->json(['message' => 'Paiement not found'], 404);
        }

        $request->validate([
            'id_commande' => 'exists:commandes,id',
            'montant' => 'numeric',
            'dateP' => 'date',
            'methode' => 'string|max:255',
        ]);

        $paiement->update($request->all());
        return response()->json($paiement, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paiement = Paiement::find($id);

        if (is_null($paiement)) {
            return response()->json(['message' => 'Paiement not found'], 404);
        }

        $paiement->delete();
        return response()->json(null, 204);
    }
}
