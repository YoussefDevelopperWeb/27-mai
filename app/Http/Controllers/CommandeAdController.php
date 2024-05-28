<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeAdController extends Controller
{
    // Display all commandes
    public function index()
    {
        $commandes = Commande::all();
        return view('admin.commande.index', compact('commandes'));
    }

    // Delete a commande
    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commande.index')->with('success', 'Commande deleted successfully.');
    }
}
