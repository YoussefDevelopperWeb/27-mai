<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Add logic for admin dashboard view
        return view('admin.index');
    }
}