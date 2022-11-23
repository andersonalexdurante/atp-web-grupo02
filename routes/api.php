<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\UsuarioController;
use \App\Http\Controllers\api\ItemController;
use \App\Http\Controllers\api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group( function() {
    Route::patch('usuario', [UsuarioController::class, "update"]);
    Route::get('usuario/itens', [ItemController::class, 'index']);
    Route::post('usuario/itens', [ItemController::class, 'store']);
    Route::get('usuario/itens/{item}', [ItemController::class, 'show']);
    Route::patch('usuario/itens/{item}', [ItemController::class, 'update']);
}
);

Route::post('/login', [AuthController::class, "authenticate"]);
Route::post('/usuario', [UsuarioController::class, "store"]);
