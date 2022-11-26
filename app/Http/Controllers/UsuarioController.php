<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function update(Request $request) {
        $usuario = auth()->user();
        
        if($request->email != null && $request->email != "") {
            $usuario->email = $request->email;    
        }
        if($request->phone != null && $request->phone != "") {
            $usuario->phone = $request->phone;    
        }

        $usuario->save();
        

        return redirect()->route('view.home');
    }

    public function edit(Request $request) {
        return view('auth.update');
    }
}
