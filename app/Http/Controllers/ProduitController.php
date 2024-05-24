<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produit::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pr = $request->validate([
            'nom_produit' => 'required|string|max:255',
            'prix_produit' => 'required|numeric',
            'image_produit' => 'required|string|max:255',
            'stock_produit' => 'required|integer',
            'reference_produit' => 'required|string|max:255',
            'description_produit' => 'required|string',
            'id_cat' => 'required|exists:categories,id',
        ]);

        $produit = Produit::create($pr);
        return response()->json($produit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Produit::find($id);

        if (is_null($produit)) {
            return response()->json(['message' => 'Produit not found'], 404);
        }

        return response()->json($produit, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);

        if (is_null($produit)) {
            return response()->json(['message' => 'Produit not found'], 404);
        }

        $request->validate([
            'nom_produit' => 'string|max:255',
            'prix_produit' => 'numeric',
            'image_produit' => 'string|max:255',
            'stock_produit' => 'integer',
            'reference_produit' => 'string|max:255',
            'description_produit' => 'string',
            'id_cat' => 'exists:categories,id',
        ]);

        $produit->update($request->all());
        return response()->json($produit, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);

        if (is_null($produit)) {
            return response()->json(['message' => 'Produit not found'], 404);
        }

        $produit->delete();
        return response()->json(null, 204);
    }
}
