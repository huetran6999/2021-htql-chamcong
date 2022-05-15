<?php

namespace App\Http\Controllers;

// use App\Http\Requests\LoginRequest;

use App\Models\Allowance;
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
use App\Models\Work_contract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function ShowUser(Request $request)
    {
        // lấy ra toàn bộ user
        $users = User::select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'f_id', 'u_phone', 'u_status', 'u_IDcode', 'u_IDcodedate')->paginate(5);
        $ents = Enterprise::select('id', 'e_name')->get();
        $deps = Department::select('id', 'd_name')->get();
        $pos = Position::select('id', 'p_name')->get();

        // dd($users);

        // trả về view hiển thị danh sách tài khoản
        return view('emp_manage.employee', compact('users', 'ents', 'deps', 'pos'));
    }

    // public function fakeUser(){
    //     User::factory()->count(10)->create();
    // }

    // public function ShowUserrole()
    // {
    //     $user = User::with('role')->orderBy('id')->paginate(5);
    //     return view('emp_manage.role_assign', compact('user'));
    // }

    // public function AssignRole(Request $request)
    // { {
    //         $user = User::where('username', $request->username)->first();
    //         $user->role()->detach();
    //         if ($request->manager_role) {
    //             $user->role()->attach(Role::where('r_name', 'manager')->first());
    //         }
    //         if ($request->userleader_role) {
    //             $user->role()->attach(Role::where('r_name', 'userleader')->first());
    //         }
    //         if ($request->salaryleader_role) {
    //             $user->role()->attach(Role::where('r_name', 'salaryleader')->first());
    //         }
    //         if ($request->employee_role) {
    //             $user->role()->attach(Role::where('r_name', 'employee')->first());
    //         }
    //         return redirect()->back()->with('message', 'Cấp quyền thành công!');
    //     }
    // }


    public function Create()
    {
        $enterprises = Enterprise::all();
        $deps = Department::all();
        $positions = Position::all();
        $lang = Foreign_Language::all();
        $users = User::all();
        $salaries = Salary::all();
        $lit = Literacy::all();
        $par = Parents::all();
        return view('emp_manage.emp_add', compact(['enterprises', 'deps', 'positions', 'lit', 'par', 'lang', 'users', 'salaries']));
    }
    public function Store(Request $request)
    {
        $user = new User;
        // User::create($user);
        // $user = $request->all();
        $user->u_name = $request->u_name;
        $user->u_gender = $request->u_gender;
        $user->u_dob = $request->u_dob;
        $user->u_pob = $request->u_pob;
        $user->u_IDcode = $request->u_IDcode;
        $user->u_IDcodedate = $request->u_IDcodedate;
        $user->u_IDcodeplace = $request->u_IDcodeplace;
        $user->u_household = $request->u_household;
        $user->u_address = $request->u_address;
        $user->u_phone = $request->u_phone;
        $user->u_email = $request->u_email;
        $user->u_nationality = $request->u_nationality;
        $user->u_ethnic = $request->u_ethnic;
        $user->u_religion = $request->u_religion;
        $user->u_checkindate = $request->u_checkindate;
        $user->u_status = $request->u_status;
        if ($request->hasFile('u_avatar')) {
            $file = $request->file('u_avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->u_name . '.' . $extension;
            $file->move('uploads', $filename);
            $user->u_avatar = $filename;
        } else {
            $user->u_avatar = 'female-account-icon.png';
        }
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->p_id = $request->p_name;
        $user->f_id = $request->f_name;
        $user->save();

        $parent = new Parents;

        $parent->re_name = $request->re_name;
        $parent->re_ship = $request->re_ship;
        $parent->re_gender = $request->re_gender;
        $parent->re_phone = $request->re_phone;
        $parent->re_address = $request->re_address;
        $parent->u_id = $user->id;

        $literacy = new Literacy;

        $literacy->l_name = $request->l_name;
        $literacy->l_major = $request->l_major;
        $literacy->l_grading = $request->l_grading;
        $literacy->l_graduation_school = $request->l_graduation_school;
        $literacy->l_graduation_year = $request->l_graduation_year;
        $literacy->l_other_major = $request->l_other_major;
        $literacy->note = $request->note;
        $literacy->u_id = $user->id;

        // $user->save();
        $parent->save();
        $literacy->save();

        return redirect()->route('Contract_Create', $user->id)->with('success', 'Bạn đã đăng ký nhân viên thành công. Tiếp theo, hãy lập hợp đồng nhân viên!');
    }

    public function Emp_Edit($id)
    {
        $user = User::findOrFail($id);
        $enterprises = Enterprise::all();
        $deps = Department::all();
        $positions = Position::all();
        $lang = Foreign_Language::all();
        $salaries = Salary::select('id', 'level', 'coefficient_salary')->get();
        // $salaries = Salary::select('id', 'coefficient_salary')->first();
        $par = Parents::where('u_id', $user->id)->get();
        $lit = Literacy::where('u_id', $user->id)->get();

        //dd($par);
        return view('emp_manage.emp_update', compact(['enterprises', 'deps', 'positions', 'lit', 'par', 'lang', 'user', 'salaries']));
    }

    public function Emp_Update(Request $request, $id)
    {
        $user = User::find($id);
        $parent = Parents::where('u_id', $user->id)->first();
        $literacy = Literacy::where('u_id', $user->id)->first();

        $image = $request->u_avatar;

        if ($request->hasFile('u_avatar')) {
            //Xoá ảnh cũ của user
            if($user->u_avatar != 'female-account-icon.png') {
                $desPath = 'uploads/' . $user->u_avatar;
                if (file_exists($desPath)) {
                    unlink($desPath);
                }
            }
            

            $extension = $image->getClientOriginalExtension();
            $filename = $request->u_name . '.' . $extension;
            $image->move('uploads', $filename);
            $user->u_name = $request->u_name;
            $user->u_gender = $request->u_gender;
            $user->u_dob = $request->u_dob;
            $user->u_pob = $request->u_pob;
            $user->u_IDcode = $request->u_IDcode;
            $user->u_IDcodedate = $request->u_IDcodedate;
            $user->u_IDcodeplace = $request->u_IDcodeplace;
            $user->u_household = $request->u_household;
            $user->u_address = $request->u_address;
            $user->u_phone = $request->u_phone;
            $user->u_email = $request->u_email;
            $user->u_nationality = $request->u_nationality;
            $user->u_ethnic = $request->u_ethnic;
            $user->u_religion = $request->u_religion;
            $user->u_checkindate = $request->u_checkindate;
            $user->u_status = $request->u_status;
            $user->u_avatar = $filename;

            // if($request->hasFile('u_avatar')) {
            //     $file = $request->file('u_avatar');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time().'.'.$extension;
            //     $file->move('uploads', $filename);
            //     $user->u_avatar = $filename;
            // }
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->p_id = $request->p_name;
            $user->f_id = $request->f_name;

            $user->save();

            $parent->re_name = $request->re_name;
            $parent->re_ship = $request->re_ship;
            $parent->re_gender = $request->re_gender;
            $parent->re_phone = $request->re_phone;
            $parent->re_address = $request->re_address;

            $literacy->l_name = $request->l_name;
            $literacy->l_major = $request->l_major;
            $literacy->l_grading = $request->l_grading;
            $literacy->l_graduation_school = $request->l_graduation_school;
            $literacy->l_graduation_year = $request->l_graduation_year;
            $literacy->l_other_major = $request->l_other_major;
            $literacy->note = $request->note;
        } else {
            $user->u_name = $request->u_name;
            $user->u_gender = $request->u_gender;
            $user->u_dob = $request->u_dob;
            $user->u_pob = $request->u_pob;
            $user->u_IDcode = $request->u_IDcode;
            $user->u_IDcodedate = $request->u_IDcodedate;
            $user->u_IDcodeplace = $request->u_IDcodeplace;
            $user->u_household = $request->u_household;
            $user->u_address = $request->u_address;
            $user->u_phone = $request->u_phone;
            $user->u_email = $request->u_email;
            $user->u_nationality = $request->u_nationality;
            $user->u_ethnic = $request->u_ethnic;
            $user->u_religion = $request->u_religion;
            $user->u_checkindate = $request->u_checkindate;
            $user->u_status = $request->u_status;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->p_id = $request->p_name;
            $user->f_id = $request->f_name;
            $user->save();

            $parent->re_name = $request->re_name;
            $parent->re_ship = $request->re_ship;
            $parent->re_gender = $request->re_gender;
            $parent->re_phone = $request->re_phone;
            $parent->re_address = $request->re_address;

            $literacy->l_name = $request->l_name;
            $literacy->l_major = $request->l_major;
            $literacy->l_grading = $request->l_grading;
            $literacy->l_graduation_school = $request->l_graduation_school;
            $literacy->l_graduation_year = $request->l_graduation_year;
            $literacy->l_other_major = $request->l_other_major;
            $literacy->note = $request->note;
        }
        //dd($user);    
        $parent->save();
        $literacy->save();

        return redirect()->route('employee')->with('success', 'Cập nhật thành công');
    }

    public function Emp_Delete($id)
    {
        if (Auth::id() == $id) {
            return redirect()->back()->with('fail', 'Không thể xoá chính mình!!!');
        } else {
            $user = User::find($id);
            if ($user) {
                // $desPath = 'uploads/'.$user->u_avatar;
                // if(file_exists($desPath)){
                //     unlink($desPath); //xoá ảnh ứng với user
                // }
                $user->role()->detach(); //gỡ role ứng với user
                $user->delete();
            }
            return redirect()->back()->with('del-success', 'Xoá người dùng thành công');
        }
    }

    public function createContract($id)
    {
        $user = User::find($id);
        $contract = Work_contract::where('u_id', $user->id)->get();

        return view('contract_manage.contract_create', compact(['user', 'contract']));
    }

    public function storeContract(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $allowance = Allowance::where('p_id', $user->p_id)->get();

        
        $contract = Work_contract::where('u_id', $user->id)->get();

        $count_contract = Work_contract::latest()->first();
        
        $arrName = explode("-", $count_contract->id);    
        
        $number = $arrName[0]+1;

        foreach($contract as $contract){
            if(isset($contract)){
                $contract->w_status=0;
                $contract->save();
            }
        }

        $contract = new Work_contract;
        $contract->id = $number .'-HDLD-ABC';
        $contract->w_type = $request->w_type;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date; 
        $contract->w_status = 1;
        $contract->u_id = $user->id;
        $contract->save();

        // $contract->creator = Auth::user()->user->u_name;
        // $contract->allowance = $allowance->total;
        // $contract->a_id = $allowance->id;

        
        //dd($allowance, $user, $contract);
        
        return redirect(url('/contract-info/user/'.$id))->with('success','Lập hợp đồng thành công!');
    }

    public function getContractInfo($id) {
        $user = User::find($id);
        $contract = Work_contract::where('u_id', $id)->get();

        return view('contract_manage.contractUser_info', compact(['user', 'contract']));
    }

    public function getDep(Request $request)
    {
        $entId = $request->post('entId');
        $deps = Department::where('e_id', $entId)->select('id', 'd_name')->get();
        $html = '<option value="" disabled selected hidden>---> Chọn phòng ban <---</option>';
        foreach ($deps as $dep) {
            $html .= '<option value="' . $dep->id . '">' . $dep->d_name . '</option>';
        }
        echo $html;
    }

    public function getPos(Request $request)
    {
        $depId = $request->post('depId');
        $pos = Position::where('d_id', $depId)->select('id', 'p_name')->get();
        $html = '<option value="" disabled selected hidden>---> Chọn chức vụ <---</option>';
        foreach ($pos as $p) {
            $html .= '<option value="' . $p->id . '">' . $p->p_name . '</option>';
        }
        echo $html;
    }

    public function showEmpInfo($id)
    {
        $user = User::find($id);
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $deps = Department::select('id', 'd_name')->get();
        $positions = Position::select('id', 'p_name')->get();
        $lang = Foreign_Language::select('id', 'f_name')->get();
        $salaries = Salary::select('id', 'coefficient_salary')->first();
        $par = Parents::where('u_id', $user->id)->get();
        $lit = Literacy::where('u_id', $user->id)->get();

        // //dd($user);
        return view('emp_manage.emp_info', compact(['enterprises', 'deps', 'positions', 'lit', 'par', 'lang', 'user', 'salaries']));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $users = User::with(['position'])
                ->where('username', 'LIKE', '%' . $request->search . '%')
                ->orWhere('u_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('u_status', 'LIKE', '%' . $request->search . '%')
                ->orWhere('u_phone', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('position', function ($query) use ($request) {
                    $query->where('p_name', 'LIKE', '%' . $request->search . '%');
                })
                ->orWhereHas('position', function ($query) use ($request) {
                    $query->whereHas('dep_pos', function ($query) use ($request) {
                        $query->where('d_name', 'LIKE', '%' . $request->search . '%');
                    });
                })
                ->orWhereHas('position', function ($query) use ($request) {
                    $query->whereHas('dep_pos', function ($query) use ($request) {
                        $query->whereHas('enterprise', function ($query) use ($request) {
                            $query->where('e_name', 'LIKE', '%' . $request->search . '%');
                        });
                    });
                })
                ->select('id', 'u_avatar', 'username', 'u_name', 'p_id', 'f_id', 'u_phone', 'u_status')
                ->paginate(5);
            if ($users) {
                foreach ($users as $user) {
                    // if ($user->u_avatar != '') {
                        if ($user->u_status == 0) {
                            $output .= "<tr>" .
                                "<td>" . "<img src='/uploads/" . $user->u_avatar . "' alt=" . $user->u_name . "class='card-img-top' style='cursor: zoom-in;' width='60' />" . "</td>" .
                                "<td>" . $user->username . "</td>" .
                                "<td>" . $user->u_name . "</td>" .
                                "<td>" . $user->position->p_name . "</td>" .
                                "<td>" . $user->position->dep_pos->d_name . "</td>" .
                                "<td>" . $user->position->dep_pos->enterprise->e_name . "</td>" .
                                "<td>" . $user->u_phone . "</td>" .
                                "<td><span class='badge bg-success'>Hoạt động</span></td>" .
                                "<td class='text-right'>" .
                                "<a href=" . route('Emp_Info', $user->id) . " class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>" .
                                "<a href=" . route('Emp_Edit', $user->id) . " class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>" .
                                "<a href=" . route('Emp_Delete', $user->id) . " class='btn btn-danger btn-delete btn-sm'><i class='fa fa-trash'></i></a>" .
                                "</td>" .
                                "</tr>";
                        } else {
                            $output .= "<tr>" .
                                "<td>" . "<img src='/uploads/" . $user->u_avatar . "' alt=" . $user->u_name . "class='card-img-top' style='cursor: zoom-in;' width='60' />" . "</td>" .
                                "<td>" . $user->username . "</td>" .
                                "<td>" . $user->u_name . "</td>" .
                                "<td>" . $user->position->p_name . "</td>" .
                                "<td>" . $user->position->dep_pos->d_name . "</td>" .
                                "<td>" . $user->position->dep_pos->enterprise->e_name . "</td>" .
                                "<td>" . $user->u_phone . "</td>" .
                                "<td><span class='badge bg-success'>Ngưng Hoạt động</span></td>" .
                                "<td class='text-right'>" .
                                "<a href=" . route('Emp_Info', $user->id) . " class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>" .
                                "<a href=" . route('Emp_Edit', $user->id) . " class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>" .
                                "<a href=" . route('Emp_Delete', $user->id) . " class='btn btn-danger btn-delete btn-sm'><i class='fa fa-trash'></i></a>" .
                                "</td>" .
                                "</tr>";
                        }
                    // } else {
                    //     if ($user->u_gender == 0) {
                    //         if ($user->u_status == 0) {
                    //             $output .= "<tr>" .
                    //                 "<td>" . "<img src='/uploads/male-account-icon.png' alt=" . $user->u_name . "class='card-img-top' style='cursor: zoom-in;' width='60' />" . "</td>" .
                    //                 "<td>" . $user->username . "</td>" .
                    //                 "<td>" . $user->u_name . "</td>" .
                    //                 "<td>" . $user->position->p_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->d_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->enterprise->e_name . "</td>" .
                    //                 "<td>" . $user->u_phone . "</td>" .
                    //                 "<td><span class='badge bg-success'>Hoạt động</span></td>" .
                    //                 "<td class='text-right'>" .
                    //                 "<a href=" . route('Emp_Info', $user->id) . " class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>" .
                    //                 "<a href=" . route('Emp_Edit', $user->id) . " class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>" .
                    //                 "<a href=" . route('Emp_Delete', $user->id) . " class='btn btn-danger btn-delete btn-sm'><i class='fa fa-trash'></i></a>" .
                    //                 "</td>" .
                    //                 "</tr>";
                    //         } else {
                    //             $output .= "<tr>" .
                    //                 "<td>" . "<img src='/uploads/male-account-icon.png' alt=" . $user->u_name . "class='card-img-top' style='cursor: zoom-in;' width='60' />" . "</td>" .
                    //                 "<td>" . $user->username . "</td>" .
                    //                 "<td>" . $user->u_name . "</td>" .
                    //                 "<td>" . $user->position->p_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->d_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->enterprise->e_name . "</td>" .
                    //                 "<td>" . $user->u_phone . "</td>" .
                    //                 "<td><span class='badge bg-success'>Ngưng Hoạt động</span></td>" .
                    //                 "<td class='text-right'>" .
                    //                 "<a href=" . route('Emp_Info', $user->id) . " class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>" .
                    //                 "<a href=" . route('Emp_Edit', $user->id) . " class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>" .
                    //                 "<a href=" . route('Emp_Delete', $user->id) . " class='btn btn-danger btn-delete btn-sm'><i class='fa fa-trash'></i></a>" .
                    //                 "</td>" .
                    //                 "</tr>";
                    //         }
                    //     } else {
                    //         if ($user->u_status == 0) {
                    //             $output .= "<tr>" .
                    //                 "<td>" . "<img src='/uploads/female-account-icon.png' alt=" . $user->u_name . "class='card-img-top' style='cursor: zoom-in;' width='60' />" . "</td>" .
                    //                 "<td>" . $user->username . "</td>" .
                    //                 "<td>" . $user->u_name . "</td>" .
                    //                 "<td>" . $user->position->p_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->d_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->enterprise->e_name . "</td>" .
                    //                 "<td>" . $user->u_phone . "</td>" .
                    //                 "<td><span class='badge bg-success'>Hoạt động</span></td>" .
                    //                 "<td class='text-right'>" .
                    //                 "<a href=" . route('Emp_Info', $user->id) . " class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>" .
                    //                 "<a href=" . route('Emp_Edit', $user->id) . " class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>" .
                    //                 "<a href=" . route('Emp_Delete', $user->id) . " class='btn btn-danger btn-delete btn-sm'><i class='fa fa-trash'></i></a>" .
                    //                 "</td>" .
                    //                 "</tr>";
                    //         } else {
                    //             $output .= "<tr>" .
                    //                 "<td>" . "<img src='/uploads/female-account-icon.png' alt=" . $user->u_name . "class='card-img-top' style='cursor: zoom-in;' width='60' />" . "</td>" .
                    //                 "<td>" . $user->username . "</td>" .
                    //                 "<td>" . $user->u_name . "</td>" .
                    //                 "<td>" . $user->position->p_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->d_name . "</td>" .
                    //                 "<td>" . $user->position->dep_pos->enterprise->e_name . "</td>" .
                    //                 "<td>" . $user->u_phone . "</td>" .
                    //                 "<td><span class='badge bg-success'>Ngưng Hoạt động</span></td>" .
                    //                 "<td class='text-right'>" .
                    //                 "<a href=" . route('Emp_Info', $user->id) . " class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>" .
                    //                 "<a href=" . route('Emp_Edit', $user->id) . " class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>" .
                    //                 "<a href=" . route('Emp_Delete', $user->id) . " class='btn btn-danger btn-delete btn-sm'><i class='fa fa-trash'></i></a>" .
                    //                 "</td>" .
                    //                 "</tr>";
                    //         }
                    //     }
                    // }
                }
            }

            return response()->json($output);
        }
    }
}
