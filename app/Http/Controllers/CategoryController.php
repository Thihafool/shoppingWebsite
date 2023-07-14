<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function listPage()
    {

        $categories = Category::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })->orderBy('id', 'desc')->paginate(4);

        return view('admin.category.list', compact('categories'));
    }

    //direct category create page
    public function createPage()
    {
        return view('admin.category.create');
    }

    //category create
    public function create(Request $request)
    {
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::create($data);
        return redirect()->route('category#listPage');
    }

    //category delete
    public function delete($id)
    {

        Category::where('id', $id)->delete();
        return back()->with(['categoryDelete' => 'Category Deleted Successfully']);
    }

    //category edit
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    //category update
    public function update(Request $request)
    {

        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        $id = $request->categoryId;

        Category::where('id', $id)->update($data);
        return redirect()->route('category#listPage');
    }

    //category validation check
    private function categoryValidationCheck($request)
    {
        Validator::make($request->all(),
            [
                'categoryName' => 'required|unique:categories,name,' . $request->categoryId,
            ])->validate();
    }

    //request category data
    private function requestCategoryData($request)
    {
        return [
            'name' => $request->categoryName,
        ];
    }
}