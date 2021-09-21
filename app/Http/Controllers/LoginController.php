<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function GetLogin(){
        return view('welcome');
    }
    public function PostLogin(LoginRequest $request){


        if(Auth::attemp(['tk_tendangnhap'=>$username, 'tk_matkhau'=>$password])){
            echo 'ok';
        }
    }
}
