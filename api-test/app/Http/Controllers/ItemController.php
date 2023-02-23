<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $postArray = $request->all();
        $store_item = Item::create($postArray);
        $success['item'] =  $store_item->item;
        return response()->json([
            'status' => 'success',
            'data' => $success,
        ]);
    }

    public function getItem(){
        $list = DB::table('items')->distinct()->get();
        return response()->json([
            'status' => 'success',
            'data' => $list
        ]);
    }
}
