<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Models\Password;

Route::get("/", fn() => view("landing"))->name(name: "landing");

Route::get("/register", fn() => view("register"))->name("register");

Route::get("/login", fn() => view("login"))->name("login");

Route::get("/dashboard", function () {
    $passwords = Password::where("user_id", Auth::id())->get();
    return view("dashboard", compact("passwords"));
})
    ->middleware("auth")
    ->name("dashboard");

Route::get("/account", function () {
    return view("account");
})
    ->middleware("auth")
    ->name("account");

Route::get("/password/edit/{id}", [
    \App\Http\Controllers\PasswordController::class,
    "edit",
])
    ->middleware("auth")
    ->name("password.edit");

Route::get("/signout", function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect("/");
})->name("signout");

Route::post("register", [RegisterController::class, "customRegister"])->name(
    name: "register",
);
Route::post("login", [LoginController::class, "customLogin"])
    ->middleware('throttle:login')
    ->name("login");

Route::post("store_password", [
    \App\Http\Controllers\PasswordController::class,
    "store",
])
    ->middleware("auth")
    ->name("password.store");

Route::post("delete_password/{id}", [
    \App\Http\Controllers\PasswordController::class,
    "delete",
])
    ->middleware("auth")
    ->name("password.delete");

Route::post("password/update/{id}", [
    \App\Http\Controllers\PasswordController::class,
    "update",
])
    ->middleware("auth")
    ->name("password.update");

Route::post("account/edit", [
    \App\Http\Controllers\AccountController::class,
    "editAccount",
])
    ->middleware("auth")
    ->name("account.edit");

Route::post("account/change_password", [
    \App\Http\Controllers\AccountController::class,
    "changePassword",
])
    ->middleware("auth")
    ->name("account.change_password");
