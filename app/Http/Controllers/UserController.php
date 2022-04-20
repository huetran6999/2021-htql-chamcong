<?php

namespace App\Http\Controllers;

// use App\Http\Requests\LoginRequest;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Position;
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

    public function showInfo(){
        return view('emp_manage.emp_info');
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

    public function insert(Request $request) {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        
        User::create(request(['username', 'password']));
        echo '<script language="javascript">alert("Thêm thành viên thành công!");</script>';
    }

    public function Create(){
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $deps = Department::select('id', 'd_name')->get();
        $positions = Position::select('id', 'p_name')->get();
        return view('emp_manage.emp_add', compact(['enterprises', 'deps', 'positions']));
    }
    public function Store(Request $request){   
        $user = new User;
        // $user = $request->all()
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
        return redirect()->route('employee')->with('success', 'Đăng ký thành công');        
    }

    public function Emp_Edit($id){
        $user = User::findOrFail($id);
        return view('emp_manage.emp_update', compact('user'));
    }

    public function Emp_Update(Request $request, $id){
        $user = User::find($id);
        $image = $request->u_avatar;
        
        if($request->hasFile('u_avatar')) {
            //Xoá ảnh cũ của user
            $desPath = 'uploads/'.$user->u_avatar;
            if(file_exists($desPath)){
                unlink($desPath);
            }

            $extension = $image->getClientOriginalExtension();
            $filename = $request->u_name.'.'.$extension;
            $image->move('uploads', $filename);
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
            $user->u_avatar= $filename;
                    
            // if($request->hasFile('u_avatar')) {
            //     $file = $request->file('u_avatar');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time().'.'.$extension;
            //     $file->move('uploads', $filename);
            //     $user->u_avatar = $filename;
            // }
            $user->username= $request->username;
            $user->password = Hash::make($request->password);
        } else {
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
            $user->username= $request->username;
            $user->password = Hash::make($request->password);
        }    
  //dd($user);    
       $user->save();
       return redirect()->route('employee')->with('success', 'Cập nhật thành công');       
    }

    public function Emp_Delete($id){
        if(Auth::id()==$id){
            return redirect()->back()->with('fail', 'Không thể xoá chính mình!!!');
        } else {
            $user = User::find($id);
            if($user){
                // $desPath = 'uploads/'.$user->u_avatar;
                // if(file_exists($desPath)){
                //     unlink($desPath); //xoá ảnh ứng với user
                // }
                $user->role()->detach(); //gỡ role ứng với user
                $user -> delete();
            }
            return redirect()->back()->with('del-success', 'Xoá người dùng thành công');
        }


    }




    // public function GetSearch(Request $request){
    //     $user=User::where('fullname','like','%'.$request->key.'%')->get();
    //     return view('pages.search', compact('user'));
    // }
    
    public function getDep(Request $request)
    {
        $entId = $request->post('entId');
        $deps = Department::where('e_id', $entId)->select('id', 'd_name')->get();
        $html='<option value="" disabled selected hidden>---> Chọn phòng ban <---</option>';
		foreach($deps as $dep){
			$html.='<option value="'.$dep->id.'">'.$dep->d_name.'</option>';
		}
		echo $html;
    }
}
