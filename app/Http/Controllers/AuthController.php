<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //dashboard
    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('category#listPage');
        } else {
            return redirect()->route('user#home');
        }
    }

    //direct login page
    public function loginPage()
    {
        return view('auth.login');
    }

    //direct register page
    public function registerPage()
    {
        return view('auth.register');
    }

}