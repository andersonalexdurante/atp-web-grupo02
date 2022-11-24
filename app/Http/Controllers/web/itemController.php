<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\User;

class ItemController extends Controller
{
    public function create(){
        $users = User::all();
        return view('itens/create', ['users' => $users]);
    }
}
