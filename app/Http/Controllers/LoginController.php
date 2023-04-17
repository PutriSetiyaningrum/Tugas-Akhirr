<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view ('user/landingpage/login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('pengurus/home');
        }
        return redirect('/');
    }
}
