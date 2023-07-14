<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //contact with us
    public function contacting(Request $request){

        $this->contactValidationCheck($request);
        $data = $this->getContactData($request);

        Contact::create($data);
        return back();

    }
    //subscribe
    public function subscribe (Request $request){
        $this->subscribeValidationCheck($request);
        $data = $this->getSubscribeData($request);

        Subscribe::create($data);
        return back();
    }


    //get contact data
    private function getContactData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'user_id'=>$request->userId,
            'message' => $request->message
        ];
    }
    //contactData validation check
    private function contactValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'message'=> 'required|min:6'
        ])->validate();
    }

    //get data for subscription
    private function getSubscribeData($request){
        return [
            'name'=> $request->name,
            'email'=>$request->email,
            'user_id'=>$request->userId
        ];
    }

    //subscribe validation check
    private function subscribeValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:subscribes,email',
        ])->validate();
    }

}
