<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\Customer;
use Redirect,Response;

class QueryController extends Controller
{
    public function index(){
        $querysatu = Order::get();
        return view('home.index', ['querysatu' => $querysatu]);
    }

    public function dua(){
        $querydua = Order::get();
        return view('home.dua', ['querydua' => $querydua]);
    }

    public function tiga(){
        $querytiga = Order::get();
        return view('home.tiga', ['querytiga' => $querytiga]);
    }
}
