<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function GetValid(){
        return view('welcome');
    }
    public function PostValid(LoginRequest $request){
        // $request->validate([
        //     'username'=>'required|min:5',
        //     'password'=>'required|min:8'
        // ],[
        //     'username.required'=>'Vui lòng nhập tên người dùng.',
        //     'username.min'=>'Tên người dùng phải chứa trên 5 ký tự.',
        //     'password.required'=>'Vui lòng nhập mật khẩu.',
        //     'password.min'=>'Mật khẩu phải chứa trên 8 ký tự.'
        // ]); //nếu như bắt được lỗi sẽ tự động tạo biến errors

    }
}
