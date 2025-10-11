<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Password;

class PasswordController extends Controller
{

//Region 'Public Methods'
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'username_email' => 'nullable|string|max:255',
            'password' => 'required|string',
        ]);

        $encryptedPassword = Crypt::encryptString($validated['password']);

        Password::create([
            'user_id' => Auth::id(),
            'service_name' => $validated['service_name'],
            'username_email' => $validated['username_email'] ?? null,
            'password' => $encryptedPassword,
        ]);

        return redirect()->route('dashboard')->with('success', 'Password stored successfully!');
    }
//EndRegion

}
