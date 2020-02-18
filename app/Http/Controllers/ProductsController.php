<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = \App\Product::orderBy('description')->get();
        return view("products")->with(['products' => $products]);
    }

    public function show($id)
    {
        $product = \App\Product::find($id);
        if ($product == null) {
            return redirect(route('errorpage'));
        } else {
            return view("product")->with(['product' => $product]);
        }

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search != null) {
            $product = \App\Product::where('name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->get();
        } else {
            return view('blanksearch');
        }

        if (count($product) > 0) {
            return view("search")->with(['product' => $product, 'search' => $search]);
        } else {
            return view('blanksearch');
        }

    }
}
