<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    //get product list
    public function productList(){
        $products = Product::get();
        $users = User::get();

        $data = [
            'product' => [
                'productList' => [
                    'listing' => $products
                ],
            ],
            'user' => $users
        ];
        // return $data['product']['productList']['listing'][5]->name;
        // return $data['user'][0]->name;
        return response()->json($data , 200);
    }

    //get category lsit
    public function categoryList(){
        $categories = Category::get();

        return response ()->json($categories,200);
    }

    //get order list
    public function orderList(){
        $orderList = Order::get();
        $users = User::get();

        $data = [
            'orderList' => $orderList,
            'user'=>$users
        ];

        return response()->json($data,200);
    }

    //create category
    public function categoryCreate(Request $request){
        // dd($request->all());
        // dd($request->name);
        // dd($request->header('name'));
        $data = [
            'id'=> $request->id,
            'name' => $request->categoryName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $response = Category::create($data);
        return response()->json($response,200);
    }

    //create contact
    public function createContact(Request $request){
        $data = [
            'name' =>$request->name,
            'email'=>$request->email,
            'user_id'=>$request->userId,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = Contact::create($data);
        return response()->json($response,200);
    }

    //delete category
    public function deleteCategory($id){
        $data = Category::where('id',$id)->first();
        if(isset($data)){
            $data = Category::where('id',$id)->delete();
            return response()->json(['status'=> 'true','message'=>'delete success','deleteData' => $data],200);
        }
        return response()->json(['status'=> 'false','message'=>'These is no category'],500);

    }
    //category details
    public function categoryDetail(Request $request){
        $data = Category::where('id',$request->categoryId)->first();
        if(isset($data)){
            return response()->json(['status'=>'true','category'=>$data]);
        }
        return response()->json(['status'=>'true','category'=>'There is no category'],500);

    }

    //category update
    public function categoryUpdate(Request $request){
        $data = Category::where('id',$request->categoryId)->first();

        $categoryUpdate = [
            'name' => $request->categoryName,
            'id' => $request->categoryId
        ];

        if(isset($data)){
            Category::where('id',$request->categoryId)->update($categoryUpdate);
            $response = Category::where('id',$request->categoryId)->first();
            return response()->json(['status'=>'true','message'=>'category updated successfully','categoryUpdate' => $response]);
        }
        return response()->json(['status'=>'false','message'=>'There is no category'],500);


    }

    // //delete category
    // public function deleteCategory(Request $request){
    //     // return $request->all();
    //     $data = Category::where('id',$request->categoryId)->first();

    //     if(isset($data)){
    //         Category::where('id',$request->categoryId)->delete();
    //         return response ()->json(['status' => 'true','message' => 'delete Success'],200);

    //     }
    //     return response ()->json(['status' => 'fasle','message' => 'there is no Category '],200);

    // }


    //create subscribe data
    public function createSubscribe(Request $request){
        $data = $this->getSubscribeData($request);
        $subscribe = Subscribe::create($data);
        return response()->json($subscribe,200);
    }

    private function getSubscribeData($request){
        return [
            'name'=> $request->name,
            'user_id'=>$request->userId,
            'email'=>$request->email
        ];
    }

}
