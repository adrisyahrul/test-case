<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Redirect,Response;

class OrderController extends Controller
{
    public function index(){
   	    $ord = Order::all();
        $cust = Customer::all();
    	return view('order.index',['ord' => $ord, 'cust' => $cust]);
    }
    public function find(Request $request)
    {
        $data = Order::find($request->id);

        return response()->json([
            "data" => $data
        ]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'date' => 'required',
    		'customer_id' => 'required',
    		'subtotal' => 'required',
    		'discount' => 'required',
    		'total' => 'required'
    	]);
 
        Order::create([
    		'date' => $request->date,
    		'customer_id' => $request->customer_id,
    		'subtotal' => $request->subtotal,
    		'discount' => $request->discount,
    		'total' => $request->total
    	]);
 
    	return redirect('/transaction/order');
    }
    public function edit(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'date' => 'required',
    		'customer_id' => 'required',
    		'subtotal' => 'required',
    		'discount' => 'required',
    		'total' => 'required'
        ]);
 
        $ord = Order::find($request->id);
        $ord->date = $request->date;
        $ord->customer_id = $request->customer_id;
        $ord->subtotal = $request->subtotal;
        $ord->discount = $request->discount;
        $ord->total = $request->total;
        $ord->save();
        return redirect('/transaction/order');
    }
    public function delete(Request $request)
    {
        $ord = Order::find($request->id);
        $ord->delete();
        
        return response()->json([
            "success" => true
        ]);
    }
}
