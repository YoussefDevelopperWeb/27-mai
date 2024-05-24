<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Profile::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:users,id',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'cp_client' => 'required|integer',
        ]);

        $profile = Profile::create($request->all());
        return response()->json($profile, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        if (is_null($profile)) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        if (is_null($profile)) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $request->validate([
            'id_client' => 'exists:users,id',
            'adresse' => 'string|max:255',
            'ville' => 'string|max:255',
            'cp_client' => 'integer',
        ]);

        $profile->update($request->all());
        return response()->json($profile, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (is_null($profile)) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile->delete();
        return response()->json(null, 204);
    }
}
