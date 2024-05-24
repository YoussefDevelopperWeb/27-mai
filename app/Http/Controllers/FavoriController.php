<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use Illuminate\Http\Request;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Favori::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produit' => 'required|exists:produits,id',
        ]);

        $favori = Favori::create($request->all());
        return response()->json($favori, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $favori = Favori::find($id);

        if (is_null($favori)) {
            return response()->json(['message' => 'Favori not found'], 404);
        }

        return response()->json($favori, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $favori = Favori::find($id);

        if (is_null($favori)) {
            return response()->json(['message' => 'Favori not found'], 404);
        }

        $request->validate([
            'id_produit' => 'exists:produits,id',
        ]);

        $favori->update($request->all());
        return response()->json($favori, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $favori = Favori::find($id);

        if (is_null($favori)) {
            return response()->json(['message' => 'Favori not found'], 404);
        }

        $favori->delete();
        return response()->json(null, 204);
    }
}
