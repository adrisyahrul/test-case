<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Redirect,Response;

class CustomerController extends Controller
{
    public function index()
    {
        $cust = Customer::all();
 
    	return view('customers.index', ['cust' => $cust]);
    }
    public function find(Request $request)
    {
        $data = Customer::find($request->id);

        return response()->json([
            "data" => $data
        ]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'code' => 'required',
    		'name' => 'required'
    	]);
 
        Customer::create([
    		'code' => $request->code,
    		'name' => $request->name
    	]);
 
    	return redirect('/data/customer');
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'code' => 'required',
            'name' => 'required'
        ]);
 
        $customer = Customer::find($request->id);
        $customer->code = $request->code;
        $customer->name = $request->name;
        $customer->save();
        return redirect('/data/customer');
    }
    public function delete(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        
        return response()->json([
            "success" => true
        ]);
    }
}
