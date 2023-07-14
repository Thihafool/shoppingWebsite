<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //home page
    public function home()
    {
        $menProduct = Product::select('*')->where('category_id', '1')->get();
        $womenProduct = Product::select('*')->where('category_id', '2')->get();
        $kidProduct = Product::select('*')->where('category_id', '3')->get();

        return view('user.home', compact('menProduct', 'womenProduct', 'kidProduct'));
    }

    //about page
    public function about()
    {
        return view('user.feature.about');
    }

    //contact page
    public function contact()
    {
        return view('user.feature.contact');
    }
    //account info
    public function info()
    {
        return view('user.profile.detail');
    }

    //account update
    public function update($id, Request $request)
    {
        $this->userValidationCheck($request);
        $data = $this->getUserData($request);

        if ($request->hasFile('image')) {

            $dbOldImage = User::where('id', $id)->first();
            $dbOldImage = $dbOldImage->image;

            if ($dbOldImage != null) {
                Storage::delete('public/' . $dbOldImage);
            }
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $fileName);
            $data['image'] = $fileName;
        }
        User::where('id', $id)->update($data);
        return back();

    }

    //user change password page
    public function changePage()
    {
        return view('user.profile.changePassword');
    }
    //change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);

        $currentId = Auth::user()->id;

        $user = User::select('password')->where('id', $currentId)->first();
        $hashValue = $user->password;

        if (Hash::check($request->oldPassword, $hashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];

            $user = User::where('id', $currentId)->update($data);
            return back();
        }
    }

    //request user data
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,

        ];
    }
    //user data validation check
    private function userValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file',
        ])->validate();
    }

    //password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6|max:10',
            'newPassword' => 'required|min:6|max:10',
            'confirmPassword' => 'required|min:6|max:10|same:newPassword',
        ])->validate();
    }

}
