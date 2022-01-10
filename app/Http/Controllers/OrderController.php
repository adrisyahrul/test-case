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
}
