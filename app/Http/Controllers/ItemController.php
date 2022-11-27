<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class ItemController extends Controller
{
    public function index() {
        $user = Auth::user();
        // itens que são do dono e que são returned == 0
        $itens = Item::where('idOwner', $user?->id)->where('returned', 0)->get();
        return view('welcome', ['itens' => $itens]);
    }

    public function delivered() {
        $user = Auth::user();
        // itens que são do dono e que são returned == 0
        $itens = Item::where('idOwner', $user?->id)->where('returned', 1)->get();
        return view('itens.delivered', ['itens' => $itens]);
    }

    public function create() {
        $user = Auth::user();
        // todos os usuarios menos o logado
        $users = User::where("id", "!=", $user?->id)->get();
        return view('itens.create', ['users' => $users]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contactReceiver' => ['required', 'string', 'max:255'],
            'nameReceiver' => ['required', 'string', 'max:255'],
        ],[
            'name.required' => 'O nome do item é obrigatório',
            'contactReceiver.required' => 'O contato do receptor é obrigatório',
            'nameReceiver.required' => 'O nome do receptor é obrigatório',
        ]);


        $item = new Item;
        $item->name = $request->name;
        $item->idOwner = Auth::user()->id;
        $item->contactReceiver = $request->contactReceiver;
        $item->nameReceiver = $request->nameReceiver;
        $item->dateReturnForecast = $request->dateReturnForecast;
        $item->dateBorrowed = now();
        $item->returned = false;

        $item->save();

        return redirect()->route('view.home');
    }

    public function show(Request $request) {
        $userId = auth()->user()->id;
        
        $item = Item::where([['idOwner', '=', $userId],
        ['id', '=', $request->item]])->firstOrFail();

        return view('itens.show', ['item' => $item]);
        
    }

    public function update(Request $request) {
        $userId = auth()->user()->id;

        $item = Item::where([['idOwner', '=', $userId],
        ['id', '=', $request->item]])->firstOrFail();

        $item->dateReturned = now();
        $item->returned = true;

        $item->save();

        return redirect()->route('view.home');
    }
}
