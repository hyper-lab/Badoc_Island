<?php
// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // If the user is already authenticated, log them out
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed, check if the user is an admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            // Redirect to intended page or home for non-admin users
            return redirect()->intended('/');
        }

        // Authentication failed, redirect back with input and error message
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}