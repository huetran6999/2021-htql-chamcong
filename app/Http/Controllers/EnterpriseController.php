<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterpriseRequest;
use App\Models\Department;
use App\Models\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index() {
        
        // lấy ra toàn bộ đơn vị
        $enterprises = Enterprise::select('id', 'e_name', 'e_address', 'e_phone')->paginate(5);
        //dd($enterprises);

        // trả về view hiển thị danh sách tài khoản
        return view('ent_manage.index', compact('enterprises'));
    }

    public function create() // trang create
    {
        return view('ent_manage.create');
    }

    public function store(EnterpriseRequest $request) // them moi du lieu
    {
        $params = $request->all();
        Enterprise::create($params);

        return redirect()->route('enterprise.index')->with('message', 'Thêm đơn vị mới thành công');
    }

    public function destroy($id) // 
    {
        $enterprise = Enterprise::find($id);
        $deps = Department::where('e_id', $id);

        if ($deps == null) {
            return redirect()->route('enterprise.index')->with('failed', 'Không thể xoá do tồn tại phòng ban trong đơn vị');
        } else {
            $enterprise->delete();

            return redirect()->route('enterprise.index')->with('message', 'Xoá đơn vị thành công');
        }     
    }

    public function edit($id)
    {
        $enterprise = Enterprise::find($id);

        return view('ent_manage.edit', compact('enterprise'));
    }

    public function update(EnterpriseRequest $request)
    {
        $enterprise = Enterprise::find($request->id);
        $params = $request->all();
        $enterprise->update($params);

        return redirect()->route('enterprise.index')->with('message', 'Cập nhật dữ liệu thành công');
    }   
}
