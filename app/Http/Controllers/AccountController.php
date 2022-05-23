<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Literacy;
use App\Models\Parents;
use App\Models\Position;
use App\Models\Foreign_Language;
use App\Models\Salary;
use App\Models\working_hour_log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function showAccountInfo(){
        $user = User::where('id', Auth::user()->id)->first();
        $enterprises = Enterprise::select('id', 'e_name')->get();
        $deps = Department::select('id', 'd_name')->get();
        $positions = Position::select('id', 'p_name')->get();
        $lang = Foreign_Language::select('id', 'f_name')->get();
        $salaries = Salary::select('id', 'coefficient_salary')->first();
        $par = Parents::where('u_id', $user->id)->get();
        $lit = Literacy::where('u_id', $user->id)->get();

        //dd($p);
        return view('account_manage.account_info', compact(['enterprises', 'deps', 'positions', 'lit','par', 'lang', 'user', 'salaries']));
        
    }

    public function showTimekeepingInfo(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $query = working_hour_log::with('user_log');
        
        if (isset($request->month)) {
            $array_month = explode('-', $request->month);
            $month = $array_month[1];
            $year = $array_month[0];

            $logs = $query->whereMonth('date', $month)->whereYear('date', $year);
        }

        $logs = $query->where('u_id', $user->id)->orderBy('date')->paginate(50)->appends(['month' => $request->month]);

        //dd($user, $log);
        return view('account_manage.timekeeping_info', compact(['user', 'logs']));
    }
}
