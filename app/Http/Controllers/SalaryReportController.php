<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
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
    public function index(Request $request){
        $salaries = working_hour_log::with('user_log')->select(
            'working_hour_log.*',
            DB::raw('SUM(late) as total_late'),
            DB::raw('SUM(soon) as total_soon'),
            DB::raw('SUM(leave_absence) as total_leave_absence'),
            DB::raw('SUM(unauthorized_absence) as total_unauthorized_absence'),
            DB::raw('SUM(amount_timekeeping) as total_amount_timekeeping')
        );

        if (isset($request->month)) {
            $array_month = explode('-', $request->month);
            $month = $array_month[1];
            $year = $array_month[0];

            $salaries = $salaries->whereMonth('date', $month)->whereYear('date', $year);
        }
        else {
            $salaries = $salaries->whereMonth('date', date('m'))->whereYear('date', date('Y'));
        }

        $salaries = $salaries
        ->groupBy('u_id')
        // ->orderBy('date', 'desc')
        ->paginate(50)
        ->appends(['month' => $request->month]);
        //dd($a);
        return view('salary-report.index', compact('salaries'));


    }


    // public function index(Request $request) {
    //     $years = working_hour_log::select('year')
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
