<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','name','address','postcode','city','country','phone','status'];

    protected $casts = ['user_id' => 'String','name'=>'String', 'address'=>'String', 'postcode'=>'String', 'country'=>'String', 'phone'=>'String','status'=>'String'];

    function items() {
        return $this->hasMany('\App\OrderItem', 'order_id', 'id');
    }
}
