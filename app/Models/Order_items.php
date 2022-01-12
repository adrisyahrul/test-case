<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $table = "order_item";
    protected $fillable = ['id','order_id', 'item_id','qty', 'price', 'total'];
    
    public function orderr()
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }
    public function itemm()
    {
    	return $this->belongsTo(Item::class, 'item_id');
    }
}
