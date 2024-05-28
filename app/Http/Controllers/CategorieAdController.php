<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieAdController extends Controller
{
    // Method to display categories in the admin panel
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category in the database
 // Store a newly created category in the database
public function store(Request $request)
{
    $validatedData = $request->validate([
        'nom_cat' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
    ]);

    $imagePath = $request->file('image')->store('public/images');
   
    Categorie::create([
        'nom_cat' => $validatedData['nom_cat'],
        'image' => $imagePath,
    ]);
    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}


    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = Categorie::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_cat' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $category = Categorie::findOrFail($id);
        $category->nom_cat = $request->nom_cat;

        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from the database
    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
