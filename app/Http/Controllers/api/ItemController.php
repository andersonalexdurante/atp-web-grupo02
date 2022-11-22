<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class ItemController extends Controller
{
    public function index() {
        $userId = auth()->user()->id;
        
        return Item::where("idOwner", $userId)->get();
    }

    public function store(Request $request) {
        $item = new Item;
        $item->name = $request->name;
        $item->idOwner = $request->idOwner;
        $item->idReceiver = $request->idReceiver;
        $item->dateReturnForecast = $request->dateReturnForecast;
        $item->returned = false;

        $item->save();

        return $item;
    }

    public function show(Request $request) {
        $userId = auth()->user()->id;
        
        return Item::where([['idOwner', '=', $userId],
        ['id', '=', $request->item]])->firstOrFail();
    }

    public function update(Request $request) {
        $userId = auth()->user()->id; 

        $item = Item::where([['idOwner', '=', $userId],
        ['id', '=', $request->item]])->firstOrFail();

        $item->dateBorrowed = now();
        $item->returned = true;

        $item->save();

        return response("Item marcado como entregue.", 204);
    }
}
