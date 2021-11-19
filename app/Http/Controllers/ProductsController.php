<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        //make sure that only signed in user can post
        $this->middleware('auth',['except' => ['index']]);
    }

    public function index()
    {
        $products = Product::all();

        //dd($num_cart_items);
        //dd($products);
        return view('layouts.products',compact('products'));
    }


    public function store()
    {
        $data = request()->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category' => 'required',
            'description' => 'max:500',
            'image' => 'required|image|max:1999'
        ]);

        //dd(request()->all());
       //get filename with extension
       $filenameWithExt = request()->file('image')->getClientOriginalName();

       //get just filename
       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

       //get just extension
       $extension = request()->File('image')->getClientOriginalExtension();

       //filename to store
       $fileNameToStore = $filename.'_'.time().'.'.$extension;

       //upload image
       $path = request()->File('image')->storeAs('public/uploads',$fileNameToStore);

       //store the data into the database
        $product = new Product;

        $product->name = request('name');
        $product->price = request('price');
        $product->category = request('category');
        $product->description = request('description');
        $product->gallery = $fileNameToStore;

        $product->save();
        return redirect('/');
    }

}
