<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomLogoutController;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::resource("/todo", TodoController::class)->middleware(["auth", RoleMiddleware::class . ":user"]);
Route::get("/login", [CustomLoginController::class, "index"])->name("login.index");
Route::post("/login", [CustomLoginController::class, "login"])->name("login");
Route::get("/register", [CustomRegisterController::class, "index"])->name("register.index");
Route::post("/register", [CustomRegisterController::class, "register"])->name("register");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/logout", [CustomLogoutController::class, "logout"])->name("logout");


// Admin routes
Route::name("admin.")->middleware(["auth", RoleMiddleware::class . ":admin"])->group(function () {
    Route::get("/admin/dashboard", [AdminController::class, "displayDashboard"])->name("displayDashboard");
});