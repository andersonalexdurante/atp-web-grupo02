<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function store(Request $request) {
        return User::create($request->all());
    }

    public function update(Request $request) {
        $usuario = auth()->user();
        
        if($request->email != null && $request->email != "") {
            $usuario->email = $request->email;    
        }
        if($request->phone != null && $request->phone != "") {
            $usuario->phone = $request->phone;    
        }

        $usuario->save();

        return response("Contatos alterados com sucesso.", 204);
    }

}
