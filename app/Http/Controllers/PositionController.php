<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Enterprise;
use App\Models\Position;
use App\Models\Position_Role;
use App\Models\Role;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        // $positions = Position::with('dep_pos')->select('id', 'd_id', 'p_name', 's_id', 'basic_salary')->paginate(5);
        $positions = Position::with('dep_pos')->select('id', 'd_id', 'p_name', 's_id', 'basic_salary')->orderBy('d_id')->get();
        $positions = Position::paginate(5);

        return view('position_manage.index', compact('positions'));
    }

    public function create(){
        $deps = Department::select('id', 'd_name')->get();
        $salaries = Salary::select('id', 'coefficient_salary')->get();
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $roles = Role::all();

        return view('position_manage.create', compact(['deps', 'roles', 'salaries', 'enterprises']));
    }

    public function store(Request $request){
        $position = new Position;
        $position->p_name = $request->p_name;
        $position->basic_salary = $request->basic_salary;
        $position->s_id = $request->s_id;
        $position->d_id = $request->d_id;
 

        $position->save();

        if(isset($request->role)) {
            $roles = $request->role;
            foreach($roles as $roleID) {
                $pos_role = new Position_Role;
                $pos_role->p_id = $position->id;
                $pos_role->r_id = (int)$roleID;

                $pos_role->save();
            }
        }

        return redirect()->route('edit_allowance', $position->id)->with('message','Thêm chức vụ mới thành công. Hãy tiếp tục nhập phụ cấp theo chức vụ.');
    }

    public function edit($id){
        $deps = Department::select('id', 'd_name')->get();
        $salaries = Salary::select('id', 'coefficient_salary')->get();
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $position = Position::find($id);
        $roles = Role::all();
        $pos_role = Position_Role::where('p_id', $id)->pluck('r_id');

        return view('position_manage.edit', compact(['deps', 'salaries', 'enterprises', 'position', 'roles', 'pos_role']));
    }

    public function update(Request $request, $id){
        $position = Position::find($id);
        if($request->r_name == $position->r_name) {
            $this->validate($request,
            ['r_name' => 'unique:position'],
            ['r_name' => 'Tên chức vụ đã tồn tại.']
        );
        }

        $position->p_name = $request->p_name;
        $position->basic_salary = $request->basic_salary;
        $position->s_id = $request->s_id;
        $position->d_id = $request->d_id;

        $position->save();

        if(Position_Role::where('p_id',$id)->exists()) {
            Position_Role::where('p_id',$id)->delete();
        }

        $roles = $request->role;
        foreach($roles as $roleID) {
            $pos_role = new Position_Role;
            $pos_role->p_id = $position->id;
            $pos_role->r_id = (int)$roleID;

            $pos_role->save();
        }
        

        return redirect()->route('position.index')->with('message','Cập nhật chức vụ thành công');
    }

    public function destroy($id){
        $position = Position::find($id);
        $user = User::where('p_id', $id);

        if($user != null) {
            return redirect()->route('position.index')->with('failed','Không thể xoá do tồn tại nhân viên thuộc chức vụ');
        } else {

            $position->delete();

            return redirect()->route('position.index')->with('message','Xoá chức vụ thành công');
        }
    }
}
