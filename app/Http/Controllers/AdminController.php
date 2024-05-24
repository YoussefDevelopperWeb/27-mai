<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Admin::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|string|email|max:255|unique:admins',
            'mdp_admin' => 'required|string|min:8',
        ]);

        $admin = Admin::create([
            'email_admin' => $request->email_admin,
            'mdp_admin' => Hash::make($request->mdp_admin),
        ]);

        return response()->json($admin, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($admin)
    {
        $Adm = Admin::find($admin);

        if (is_null($Adm)) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        return response()->json($Adm, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $admin = Admin::find($id);

        if (is_null($admin)) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $request->validate([
            'email_admin' => 'email|unique:admins,email_admin,'.$id,
            'mdp_admin' => 'string|min:8',
        ]);

        $admin->update($request->all());

        if ($request->has('mdp_admin')) {
            $admin->mdp_admin = Hash::make($request->mdp_admin);
            $admin->save();
        }

        return response()->json($admin, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Admin)
    {
        $admin = Admin::find($Admin);

        if (is_null($admin)) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $admin->delete();
        return response()->json(null, 204);
    }
}
