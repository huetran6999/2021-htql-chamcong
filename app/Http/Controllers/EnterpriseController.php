<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function ShowEnterprise() {
        
        // lấy ra toàn bộ đơn vị
        $enterprises = Enterprise::all();
        //dd($enterprises);

        // trả về view hiển thị danh sách tài khoản
        return view('ent_manage.enterprise', compact([ 'enterprises']));
       
    }

    // $x = Enterprise::find(1) -> department->toArray();
    // dd($x);
    

    
}
