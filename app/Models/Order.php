<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";
 
    public function cust()
    {
    	return $this->belongsTo(Customer::class, 'code');
    }

    public function orderitem()
    {
    	return $this->hasMany('App\Models\Order_items', 'foreign_key');
    }
}
