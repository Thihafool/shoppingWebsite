<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //direct change password page
    public function changePasswordPage()
    {
        return view('admin.profile.change');
    }
    //change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);

        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id', $currentUserId)->first();

        $hashValue = $user->password;
        if (Hash::check($request->oldPassword, $hashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];

            $user = User::where('id', Auth::user()->id)->update($data);
            return back()->with(['changeSuccess' => 'Password change successfully']);
        }
        return back()->with(['notMatch' => 'Password does not match. Try again']);

    }

    //direct detail page
    public function details()
    {
        return view('admin.profile.details');
    }

    //edit page
    public function edit()
    {
        return view('admin.profile.edit');
    }

    //update
    public function update($id, Request $request)
    {
        $this->userValidationCheck($request);

        $data = $this->getUserData($request);

        if ($request->hasFile('image')) {

            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        }

        User::where('id', $id)->update($data);
        return redirect()->route('admin#details')->with(['updateSuccess' => 'Account updated successfully']);
    }

    //list page
    public function listPage()
    {
        $admin = User::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })
            ->paginate(5);
        return view('admin.profile.list', compact('admin'));
    }

    //delete admin
    public function delete($id)
    {
        User::where('id', $id)->delete();
        return back();
    }

    //contact page
    public function contact(){
        $contacts = Contact::orderBy('created_at','desc')->paginate('5');
        return view('admin.contact.contactList',compact('contacts'));
    }
    //subscribe page
    public function subscribe(){
        $subscribes = Subscribe::orderBy('created_at','desc')->paginate('5');
        return view('admin.contact.subscribeList',compact('subscribes'));
    }
    //orderList page
    public function orderList(){
        $orderList = Order::select('orders.*','users.name as user_name')
        ->leftJoin('users','users.id','orders.user_id')
        ->orderBy('created_at', 'desc')
        ->paginate('5');

        return view ('admin.product.orderList',compact('orderList'));
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
