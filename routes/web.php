<?php

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomLogoutController;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::resource("/todo", TodoController::class);
Route::get("/login", [CustomLoginController::class, "index"])->name("login.index");
Route::post("/login", [CustomLoginController::class, "login"])->name("login");
Route::get("/register", [CustomRegisterController::class, "index"])->name("register.index");
Route::post("/register", [CustomRegisterController::class, "register"])->name("register");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/logout", [CustomLogoutController::class, "logout"])->name("logout");
