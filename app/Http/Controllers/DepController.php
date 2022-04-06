<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepController extends Controller
{
    public function ShowDep(){
        $deps = Department::all();
        //return view('dep_manage.department', compact('deps'));
        return view('dep_manage.department', compact('deps'));
    }
}
