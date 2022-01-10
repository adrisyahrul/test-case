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
    public function update($id)
    {
        $items = Item::find($id);
        return view('items.update', ['items' => $items]);
    }

    public function edit($id, Request $request)
    {
        $this->validate($request,[
            'code' => 'required',
            'name' => 'required'
        ]);
 
        $items = Item::find($id);
        $items->code = $request->code;
        $items->name = $request->name;
        $items->save();
        return redirect('/data/item');
    }
    public function delete($id)
    {
        $items = Item::find($id);
        $items->delete();
        return redirect()->back();
    }
}