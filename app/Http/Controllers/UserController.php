<?php

namespace App\Http\Controllers;

// use App\Http\Requests\LoginRequest;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Literacy;
use App\Models\Parents;
use App\Models\Position;
use App\Models\Foreign_Language;
use App\Models\Salary;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function ShowUser(Request $request){
        // lấy ra toàn bộ user
        $users = User::with('department')->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'f_id', 'u_phone', 'u_status')->paginate(5);
        $ents = Enterprise::select('id', 'e_name')->get();
        $deps = Department::select('id', 'd_name')->get();
        
        
        if ($request->has('username')) {
            $users = User::with('department')->where('username', 'LIKE', '%' . $request->username . '%')->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }

        if ($request->has('u_name')) {
            $users = User::with('department')->where('u_name', 'LIKE', '%' . $request->u_name . '%')->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }

        if ($request->has('d_id')) {
            $users = User::with('department')->where('d_id', 'LIKE', '%' . $request->d_id . '%')->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }

        if ($request->has('username') && $request->has('u_name')) {
            $users = User::with('department')->where([['username', 'LIKE', '%' . $request->username . '%'], ['u_name', 'LIKE', '%' . $request->u_name . '%']])->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }

        if ($request->has('d_id') && $request->has('u_name')) {
            $users = User::with('department')->where([['d_id', 'LIKE', '%' . $request->d_id . '%'], ['u_name', 'LIKE', '%' . $request->u_name . '%']])->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }

        if ($request->has('d_id') && $request->has('username')) {
            $users = User::with('department')->where([['username', 'LIKE', '%' . $request->username . '%'], ['d_id', 'LIKE', '%' . $request->d_id . '%']])->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }

        if ($request->has('username') && $request->has('u_name') && $request->has('d_id')) {
            $users = User::with('department')->where([['username', 'LIKE', '%' . $request->username . '%'], ['u_name', 'LIKE', '%' . $request->u_name . '%'], ['d_id', 'LIKE', '%' . $request->d_id . '%']])->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'd_id', 'u_phone', 'u_status')->paginate(5);
        }


        //dd($users);

        // trả về view hiển thị danh sách tài khoản
        return view('emp_manage.employee', compact('users', 'ents', 'deps'));
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
        $lang = Foreign_Language::select('id', 'f_name')->get();
        $users = User::all();
        $salaries = Salary::select('id', 'coefficient_salary')->first();
        $lit = Literacy::select('id', 'l_name', 'l_major', 'l_grading','l_graduation_school','l_graduation_year', 'l_other_major','note')->get();
        $par = Parents::select('id', 're_name','re_ship','re_gender','re_phone','re_address')->get();
        return view('emp_manage.emp_add', compact(['enterprises', 'deps', 'positions', 'lit','par', 'lang', 'users', 'salaries']));
    }
    public function Store(Request $request){   
        $user = new User;
        // User::create($user);
        // $user = $request->all();
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
        $user->password = bcrypt($request->password);
        $user->p_id = $request->p_name;
        $user->d_id = $request->d_name;
        $user->f_id = $request->f_name;
        $user->s_id = $user->p_id;
        if ($user->p_id == 1) {
            $user->s_id = '10';
        }
        if ($user->p_id == 2) {
            $user->s_id = '9';
        }
        if ($user->p_id == 3 && $user->p_id == 5) {
            $user->s_id = '7';
        }
        if ($user->p_id == 4) {
            $user->s_id = '6';
        }
        if ($user->p_id == 6) {
            $user->s_id = '5';
        }
        if ($user->p_id == 7) {
            $user->s_id = '1';
        }
        if ($user->p_id == 8) {
            $user->s_id = '1';
        }
        
        // $user->e_id = $request->e_name;

        $parent = new Parents;
        $parent->u_id = $user->id;
        $parent->re_name = $request->re_name;
        $parent->re_ship = $request->re_ship;
        $parent->re_gender = $request->re_gender;
        $parent->re_phone = $request->re_phone;
        $parent->re_address = $request->re_address;

        $literacy = new Literacy;
        $literacy->u_id = $user->id;
        $literacy->l_name = $request->l_name;
        $literacy->l_major = $request->l_major;
        $literacy->l_grading = $request->l_grading;
        $literacy->l_graduation_school = $request->l_graduation_school;
        $literacy->l_graduation_year = $request->l_graduation_year;
        $literacy->l_other_major = $request->l_other_major;
        $literacy->note = $request->note;
        
        $user->save();
        $parent->save();
        $literacy->save();

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
