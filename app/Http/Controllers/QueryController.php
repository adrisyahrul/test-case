<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\Customer;
use App\Models\Item;
use Redirect,Response;

class QueryController extends Controller
{
    public function index(){
        $querysatu = Order::get();
        return view('home.index', ['querysatu' => $querysatu]);
    }

    public function dua(){
        $querydua = Order::groupBy('date')->groupBy('customer_id')->get();
        return view('home.dua', ['querydua' => $querydua]);
    }

    public function tiga(){
        $querytiga = Item::get();
        return view('home.tiga', ['querytiga' => $querytiga]);
    }
}
