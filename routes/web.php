<?php

use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/itens/create', [ItemController::class, 'create'])->name('itens.create');

Route::get('/login', function () {
    return view('usuarios/login');
});

Route::get('/registrar', function () {
    return view('usuarios/register');
});
