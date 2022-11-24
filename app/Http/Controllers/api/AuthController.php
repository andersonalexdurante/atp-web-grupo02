<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cookie;

class AuthController extends Controller

{
    public function authenticate(Request $request) {
        $credentials = $request->only(['email', 'password']);
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = auth()->user()->createToken('MyApiToken')->plainTextToken;

        Cookie::create("access_token", "Bearer". ' '.$token);
        
        return redirect()->route("home")->header("access_token", Cookie::get("access_token"));
    }

}
