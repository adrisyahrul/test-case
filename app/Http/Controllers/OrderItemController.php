<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;
use App\Models\Order;
use App\Models\Item;
use Redirect,Response;

class OrderItemController extends Controller
{
    public function index(){
        $ord = Order_items::all();
        $order = Order::all();
        $item = Item::all();
        return view('orderitem.index',['ord' => $ord, 'item' => $item, 'order' => $order]);
    }
    public function find(Request $request)
    {
        $data = Order_items::find($request->id);

        return response()->json([
            "data" => $data
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'order_id'  => 'required',
            'item_id'   => 'required',
            'qty'       => 'required',
            'price'     => 'required',
            'total'     => 'required'
        ]);

        Order_items::create([
            'order_id'  => $request->order_id,
            'item_id'   => $request->item_id,
            'qty'       => $request->qty,
            'price'     => $request->price,
            'total'     => $request->total
        ]);

        return redirect('/transaction/orderitem');
    }
    public function edit(Request $request)
    {
        $this->validate($request,[
            'id'        => 'required',
            'order_id'  => 'required',
            'item_id'   => 'required',
            'qty'       => 'required',
            'price'     => 'required',
            'total'     => 'required'
        ]);

        $ord = Order_items::find($request->id);
        $ord->order_id = $request->date;
        $ord->item_id = $request->item_id;
        $ord->qty = $request->qty;
        $ord->price = $request->price;
        $ord->total = $request->total;
        $ord->save();
        return redirect('/transaction/orderitem');
    }
    public function delete(Request $request)
    {
        $ord = Order_items::find($request->id);
        $ord->delete();
        
        return response()->json([
            "success" => true
        ]);
    }
}
