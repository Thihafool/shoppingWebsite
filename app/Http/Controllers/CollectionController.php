<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CollectionController extends Controller
{
    //men's page
    public function menCollection()
    {
        $menProduct = Product::select('*')->where('category_id', '1')->get();
        return view('user.product.men', compact('menProduct'));
    }
    //women's page
    public function womenCollection()
    {
        $womenProduct = Product::select('*')->where('category_id', '2')->get();
        return view('user.product.women', compact('womenProduct'));
    }

    //kid's page
    public function kidCollection()
    {
        $kidProduct = Product::select('*')->where('category_id', '3')->get();
        return view('user.product.kid', compact('kidProduct'));
    }
    //wallet page
    public function walletCollection()
    {
        $wallet = Product::select('*')->where('category_id', '4')->get();
        return view('user.product.wallet', compact('wallet'));

    }
    //umbrella page
    public function umbrellaCollection()
    {
        $umbrella = Product::select('*')->where('category_id', '6')->get();
        return view('user.product.umbrella', compact('umbrella'));

    }
    //backpack page
    public function backpackCollection()
    {
        $backpack = Product::select('*')->where('category_id', '5')->get();
        return view('user.product.backpack', compact('backpack'));

    }
}
