<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //cart page
    public function cartPage()
    {
        $id = Auth::user()->id;
        $cartList = Cart::select('carts.*','products.name as product_name','products.image as product_image','products.price as product_price')
        ->leftJoin('products','carts.product_id','products.id')
        ->where('user_id',$id)->get();

        $totalPrice = 0;
        foreach($cartList as $c){
            $totalPrice += $c->product_price * $c->qty;
        }


        return view('user.cart.cartPage',compact('cartList','totalPrice'));
    }

}
