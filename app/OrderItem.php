<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id','product_name','description','quantity'];
    protected $casts = ['order_id' => 'String', 'product_name' => 'String', 'description' => 'String', 'quanity' => 'Integer'];
}
