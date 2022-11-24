<?php

use App\Http\Controllers\api\ItemController;
use App\Http\Controllers\api\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/registrar', function () {
    return view('register');
});

Route::middleware('auth:sanctum')->group( function() {
    Route::get('/home', [ItemController::class, 'index'])->name('home');
    Route::get('/itens/create', [ItemController::class, 'store'])->name('itens.create');  
}
);


