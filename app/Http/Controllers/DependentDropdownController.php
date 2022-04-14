<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Enterprise;

class DependentDropdownController extends Controller
{
    public function getEnt(Request $request){
        $data['enterprises'] = Enterprise::get(['e_name', 'id']);
        return view('emp_manage.emp_add', $data);
    }

    public function getDep(Request $request){
        $data['deps'] = Department::where("e_id",$request->e_id)
                    ->get(["d_name","id"]);
        return response()->json($data);
    }
}
