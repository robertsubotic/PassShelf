<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{

//Region 'Public Methods'
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = (string) $request->input('email');
        $key = $email . $request->ip();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            RateLimiter::clear('login|' . $key);

            return redirect()->intended('dashboard')
                            ->with('success', 'Signed in successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
//EndRegion

//Region 'Private Methods'
//EndRegion
}