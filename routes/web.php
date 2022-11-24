<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/registrar', function () {
    return view('auth.register');
});

Route::fallback(function () {
    return view('auth.login');
});


Route::post('/autenticar', [AuthController::class, "authenticate"])->name("auth");
Route::post('/registrar', [AuthController::class, "register"])->name("register");


Route::middleware('auth')->group( function() {
    Route::get('/home', [ItemController::class, 'index'])->name('home');
    Route::get('/itens/create', [ItemController::class, 'store'])->name('itens.create');  
    Route::patch('usuario', [AuthController::class, "update"]);
    Route::get('usuario/itens', [ItemController::class, 'index']);
    Route::post('usuario/itens', [ItemController::class, 'store']);
    Route::get('usuario/itens/{item}', [ItemController::class, 'show']);
    Route::patch('usuario/itens/{item}', [ItemController::class, 'update']);
});

