<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Redirect,Response;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
 
    	return view('items.index', ['items' => $items]);
    }
    public function find(Request $request)
    {
        $data = Item::find($request->id);

        return response()->json([
            "data" => $data
        ]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'code' => 'required',
    		'name' => 'required'
    	]);
 
        Item::create([
    		'code' => $request->code,
    		'name' => $request->name
    	]);
 
    	return redirect('/data/item');
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'code' => 'required',
            'name' => 'required'
        ]);
 
        $items = Item::find($request->id);
        $items->code = $request->code;
        $items->name = $request->name;
        $items->save();
        return redirect('/data/item');
    }
    public function delete(Request $request)
    {
        $items = Item::find($request->id);
        $items->delete();
        
        return response()->json([
            "success" => true
        ]);
    }
}