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
        $orditem = Order_items::select('order_id', Order_items::raw('SUM(qty) as qtys'))
            ->groupBy('order_id')
            ->get();
        $querysatu = Order::join('customer', 'customer.code', '=', 'order.customer')
            ->get();
        return view('home.index', ['querysatu' => $querysatu]);
        
    }
    
    // public function index(){
    //     $querysatu = Order::all();
    //     return view('home.index', ['querysatu'=>$querysatu ]);
    // }
}
