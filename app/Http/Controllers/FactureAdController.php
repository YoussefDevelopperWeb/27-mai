<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureAdController extends Controller
{
    // Display all factures
    public function index()
    {
        $factures = Facture::all();
        return view('admin.facture.index', compact('factures'));
    }

    // Delete a facture
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('facture.index')->with('success', 'Facture deleted successfully.');
    }
}
