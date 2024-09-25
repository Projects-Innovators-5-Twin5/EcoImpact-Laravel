<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function register(){
        return View("Auth.register");
    }

    public function login()
    {
        // Check if user is already logged in
        if (Auth::check()) {
            return redirect('/dashboard'); // Redirect to dashboard if authenticated
        }
    
        return view('Auth.login'); // Otherwise, show login page
    }
    

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/landing'); 
            }        }
    
        // Debugging: Log the error or the credentials
        \Log::info('Login attempt failed', ['credentials' => $credentials]);
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
    
    

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/landing');
    }


    public function forgotPassword(){
        return View("Auth.forgotPassword");
    }
}
