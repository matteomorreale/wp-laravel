<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Gestione utenti
use App\Http\Controllers\UserController;

// Rotte protette per gli utenti autenticati
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('role:admin');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('role:admin');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('role:admin');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])
        ->name('users.index')    
        ->middleware('role:admin');
        // Rotta per creare un nuovo utente
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        // Rotta per eliminare un utente
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Gestione post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Rotte non protette
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');