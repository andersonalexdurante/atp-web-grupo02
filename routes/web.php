<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect()->route('view.home');
});

Route::get('autenticar', function () {
    return view('auth.login');
})->name("login");
Route::get('registrar', function () {
    return view('auth.register');
})->name("register");

Route::post('autenticar', [AuthController::class, "authenticate"])->name("api.login");
Route::post('registrar', [AuthController::class, "register"])->name("api.register");

Route::middleware('auth')->group( function() {
    // view
    Route::get('home', [ItemController::class, 'index'])->name('view.home');
    Route::get('item/create', [ItemController::class, 'create'])->name('view.item.create');  
    Route::get('item/{item}', [ItemController::class, 'show'])->name('view.item.show');
    Route::get('itens/entregues', [ItemController::class, 'delivered'])->name('view.itens.delivered');
    Route::get('perfil/edit', [UsuarioController::class, 'edit'])->name('view.usuario.edit');
    // api
    Route::post('item/create', [ItemController::class, 'store'])->name('api.item.create');
    Route::patch('item/{item}', [ItemController::class, 'update'])->name('api.item.update');
    Route::patch('perfil/edit', [UsuarioController::class, "update"])->name('api.usuario.update');
    Route::post('logout', [AuthController::class, "logout"])->name('api.logout');
});