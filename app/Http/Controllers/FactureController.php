<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Facture::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_commande' => 'required|exists:commandes,id',
            'date_facture' => 'required|date',
            'nom_facture' => 'required|string|max:255',
            'adresse_facture' => 'required|string|max:255',
        ]);

        $facture = Facture::create($request->all());
        return response()->json($facture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $facture = Facture::find($id);

        if (is_null($facture)) {
            return response()->json(['message' => 'Facture not found'], 404);
        }

        return response()->json($facture, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $facture = Facture::find($id);

        if (is_null($facture)) {
            return response()->json(['message' => 'Facture not found'], 404);
        }

        $request->validate([
            'id_commande' => 'exists:commandes,id',
            'date_facture' => 'date',
            'nom_facture' => 'string|max:255',
            'adresse_facture' => 'string|max:255',
        ]);

        $facture->update($request->all());
        return response()->json($facture, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $facture = Facture::find($id);

        if (is_null($facture)) {
            return response()->json(['message' => 'Facture not found'], 404);
        }

        $facture->delete();
        return response()->json(null, 204);
    }
}
