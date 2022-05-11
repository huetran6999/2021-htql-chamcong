<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Enterprise;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class DepController extends Controller
{
    public function index()
    {
        $departments = Department::with('enterprise')->select('id', 'e_id', 'd_name', 'd_phone')->paginate(5);

        return view('dep_manage.index', compact('departments'));
    }



    public function create() // trang create
    {
        $enterprises = Enterprise::select('id', 'e_name')->get();

        return view('dep_manage.create', compact('enterprises'));
    }

    public function store(DepartmentRequest $request) // them moi du lieu
    {
        $params = $request->all();
        Department::create($params);

        return redirect()->route('department.index')->with('message', 'New data successfully added');
    }

    public function destroy($id) // 
    {
        $department = Department::find($id);
        $positions = Position::where('d_id', $id);

        if ($positions != null) {
            return redirect()->route('department.index')->with('failed', 'Không thể xoá do tồn tại chức vụ trong phòng ban');
        } else {
            $department->delete();

            return redirect()->route('department.index')->with('message', 'Xoá phòng ban thành công');
        }   
    }

    public function edit($id)
    {
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $department = Department::find($id);

        return view('dep_manage.edit', compact('department', 'enterprises'));
    }

    public function update(DepartmentRequest $request)
    {
        $department = Department::find($request->id);
        $params = $request->all();
        $department->update($params);

        return redirect()->route('department.index')->with('message', 'Data successfully updated');
    }
}
