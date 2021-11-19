<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store() 
    {
        $uid = auth()->user()->id;
        $pid = request('pid');
        $pname = request('pname');
        $pprice = request('pprice');
        $pimage = request('pimage');


        $item = DB::table('cart')->where('pid',$pid)->first();
        if (!$item)
         {
             //cart item does not exist
             //add the cart items
             $data = array('uid'=>$uid,'pid'=>$pid,'pname'=>$pname,'pprice'=>$pprice,'pimage'=>$pimage);
             DB::table('cart')->insert($data);

            echo "<div class='alert alert-success alert-dismissible mt-2'>
            <span type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></span>
            <strong>Success!</strong> Item added to your cart
          </div>"; 
        }
        else
        {
            //cart item already exists
            echo "<div class='alert alert-danger alert-dismissible mt-2'>
            <span type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></span>
            <strong>Failed!</strong> Item already added to your cart
          </div>";

        }

    }

    public function index()
    {
        $cart = DB::select('select * from cart where uid = ?', [auth()->user()->id]);
        $num_cart_items = count($cart);
        ($num_cart_items > 0) ? '':$num_cart_items=0;

        echo "<span id='cartcount'>($num_cart_items)</span>";

    }

    public function update()
    {
        //compute update qty and total price
    }

    public function show()
    {
        //method shows whatever is in the cart table
        $cart = DB::select('select * from cart where uid = ?', [auth()->user()->id]);
        return view('layouts.cart',compact($cart));
    }
}