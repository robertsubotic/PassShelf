<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

//Region 'Public Methods'
    public function editAccount(Request $request)
    {
        $request->validate([
            'accout_name' => 'required|string|max:255',
            'account_email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'account_password' => 'required|string',
        ], [
            'accout_name.max' => 'Username Maximum characters are 255.',
            'account_email.unique' => 'A user already exists with this email.',
            'account_password.required' => 'The provided current password is incorrect.',
            'account_email.required' => 'Email is required.',
            'accout_name.required' => 'Name is required.',
        ]);

        $user = Auth::user();
        $user->name = $request->accout_name;
        $user->email = $request->account_email;
        $user->save();

        return redirect()->route('account')->with('success', 'Account details updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ], [
            'new_password.min' => 'Minimum characters are 6.',
            'new_password.confirmed' => 'Password confirmation does not match.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'The provided current password is incorrect.',
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('account')->with('success', 'Password changed successfully!');
    }

//EndRegion

//Region 'Private Methods'

//EndRegion
}