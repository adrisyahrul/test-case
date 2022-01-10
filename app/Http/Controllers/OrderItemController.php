<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;
use Redirect,Response;

class OrderItemController extends Controller
{
    public function index(){
        $ord = Order_items::all();
        return view('orderitem.index',['ord' => $ord]);
    }
}
