<?php

namespace App\Http\Controllers;

use App\Models\TimeKeeping;
use App\Models\working_hour_log;
use App\Imports\TimeKeepingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class TimeKeepingController extends Controller
{
    public function index(Request $request) {
        $timeKeepings = working_hour_log::with('user_log')->select(
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

            $timeKeepings = $timeKeepings->whereMonth('date', $month)->whereYear('date', $year);
        }
        else {
            $timeKeepings = $timeKeepings->whereMonth('date', date('m'))->whereYear('date', date('Y'));
        }

        $timeKeepings = $timeKeepings
        ->groupBy('u_id')
        // ->orderBy('date', 'desc')
        ->paginate(50)
        ->appends(['month' => $request->month]);

        return view('time-keeping.index', compact('timeKeepings'));
    }

    
    public function import() 
    {
        Excel::import(new TimeKeepingImport,request()->file('file'));
        return redirect()->back();
    }
}
