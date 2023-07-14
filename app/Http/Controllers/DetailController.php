<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DetailController extends Controller
{
    //backpack
    public function backpack($id)
    {
        $backpack = Product::where('category_id', '5')->where('id', $id)->first();
        return view('user.detail.backpack', compact('backpack'));
    }
    //umbrella
    public function umbrella($id)
    {
        $umbrella = Product::where('category_id', '6')->where('id', $id)->first();
        return view('user.detail.umbrella', compact('umbrella'));
    }
    //kid
    public function kid($id)
    {
        $kid = Product::where('category_id', '3')->where('id', $id)->first();
        return view('user.detail.kid', compact('kid'));
    }
    //wallet
    public function wallet($id)
    {
        $wallet = Product::where('category_id', '4')->where('id', $id)->first();
        return view('user.detail.wallet', compact('wallet'));
    }
    //men
    public function men($id)
    {
        $men = Product::where('category_id', '1')->where('id', $id)->first();
        return view('user.detail.men', compact('men'));
    }
    //women
    public function women($id)
    {
        $women = Product::where('category_id', '2')->where('id', $id)->first();
        return view('user.detail.womanDetail', compact('women'));
    }
}
