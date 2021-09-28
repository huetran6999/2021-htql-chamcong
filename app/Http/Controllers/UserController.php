<?php

namespace App\Http\Controllers;

use App\Models\taikhoan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function Create(){
        return view('home');
    }
    public function Store(Request $request){
        // dd($request);
        // $data = $request->all();
        // dd($data);
        // $data['password'] = Hash::make($request->password);

        // User::create($data);
        
        $user = new User();
        $user->username = $request->username;

        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('create-account')->with('success', 'Đăng ký thành công');;
        echo "Tạo tài khoản thành công";
    }

    public function Edit($id){
        // Tìm đến đối tượng muốn update
        $user = User::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('edit', compact('user'));
    }
    public function Update(Request $request, $id){
        
        $user = User::findOrFail($id);
        $user->username=$request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        //return redirect('update-account')->with('success', 'Sửa thành công');
         echo"success update user";
    }

    public function Delete($id){
        // Tìm đến đối tượng muốn xóa
        $user = taikhoan::findOrFail($id);

        $user->delete();
        echo"success delete user";
    }

    public function Index(){
        // lấy ra toàn bộ user
        $users = taikhoan::all();
        //dd($users);

        // trả về view hiển thị danh sách user
        return view('index', compact('users'));
    }
}
