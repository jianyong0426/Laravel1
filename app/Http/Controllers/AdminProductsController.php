<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AdminProductsController extends Controller
{
    //
    public function index(){
        $products=\App\Product::orderBy('name')->get();
        return view("admin.products")->with(['products' => $products]);        
    }
/*
    public function __construct()
    {
        $this->middleware(function($request,$next){
        if(!auth()->check() || auth()->user()->isAdmin){
            redirect()->route('login')->send();
            exit;
        }
        return $next($request);
        });
    }
*/
    public function edit($id){
        if($id==0){
            $product = new \App\Product();
            $product->id = 0;
        }

        else{
        $product=\App\Product::find($id);   
        }
        return view("admin.products_edit")->with(['product'=>$product]);
    }

    public function save(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => "required|max:30",
            'price' => "required|numeric"
        ],[
            'name.required' => "The name is required",
            'name.max' => "The name may not exceed 30 characters",
            'price.required' => "The price is required",
            'price.numeric' => "The price may only contain numbers"
        ]);
        $validator->validate();
        $data = $request->all();
        if($request->file('photo')){
            $images = [];
            foreach($request->file('photo') as $file){
            $path = $file->move('storage/products', $file->getClientOriginalName());
            array_push($images,$path->getPathName());
            }
            $data['image_url'] = $images;

        }

        if($id==0){
            \App\Product::create($data);
        }
        else{
        $product=\App\Product::find($id);
        $product->update($data);
        }
        return redirect(route('admin.products'));
    }

    public function delete($id){
        $product=\App\Product::find($id);
        $product ->delete();
        return redirect(route('admin.products'));

    }

}
