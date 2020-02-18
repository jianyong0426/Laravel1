<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = null;
        }

        $product = \App\Product::find($id);
        \App\CartItem::create([
            'session_id' => session()->getId(),
            'user_id' => $user_id,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'description' => $product->description,
            'product_quantity' => $request->input('quantity'),
            'product_price' => $product->price,
        ]);
        return redirect(route("products"));
    }

    public function show()
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $cart_items = \App\CartItem::where('user_id', $user_id)->get();

        } else {
            $cart_items = \App\CartItem::where('session_id', session()->getId())->get();
        }

        if (count($cart_items) <= 0) {
            return view('shoppingcart.blank');
        } else {
            $cart_total = 0;
            foreach ($cart_items as $item) {
                $cart_total += $item->total();
            }

            return view('shoppingcart.cartitem', [
                'cart_items' => $cart_items,
                'cart_total' => $cart_total,
            ]);
        }
    }

    public function delete($id)
    {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $cart_items = \App\CartItem::where('user_id', $user_id)->where('id', $id)->get();
        } else {
            $cart_items = \App\CartItem::where('session_id', session()->getId())->where('id', $id)->get();
        }
        foreach ($cart_items as $p) {

            $p->delete();

        }
        return redirect(route('showcart'));
    }

    public function update(Request $request)
    {
        foreach ($request->input('quantity') as $rowid => $value) {
            \App\CartItem::find($rowid)->update(['product_quantity' => $value]);
        }
        return redirect(route('showcart'));
    }

    public function checkout()
    {

        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $cart_items = \App\CartItem::where('user_id', $user_id)->get();
            return view('shoppingcart.checkout')->with(['cart_items' => $cart_items]);
        } else {
            return redirect(route('login'));
        }

    }

}
