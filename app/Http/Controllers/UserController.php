<?php

namespace App\Http\Controllers;

// use App\Http\Requests\LoginRequest;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function ShowUser(){
        // lấy ra toàn bộ user
        $users = User::all();
        $users=User::paginate(5);

        //dd($users);

        // trả về view hiển thị danh sách tài khoản
        return view('emp_manage.employee', compact('users'));
    }

    public function fakeUser(){
        User::factory()->count(10)->create();
    }

    public function ShowUserrole(){
        $user = User::with('role')->orderBy('id')->paginate(5);
        return view('emp_manage.role_assign', compact('user'));
    }

    public function AssignRole(Request $request){{
        $user = User::where('username',$request->username)->first();
        $user->role()->detach();
        if($request->manager_role){
            $user->role()->attach(Role::where('r_name', 'manager')->first());
        }
        if($request->userleader_role){
            $user->role()->attach(Role::where('r_name', 'userleader')->first());
        }
        if($request->salaryleader_role){
            $user->role()->attach(Role::where('r_name', 'salaryleader')->first());
        }
        if($request->employee_role){
            $user->role()->attach(Role::where('r_name', 'employee')->first());
        }
        return redirect()->back()->with('message', 'Cấp quyền thành công!');
    }}


    public function searchByName(Request $request)
    {
        $users = User::where('u_name', 'like', '%' . $request->value . '%')->get();

        return response()->json($users); 
    }
    // public function index()
    // {
    //     $users = User::orderBy('id','desc')->get();

    //     return view('emp_manage.employee',[
    //         'users' => $users,
    //     ]);
    // }
    public function insert(Request $request) {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        
        User::create(request(['username', 'password']));
        echo '<script language="javascript">alert("Thêm thành viên thành công!");</script>';
    }

    public function Create(){
        return view('emp_manage.emp_add');
    }
    public function Store(Request $request){   
        // $request->validate([
        //     'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]
        // );   
        // $avatar = $request->file('file');
        // $input['avatar_name'] = time().'.'.$avatar->getClientOriginalExtension();
        // $desPath=public_path('/uploads');
        // $avatar->move($desPath, $input['avatar_name']);
        //Lưu hình thẻ khi có file hình
	
	// if($request->hasFile('avatar')){
	// 	//Hàm kiểm tra dữ liệu
	// 	$this->validate($request, 
	// 		[
	// 			//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
	// 			'avatar' => 'mimes:jpg,jpeg,png,gif|max:2048',
	// 		],			
	// 		[
	// 			//Tùy chỉnh hiển thị thông báo không thõa điều kiện
	// 			'avatar.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
	// 			'avatar.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
	// 		]
	// 	);
		
	// 	//Lưu hình ảnh vào thư mục public/upload/hinhthe
	// 	$file = $request->u_avatar;
	// 	$file_name = $file->getClientOriginalName();
		
	// 	$file->move(public_path('uploads'), $file_name);
	// }
        // User::create([
        //     'u_name' => $request->u_name,
        //     'u_gender' => $request->u_gender,
        //     'u_dob' => $request->u_dob,
        //     'u_pob' => $request->u_dob,
        //     'u_IDcode' => $request->u_IDcode,
        //     'u_IDcodedate' => $request->u_IDcodedate,
        //     'u_IDcodeplace' => $request->u_IDcodeplace,
        //     'u_household' => $request->u_household,
        //     'u_address' => $request->u_address,
        //     'u_phone' => $request->u_phone,
        //     'u_email' => $request->u_email,
        //     'u_nationality' => $request->u_nationality,
        //     'u_ethnic' => $request->u_ethnic,
        //     'u_religion'=> $request->u_religion,
        //     'u_checkindate'=> $request->u_checkindate,
        //     'u_status'=> $request->u_status,
        // 'username'=> $request->username,
        //     'password'=> bcrypt($request->password),
        // ]);
        $user = new User;
        $user->u_name=$request->u_name;
        $user->u_gender = $request->u_gender;
        $user->u_dob = $request->u_dob;
        $user->u_pob = $request->u_pob;
        $user->u_IDcode = $request->u_IDcode;
        $user->u_IDcodedate= $request->u_IDcodedate;
        $user->u_IDcodeplace =$request->u_IDcodeplace;
        $user->u_household = $request->u_household;
        $user->u_address = $request->u_address;
        $user->u_phone = $request->u_phone;
        $user->u_email = $request->u_email;
        $user->u_nationality = $request->u_nationality;
        $user->u_ethnic = $request->u_ethnic;
        $user->u_religion= $request->u_religion;
        $user->u_checkindate= $request->u_checkindate;
        $user->u_status= $request->u_status;
        if($request->hasFile('u_avatar')) {
            $file = $request->file('u_avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads', $filename);
            $user->u_avatar = $filename;
        }
        $user->username= $request->username;
        $user->password = Hash::make($request->password);  
        $user->save(); 
        //dd($request->all());
        // echo '<script language="javascript">alert("Thêm thành viên thành công!");</script>';
        return redirect()->route('employee')->with('success', 'Đăng ký thành công');
        
    }

    public function Emp_Edit($id){
        // Tìm đến đối tượng muốn update
        $user = User::findOrFail($id);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('emp_manage.emp_update', compact('user'));
    }
    public function Emp_Update(Request $request, $id){
        
        $user = User::find($id);
        $user->u_name=$request->u_name;
        $user->u_gender = $request->u_gender;
        $user->u_dob = $request->u_dob;
        $user->u_pob = $request->u_pob;
        $user->u_IDcode = $request->u_IDcode;
        $user->u_IDcodedate= $request->u_IDcodedate;
        $user->u_IDcodeplace =$request->u_IDcodeplace;
        $user->u_household = $request->u_household;
        $user->u_address = $request->u_address;
        $user->u_phone = $request->u_phone;
        $user->u_email = $request->u_email;
        $user->u_nationality = $request->u_nationality;
        $user->u_ethnic = $request->u_ethnic;
        $user->u_religion= $request->u_religion;
        $user->u_checkindate= $request->u_checkindate;
        $user->u_status= $request->u_status;
        $user->u_avatar= $request->u_avatar;
        if($request->hasFile('u_avatar')) {
            $file = $request->file('u_avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads', $filename);
            $user->u_avatar = $filename;
        }
        $user->username= $request->username;
        $user->password = Hash::make($request->password);
        //dd($user);
        // mã hóa password trước khi đẩy lên DB
        // $data['password'] = Hash::make($request->password);

        // Update user
        
        $user->save();
        return redirect()->route('employee')->with('success', 'Cập nhật thành công');       
    }

    public function Emp_Delete($id){
        if(Auth::id()==$id){
            return redirect()->back()->with('fail', 'Không thể xoá chính mình!!!');
        } else {
            $user = User::find($id);
            if($user){
                $user->role()->detach();
                $user -> delete();
            }
            return redirect()->back()->with('del-success', 'Xoá người dùng thành công');
        }


    }




    // public function GetSearch(Request $request){
    //     $user=User::where('fullname','like','%'.$request->key.'%')->get();
    //     return view('pages.search', compact('user'));
    // }

    
}
