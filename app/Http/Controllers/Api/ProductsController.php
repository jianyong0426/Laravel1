<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;


class ProductsController extends Controller
{
    public function index()
    {
        $products = \App\Product::orderBy('description')->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = \App\Product::find($id);
        if ($product == null) {
            return redirect(route('errorpage'));
        } else {
            return response()->json($product);
        }

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search != null) {
            $product = \App\Product::where('name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->get();
        } else {
            return response('success');
        }

        if (count($product) > 0) {
            return response()->json($product);
        } else {
            return response('success');
        }

    }
}
