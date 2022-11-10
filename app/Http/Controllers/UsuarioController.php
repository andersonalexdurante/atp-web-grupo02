<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Item;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        dd($usuarios);
        return view('welcome');
    }
}
