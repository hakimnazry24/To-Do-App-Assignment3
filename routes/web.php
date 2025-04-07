<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource("/todo", TodoController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
