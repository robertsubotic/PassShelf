<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

//Region 'Public Methods'
    public function index()
    {
        return view('auth.register');
    }

    public function customRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.max' => 'Username Maximum characters are 255.',
            'email.unique' => 'A user already exists with this email.',
            'password.min' => 'Minimum characters are 6.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect("dashboard")->with('success', 'You have successfully registered & signed-in');
    }
//EndRegion

//Region 'Private Methods'

//EndRegion
}