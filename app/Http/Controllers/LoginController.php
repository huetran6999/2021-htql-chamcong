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
        $username=$request->username;
        $password=$request->password;
        if(Auth::attempt(['tk_tendangnhap' => $username, 'password' => $password])){
            return view('home');
        }
        else {
            return redirect('login')->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác.');
        }
    }
}
