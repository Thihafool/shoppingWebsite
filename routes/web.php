<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;


Route::middleware('admin_auth')->group(function () {
    //Login , Register
    Route::redirect('/', 'login');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');

});

Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['admin_auth'])->group(function () {

        //category
        Route::prefix('category')->group(function () {
            //category create, delete, update
            Route::get('list', [CategoryController::class, 'listPage'])->name('category#listPage');
            Route::get('create', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('category#update');

        });

        //admin account
        Route::prefix('admin')->group(function () {

            //admin change password
            Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#passwordChangePage');
            Route::post('passwordChange', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            //admin account details
            Route::get('details', [AdminController::class, 'details'])->name('admin#details');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');

            //show all admin list
            Route::get('list', [AdminController::class, 'listPage'])->name('admin#listPage');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin#delete');

            //contact data list
            Route::get('contact', [AdminController::class, 'contact'])->name('admin#contact');
            //subscribed data list
            Route::get('subscribe',[AdminController::class,'subscribe'])->name('admin#subscribe');
            //orderList
            Route::get('orderList',[AdminController::class,'orderList'])->name('admin#orderList');
        });

        Route::prefix('products')->group(function () {

            //product create , delete , update
            Route::get('list', [ProductController::class, 'listPage'])->name('product#list');
            Route::get('create', [ProductController::class, 'createPage'])->name('product#createPage');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::post('update', [ProductController::class, 'update'])->name('product#update');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
        });

    });

    //user
    //home
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        //homePage
        Route::get('home', [UserController::class, 'home'])->name('user#home');
        //aboutPage
        Route::get('about', [UserController::class, 'about'])->name('user#about');
        //contactPage
        Route::get('contact',[Usercontroller::class,'contact'])->name('user#contact');
        Route::post('contact',[ContactController::class,'contacting'])->name('user#contacting');
        //subscribe
        Route::post('subscribe',[ContactController::class,'subscribe'])->name('user#subscribe');

        Route::prefix('collection')->group(function () {
            //productCollection for all category
            Route::get('menCollection', [CollectionController::class, 'menCollection'])->name('user#menCollection');
            Route::get('womenCollection', [CollectionController::class, 'womenCollection'])->name('user#womenCollection');
            Route::get('kidCollection', [CollectionController::class, 'kidCollection'])->name('user#kidCollection');
            Route::get('walletCollection', [CollectionController::class, 'walletCollection'])->name('user#walletCollection');
            Route::get('umbrellaCollection', [CollectionController::class, 'umbrellaCollection'])->name('user#umbrellaCollection');
            Route::get('backpackCollection', [CollectionController::class, 'backpackCollection'])->name('user#backpackCollection');

        });
        Route::prefix('account')->group(function () {

            //account update and change password
            Route::get('info', [UserController::class, 'info'])->name('user#accountInfo');
            Route::post('update/{id}', [UserController::class, 'update'])->name('user#accountUpdate');
            Route::get('changePassword', [UserController::class, 'changePage'])->name('user#changePassPage');
            Route::post('changePassword', [UserController::class, 'changePassword'])->name('user#changePassword');
        });

        Route::prefix('product')->group(function () {
            //cart list page
            Route::get('cart', [CartController::class, 'cartPage'])->name('product#cart');
        });
        Route::prefix('detail')->group(function () {

            //product detail page for all category
            Route::get('backpack/{id}', [DetailController::class, 'backpack'])->name('detail#backpack');
            Route::get('kid/{id}', [DetailController::class, 'kid'])->name('detail#kid');
            Route::get('wallet/{id}', [DetailController::class, 'wallet'])->name('detail#wallet');
            Route::get('umbrella/{id}', [DetailController::class, 'umbrella'])->name('detail#umbrella');
            Route::get('men/{id}', [DetailController::class, 'men'])->name('detail#men');
            Route::get('women/{id}', [DetailController::class, 'women'])->name('detail#women');

        });
        Route::prefix('ajax')->group(function () {
            //ajax addToCart, order, clearCart, viewCount
            Route::get('addToCart', [AjaxController::class, 'addToCart'])->name('ajax#addToCart');
            Route::get('order',[AjaxController::class,'order'])->name('ajax#order');
            Route::get('clear/currentProduct',[AjaxController::class,'clearCurrent'])->name('ajax#clearCurrent');
            Route::get('clear/cart', [AjaxController::class, 'clearCart'])->name('ajax#clearCart');
            Route::get('viewCount/increase',[AjaxController::class,'viewCount'])->name('ajax#increaseViewCount');
        });

    });

});
