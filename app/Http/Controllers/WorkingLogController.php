<?php

namespace App\Http\Controllers;

use App\Imports\WorkingLogImport;
use App\Models\working_hour_log;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

class WorkingLogController extends Controller
{
    public function index(Request $request) {

        $log = working_hour_log::with('user')->select('u_id', 'date', 'am_in', 'am_out', 'pm_in', 'pm_out')->get();

        $date = working_hour_log::select('date')
        ->groupBy('date')
        ->pluck('date');

        return view('working_log.index', compact('log', 'date', 'dt_am_in'));
    }

    public function import(){
        Excel::import(new WorkingLogImport, request()->file('file'));
        return redirect()->back()->with('success','Import dữ liệu thành công');
    }
}
