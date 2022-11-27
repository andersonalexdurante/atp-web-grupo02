<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller

{
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'O Email é obrigatório',
            'email.email' => 'O Email é inválido',
            'password.required' => 'A Senha é obrigatória'
        ]);
        
        if (auth()->attempt($credentials)) {
            return redirect()->route("home");
        }
        return back()->withErrors(['login' => 'Erro ao realizar login']);
    }

    public function register(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:11'],
            'password' => ['required', 'string', 'min:8', 'max:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'max:8'],
        ], [
            'name.required' => 'O Nome é obrigatório',
            'name.string' => 'O Nome é inválido',
            'name.max' => 'O Nome deve ter no máximo 255 caracteres',
            'email.required' => 'O Email é obrigatório',
            'email.string' => 'O Email é inválido',
            'email.email' => 'O Email é inválido',
            'email.max' => 'O Email deve ter no máximo 255 caracteres',
            'email.unique' => 'O Email já está em uso',
            'phone.required' => 'O Telefone é obrigatório',
            'phone.string' => 'O Telefone é inválido',
            'phone.max' => 'O Telefone deve ter no máximo 11 caracteres',
            'password.required' => 'A Senha é obrigatória',
            'password.string' => 'A Senha é inválida',
            'password.min' => 'A Senha deve ter no mínimo 8 caracteres',
            'password.max' => 'A Senha deve ter no máximo 8 caracteres',
            'password.confirmed' => 'As senhas não conferem',
            'password_confirmation.required' => 'A Confirmação de Senha é obrigatória',
            'password_confirmation.string' => 'A Confirmação de Senha é inválida',
            'password_confirmation.min' => 'A Confirmação de Senha deve ter no mínimo 8 caracteres',
            'password_confirmation.max' => 'A Confirmação de Senha deve ter no máximo 8 caracteres',
        ]);
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone
            ]
        );

        Auth::login($user);

        return redirect()->route("view.home");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route("login");
    }
}
