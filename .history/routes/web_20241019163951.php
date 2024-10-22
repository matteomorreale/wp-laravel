<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Gestione utenti
use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('role:admin');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('role:admin');
Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('role:admin');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index')
    ->middleware('role:admin');