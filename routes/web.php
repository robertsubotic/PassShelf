<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Models\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET

Route::get('/', function () {
    return view('landing');
})->name(name: 'landing');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');;

Route::get('/dashboard', function () {
    $passwords = Password::where('user_id', Auth::id())->get();
    return view('dashboard', compact('passwords'));
})->middleware('auth')->name('dashboard');

Route::get('/signout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('signout');

// POST

Route::post('register', [RegisterController::class, 'customRegister'])->name(name: 'register'); 
Route::post('login', [LoginController::class, 'customLogin'])->name(name: 'login');
Route::post('store_password', [\App\Http\Controllers\PasswordController::class, 'store'])->middleware('auth')->name('password.store'); 

