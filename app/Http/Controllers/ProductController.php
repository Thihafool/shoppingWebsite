<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct product list
    public function listPage()
    {
        $product = Product::select('products.*', 'categories.name as category_name')
            ->when(request('key'), function ($query) {
                $query->where('products.name', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.id', 'desc')
            ->paginate(5);
        return view('admin.product.list', compact('product'));
    }

    //direct product create page
    public function createPage()
    {
        $categories = Category::get();

        return view('admin.product.create', compact('categories'));
    }

    //product create
    public function create(Request $request)
    {
        $this->productValidationCheck($request, 'create');

        $data = $this->getProductData($request);

        $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public/' . $fileName);
        $data['image'] = $fileName;

        Product::create($data);

        return redirect()->route('product#list');
    }
    //product edit page
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.edit', compact('product', 'category'));
    }
    //product update
    public function update(Request $request)
    {
        $id = $request->productId;

        $this->productValidationCheck($request, 'update');
        $data = $this->getProductData($request);

        if ($request->hasFile('productImage')) {
            $dbImage = Product::select('image')->where('id', $id)->first();
            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }
            $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/' . $fileName);
            $data['image'] = $fileName;
        }
        Product::where('id', $id)->update($data);
        return redirect()->route('product#list');

    }

    //delete product
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return back();
    }

    //get product data
    private function getProductData($request)
    {
        return [
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
            'waiting_time' => $request->productWaitingTime,
            'category_id' => $request->productCategory,
        ];
    }

    //product validation check
    private function productValidationCheck($request, $status)
    {
        $validationRule = [
            'productName' => 'required|min:5|unique:products,name,' . $request->productId,
            'productDescription' => 'required|min:10',
            'productPrice' => 'required',
            'productWaitingTime' => 'required',
            'productCategory' => 'required',
        ];

        $validationRule['productImage'] = $status == 'create' ? 'required|mimes:jpg,jpeg,png,webp' : 'mimes:jpg,png,jpeg,webp';
        Validator::make($request->all(), $validationRule)->validate();
    }
}