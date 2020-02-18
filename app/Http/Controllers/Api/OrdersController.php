<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Validator;
use  App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //
    public function payment(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => "required|alpha",
            'address'=> "required",
            'postcode' => "required|numeric",
            'city' => "required",
            'country' => "required",
            'phone' => "required"
        ],[
            'name.required' => "The name is required",
            'name.alpha' => "The name can be only characters",
            'address.required' => "The address is required",
            'postcode.required' => "The postcode is required",
            'city.required' => "The city is required",
            'country.required' => "The country is required",
            'phone.required' => "The Phone number is required"
        ]);
        $validator->validate();
        
        $order=\App\Order::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone

        ]);
        
        $cart_items = \App\CartItem::where('user_id',auth()->user()->id)->get();
        
        foreach($cart_items as $c){
        \App\OrderItem::create([
            'order_id' => $order->id,
            'product_name' => $c->product_name,
            'description' =>$c->description,
            'quantity' => $c->product_quantity    
        ]);

        $c->delete();
        }
        return response('success');
    }

    public function show(){
        if(auth()->check()){
            $orders = \App\Order::with('items')->where('user_id',auth()->user()->id)->get();
            return response()->json($orders);
        }
        else
            return response('success');

    }
}
