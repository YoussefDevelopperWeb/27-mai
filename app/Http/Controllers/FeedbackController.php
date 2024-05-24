<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Feedback::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:users,id',
            'description_fb' => 'required|string',
            'evaluation_fb' => 'required|integer|min:1|max:5',
            'titre_fb' => 'required|string|max:255',
        ]);

        $feedback = Feedback::create($request->all());
        return response()->json($feedback, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $feedback = Feedback::find($id);

        if (is_null($feedback)) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }

        return response()->json($feedback, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $feedback = Feedback::find($id);

        if (is_null($feedback)) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }

        $request->validate([
            'id_client' => 'exists:users,id',
            'description_fb' => 'string',
            'evaluation_fb' => 'integer|min:1|max:5',
            'titre_fb' => 'string|max:255',
        ]);

        $feedback->update($request->all());
        return response()->json($feedback, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if (is_null($feedback)) {
            return response()->json(['message' => 'Feedback not found'], 404);
        }

        $feedback->delete();
        return response()->json(null, 204);
    }
}
