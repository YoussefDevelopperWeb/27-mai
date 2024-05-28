<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitAdController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('admin.produit.index', compact('produits'));
    }

    // Show the form for creating a new produit
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.produit.create', compact('categories'));
    }

    // Store a newly created produit in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_produit' => 'required|string|max:255',
            'prix_produit' => 'required|numeric',
            'image_produit' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock_produit' => 'required|integer',
            'description_produit' => 'required|string',
            'id_cat' => 'required|exists:categories,id'
        ]);
    
        $imagePath = $request->file('image_produit')->store('public/images');
    
        Produit::create([
            'nom_produit' => $validatedData['nom_produit'],
            'prix_produit' => $validatedData['prix_produit'],
            'image_produit' => $imagePath,
            'stock_produit' => $validatedData['stock_produit'],
            'description_produit' => $validatedData['description_produit'],
            'id_cat' => $validatedData['id_cat']
        ]);
    
        return redirect()->route('produit.index')->with('success', 'Produit créé avec succès.');
    }
    
    // Show the form for editing the specified produit
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('admin.produit.edit', compact('produit'));
    }

    // Update the specified produit in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_produit' => 'required|string|max:255',
            'prix_produit' => 'required|numeric',
            'description_produit' => 'required|string',
            'image_produit' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock_produit' => 'required|integer',
            'id_cat' => 'required|exists:categories,id'
        ]);
    
        $produit = Produit::findOrFail($id);
        $produit->nom_produit = $validatedData['nom_produit'];
        $produit->prix_produit = $validatedData['prix_produit'];
        $produit->description_produit = $validatedData['description_produit'];
        $produit->stock_produit = $validatedData['stock_produit'];
        $produit->id_cat = $validatedData['id_cat'];
    
        if ($request->hasFile('image_produit')) {
            $imagePath = $request->file('image_produit')->store('public/images');
            $produit->image_produit = $imagePath;
        }
    
        $produit->save();
    
        return redirect()->route('admin.produit.index')->with('success', 'Produit mis à jour avec succès.');
    }
    // Remove the specified produit from the database
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('produit.index')->with('success', 'Produit deleted successfully.');
    }
}
