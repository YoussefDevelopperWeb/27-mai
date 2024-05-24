<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Panier::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produit' => 'required|exists:produits,id',
            'qtt_produit' => 'required|integer|min:1',
        ]);

        $panier = Panier::create($request->all());
        return response()->json($panier, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $panier = Panier::find($id);

        if (is_null($panier)) {
            return response()->json(['message' => 'Panier not found'], 404);
        }

        return response()->json($panier, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $panier = Panier::find($id);

        if (is_null($panier)) {
            return response()->json(['message' => 'Panier not found'], 404);
        }

        $request->validate([
            'id_produit' => 'exists:produits,id',
            'qtt_produit' => 'integer|min:1',
        ]);

        $panier->update($request->all());
        return response()->json($panier, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $panier = Panier::find($id);

        if (is_null($panier)) {
            return response()->json(['message' => 'Panier not found'], 404);
        }

        $panier->delete();
        return response()->json(null, 204);
    }
}
