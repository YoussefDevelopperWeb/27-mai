<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackAdController extends Controller
{
    // Display all feedbacks
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.index', compact('feedbacks'));
    }
}
