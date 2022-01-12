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
    		'discount' => 'required'
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
    
}
