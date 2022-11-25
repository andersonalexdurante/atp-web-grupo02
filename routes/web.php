<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect()->route('home');
});

Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/registrar', function () {
    return view('auth.register');
});

Route::post('/autenticar', [AuthController::class, "authenticate"])->name("auth");
Route::post('/registrar', [AuthController::class, "register"])->name("register");

Route::middleware('auth')->group( function() {
    Route::get('home', [ItemController::class, 'index'])->name('home');
    Route::get('itens/create', [ItemController::class, 'create'])->name('itens.create');  

    Route::get('usuario', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::patch('usuario', [UsuarioController::class, "update"]);
    Route::get('usuario/itens', [ItemController::class, 'index']);
    Route::post('usuario/itens', [ItemController::class, 'store']);
    Route::get('usuario/itens/{item}', [ItemController::class, 'show'])->name('itens.show');
    Route::patch('usuario/itens/{item}', [ItemController::class, 'update']);
    Route::get('usuario/entregues', [ItemController::class, 'delivered'])->name('itens.delivered');
});

