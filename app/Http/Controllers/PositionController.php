<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Enterprise;
use App\Models\Position;
use App\Models\Salary;
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

        return view('position_manage.create', compact(['deps', 'salaries', 'enterprises']));
    }

    public function store(Request $request){
        $param = $request->all();
        Position::create($param);

        return redirect()->route('position.index')->with('message','Thêm chức vụ mới thành công');
    }

    public function edit($id){
        $deps = Department::select('id', 'd_name')->get();
        $salaries = Salary::select('id', 'coefficient_salary')->get();
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $position = Position::find($id);

        return view('position_manage.create', compact(['deps', 'salaries', 'enterprises', 'position']));
    }

    public function update(Request $request){
        $position = Position::find($request->id);
        $param = $request->all();
        $position->update($param);

        return redirect()->route('position.index')->with('message','Cập nhật chức vụ thành công');
    }

    public function destroy($id){
        $position = Position::find($id);
        $position->delete();

        return redirect()->route('position.index')->with('message','Xoá chức vụ thành công');
    }
}
