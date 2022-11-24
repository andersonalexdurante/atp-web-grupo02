<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Item;

class HomeController extends Controller
{
    public function index(){
        $itens = Item::all();
        return view('home', ['itens' => $itens]);
    }
}
