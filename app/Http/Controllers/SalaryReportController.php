<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Models\TimeKeeping;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class SalaryReportController extends Controller
{
    public function index(Request $request) {
        $users = TimeKeeping::with('user')->select('u_id', 'total', 'month', 'year')->get();
        if ($request->has('years') && $request->has('months')) {
            $users = TimeKeeping::with('user')->where([['year', 'LIKE', '%' . $request->years . '%'], ['month', 'LIKE', '%' . $request->months . '%']])
            ->select('u_id', 'total', 'month', 'year')->get();
        }
        
        else if ($request->has('years')) {
            $users = TimeKeeping::with('user')->where('year', 'LIKE', '%' . $request->years . '%')->select('u_id', 'total', 'month', 'year')->get();
        }

        else if ($request->has('months')) {
            $users = TimeKeeping::with('user')->where('month', 'LIKE', '%' . $request->months . '%')->select('u_id', 'total', 'month', 'year')->get();
        }
        else {
            $users = TimeKeeping::with('user')->select('u_id', 'total', 'month', 'year')->get();
        }

        $years = TimeKeeping::select('year')
        ->groupBy('year')
        ->pluck('year');

        $months = TimeKeeping::select('month')
        ->groupBy('month')
        ->pluck('month');

        return view('salary-report.index', compact('users', 'years', 'months'));
    }
}
