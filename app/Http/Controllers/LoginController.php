<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function GetLogin(){
        return view('login');
    }
    
    public function PostLogin(Request $request){
        $username=$request->username;
        $password=$request->password;
        if (Auth::attempt([
            'username' => $username,
            'password' => $password
        ])) {
            return redirect() ->route('index');
        } else {
            return redirect('/login')->with('thongbao', 'Tên đăng nhập hoặc mật khẩu không đúng!');
            //dd($username, $password);
        }
        
        // if(Auth::attempt([
        //     'username' => $username,
        //     'password' => $password
        // ])){
        //     //thành công
        //     // $user = User::where('username', $username)->first();
        //     // Auth::login($user); 
        //     return redirect()->route('index');
        // }
        // else {
        //     //không thành công
        //     return redirect('/login-account')->with('thongbao', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
        // }
        
        

    }

    public function Logout(){ //đăng xuất
        Auth::logout();

        //chuyển hướng sang trang đăng nhập sau khi đăng xuất cùng với thông báo
        return redirect('login')->with('success', 'Đăng xuất tài khoản thành công');
    }
}
