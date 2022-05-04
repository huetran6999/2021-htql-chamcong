<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Models\TimeKeeping;
use App\Models\working_hour_log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class SalaryReportController extends Controller
{
    public function index(){
        $logs = working_hour_log::with('user_log')
        ->select('u_id', 'date', 'am_in', 'am_out', 'pm_in', 'pm_out')
        ->get();

        $dates = working_hour_log::select('date')
        ->groupBy('date')
        ->get();

        $late = $logs
        ->where('am_in', '>', '07:31:00')->count();

        $user = $logs->count();

        dd($late, $user);


    }


    // public function index(Request $request) {
    //     $years = TimeKeeping::select('year')
    //     ->groupBy('year')
    //     ->pluck('year');

    //     $months = TimeKeeping::select('month')
    //     ->groupBy('month')
    //     ->pluck('month');

    //     $lastYear = collect($years)->last();
    //     $lastMonth = collect($months)->last();

    //     // dd($lastMonth, $lastYear);


    //     $users = TimeKeeping::with('user')->where([['year', 'LIKE', '%' . $lastYear . '%'], ['month', 'LIKE', '%' . $lastMonth . '%']])->select('u_id', 'total', 'month', 'year')->get();
    //     if ($request->has('years') && $request->has('months')) {
    //         $users = TimeKeeping::with('user')->where([['year', 'LIKE', '%' . $request->years . '%'], ['month', 'LIKE', '%' . $request->months . '%']])
    //         ->select('u_id', 'total', 'month', 'year')->get();
    //     }
        
    //     else if ($request->has('years')) {
    //         $users = TimeKeeping::with('user')->where('year', 'LIKE', '%' . $request->years . '%')->select('u_id', 'total', 'month', 'year')->get();
    //     }

    //     else if ($request->has('months')) {
    //         $users = TimeKeeping::with('user')->where('month', 'LIKE', '%' . $request->months . '%')->select('u_id', 'total', 'month', 'year')->get();
    //     }
    //     else {
    //         $users = TimeKeeping::with('user')->where([['year', 'LIKE', '%' . $lastYear . '%'], ['month', 'LIKE', '%' . $lastMonth . '%']])->select('u_id', 'total', 'month', 'year')->get();
    //     }

    //     return view('salary-report.index', compact('users', 'years', 'months', 'lastYear', 'lastMonth'));
    // }
}
