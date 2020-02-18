<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Mail;

class AdminOrdersController extends Controller
{
//
    public function index()
    {
        $orders = DB::table('orders')->get();
        return view('admin.orders')->with(['orders' => $orders]);
    }

    public function show($id)
    {
        $orderitems = \App\OrderItem::where('order_id', $id)->get();
        return view('admin.show_order_details', [
            'order_id' => $id,
            'orderitems' => $orderitems,
        ]);
    }

    public function save(Request $request, $id)
    {
        $orders = \App\Order::find($id);
        $orders->update([
            'status' => 'Shipped',
        ]);

        Mail::to('liewjy-pm18@student.tarc.edu.my')->send(new \App\Mail\OrderStatus());
        return redirect(route('admin.orders'));
    }
}
