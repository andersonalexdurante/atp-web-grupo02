<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
