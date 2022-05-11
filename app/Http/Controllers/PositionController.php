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
        $positions = Position::with('dep_pos')->select('id', 'd_id', 'p_name', 's_id', 'basic_salary')->paginate(5);

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

        return redirect()->route('position.index')->with('message','Thêm chức vụ mới thành công');
    }

    public function edit($id){
        $deps = Department::select('id', 'd_name')->get();
        $salaries = Salary::select('id', 'coefficient_salary')->get();
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $position = Position::find($id);

        return view('position_manage.edit', compact(['deps', 'salaries', 'enterprises', 'position']));
    }

    public function update(Request $request){
        $position = Position::find($request->id);
        $param = $request->all();
        $position->update($param);

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
