<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Add debugging statement
        \Log::info('Store Method: Authenticating user...');
    
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Add debugging statement
        \Log::info('Store Method: Checking user type...');
    
        if ($request->user()->usertype === 'admin') {
            // Add debugging statement
            \Log::info('Store Method: User is an admin. Redirecting to admin/dashboard...');
    
            return redirect('admin/dashboard');
        }
    
        // Add debugging statement
        \Log::info('Store Method: User is not an admin. Redirecting to dashboard...');
    
        return redirect()->intended(route('home'));
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
