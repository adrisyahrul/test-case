<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = ['id','code', 'name'];

    public function orderitemm()
    {
    	return $this->hasMany('App\Models\Order_items');
    }
}
