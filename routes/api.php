<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RouteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//product list
Route::get('product/list',[RouteController::class,'productList']);

//category list
Route::get('category/list',[RouteController::class,'categoryList']);

//orderList
Route::get('order/list',[RouteController::class,'orderList']);

//add category data
Route::post('create/category',[RouteController::class,'categoryCreate']);
//add contact data
Route::post('create/contact',[RouteController::class,'createContact']);
//add subscribe data
Route::post('create/subscribe',[RouteController::class,'createSubscribe']);


//delete category
Route::get('delete/category/{id}',[RouteController::class,'deleteCategory']);
Route::post('delete/category',[RouteController::class,'deleteCategory']);


//detail category
Route::post('category/details',[RouteController::class,'categoryDetail']);

//update category
Route::post('category/update',[RouteController::class,'categoryUpdate']);
