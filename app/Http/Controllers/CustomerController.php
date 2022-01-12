<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Redirect,Response;

class CustomerController extends Controller
{
    public function index()
    {
        //
        $cust = Customer::all();
 
    	// mengirim data pegawai ke view pegawai
    	return view('customers.index', ['cust' => $cust]);
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
    public function update($id)
    {
        $cust = Customer::find($id);
        return view('customers.update', ['cust' => $cust]);
    }

    public function edit($id, Request $request)
    {
        $this->validate($request,[
            'code' => 'required',
            'name' => 'required'
        ]);
 
        $customer = Customer::find($id);
        $customer->code = $request->code;
        $customer->name = $request->name;
        $customer->save();
        return redirect('/data/customer');
    }
    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back();
    }
}
