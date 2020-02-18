<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id','session_id','product_id','product_name','description','product_quantity','product_price']; 

    protected $casts=['user_id'=>'String','session_id'=>'String','product_id'=>'Integer','product_name'=>'String','description'=>'text','product_quantity'=>'Integer','product_price'=>'double']; 


    function total() {
        return $this->product_price * $this->product_quantity;
    }
}
