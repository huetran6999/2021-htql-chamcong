<?php

namespace App\Http\Controllers;

use App\Models\TimeKeeping;
use App\Imports\TimeKeepingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class TimeKeepingController extends Controller
{
    public function index(Request $request) {

        $timeKeepings = TimeKeeping::with('user')->select('u_id', 'total', 'month', 'year')->paginate(10);
        // $timeKeepings = TimeKeeping::with('user')->select('u_id', 'total', 'month', 'year')->get();
        
        if ($request->has('years')) {
            $timeKeepings = TimeKeeping::with('user')->where('year', 'LIKE', '%' . $request->years . '%')->select('u_id', 'total', 'month', 'year')->get();
        }
        if ($request->has('months')) {
            $timeKeepings = TimeKeeping::with('user')->where('month', 'LIKE', '%' . $request->months . '%')->select('u_id', 'total', 'month', 'year')->get();
        }
        if ($request->has('years') && $request->has('months')) {
            $timeKeepings = TimeKeeping::with('user')->where([['year', 'LIKE', '%' . $request->years . '%'], ['month', 'LIKE', '%' . $request->months . '%']])->select('u_id', 'total', 'month', 'year')->get();
        }

        $years = TimeKeeping::select('year')
        ->groupBy('year')
        ->pluck('year');

        $months = TimeKeeping::select('month')
        ->groupBy('month')
        ->pluck('month');

        return view('time-keeping.index', compact('timeKeepings', 'months', 'years'));
    }

    
    public function import() 
    {
        Excel::import(new TimeKeepingImport,request()->file('file'));
        return redirect()->back();
    }
}
