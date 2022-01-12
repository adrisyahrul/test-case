<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Redirect,Response;

class OrderController extends Controller
{
    public function index(){
   	    $ord = Order::all();
    	return view('order.index',['ord' => $ord]);
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
    public function update($id)
    {
        $ord = Order::find($id);
    	return view('order.update',['ord' => $ord]);
    }

    public function edit($id, Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
    		'customer_id' => 'required',
    		'subtotal' => 'required',
    		'discount' => 'required',
    		'total' => 'required'
        ]);
 
        $ord = Order::find($id);
        $ord->date = $request->date;
        $ord->customer_id = $request->customer_id;
        $ord->subtotal = $request->subtotal;
        $ord->discount = $request->discount;
        $ord->total = $request->total;
        $customer->save();
        return redirect('/transaction/order');
    }
	public function delete($id)
    {
        $ord = Order::find($id);
        $ord->delete();
        return redirect()->back();
    }
}
