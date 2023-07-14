<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //add to cart
    public function addToCart(Request $request)
    {
        $data = $this->getOrderData($request);
        Cart::create($data);

        $response = [
            'status' => 'success',
            'message' => 'Add to cart successfully'
        ];
        return response ()-> json($response,200);
    }

    //create order
    public function order(Request $request){
        $total = 0;
        foreach($request->all() as $item){
            $data = OrderList::create([
                'user_id' => $item['user_id'],
                'product_id'=> $item['product_id'],
                'qty' => $item['qty'],
                'total' => $item['total'],
                'order_code' => $item['order_code']
            ]);
            $total += $data->total;

        }
        Cart::where('user_id', Auth::user()->id)->delete();

        Order::create([
            'user_id'=>Auth::user()->id,
            'order_code'=>$data->order_code,
            'total_price' => $total + 5000
        ]);
        $response = [
            'status' => 'success'
        ];
        return response()->json($response,200);

    }

    //clear the whole cart
    public function clearCart(){
        Cart::where('user_id',Auth::user()->id)->delete();
    }


    //clear current product
    public function clearCurrent(Request $request){
        Cart::where('user_id',Auth::user()->id)
        ->where('product_id',$request->productId)
        ->where('id',$request->orderId)
        ->delete();
    }


    //increase view count
    public function viewCount(Request $request){

        logger($request->all());
        $product = Product::where('id',$request->productId)->first();
        logger($product);
        $viewCount = [
            'view_count'=> $product->view_count +1
        ];
        Product::where('id',$request->productId)->update($viewCount);


    }

    //get order data
    private function getOrderData($request){
        return [
            'user_id'=>$request->userId,
            'product_id'=>$request->productId,
            'qty'=>$request->qty,
        ];
    }


}
