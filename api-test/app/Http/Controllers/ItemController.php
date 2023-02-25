<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
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

        if($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'The Items is empty Please Add Items'], 404);
        }
    }

    public function update($id, Request $request){
        $update = Item::find($id);
        $update->status = $request->status;
        $update->update();
        return response()->json([
            'status' => 'success',
            'data' => $update,
        ]);
    }
}
