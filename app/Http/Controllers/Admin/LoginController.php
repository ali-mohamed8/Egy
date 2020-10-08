<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
     return view('admin.login') ;
    }

    public function checkLogin(LoginRequest $request){

        $remember = $request -> has('remember_token') ? 'true' : 'false' ;

        $check = auth() -> guard('admin') ->attempt([

           'email' => $request -> input('email') ,

           'password' => $request -> input('password')
        ]);

        if ($check){

            return redirect() -> route('dashboard') ;
        }
        else{

            return redirect() -> back() -> with(['error_validate' => 'invalid data ']) ;
        }
    }
}
