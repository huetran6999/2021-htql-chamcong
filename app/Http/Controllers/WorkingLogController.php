<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogRequest;
use App\Imports\WorkingLogImport;
use App\Models\working_hour_log;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Support\Facades\Log;

class WorkingLogController extends Controller
{
    public function index(Request $request) {
        $logs = working_hour_log::with('user_log');

        if (isset($request->month)) {
            $array_month = explode('-', $request->month);
            $month = $array_month[1];
            $year = $array_month[0];

            $logs = $logs->whereMonth('date', $month)->whereYear('date', $year);
        }

        $logs = $logs->orderBy('date', 'desc')->paginate(50)->appends(['month' => $request->month]);
        

        return view('working_log.index', compact('logs'));
    }


    public function import(){
        Excel::import(new WorkingLogImport, request()->file('file'));
       
        return redirect()->back()->with('success','Nhập dữ liệu thành công');
    }

    public function edit($id)
    {
        $working_hour_log = working_hour_log::find($id);

        $data = [
            'working_hour_log' => $working_hour_log,
        ];

        return view('working_log.edit', $data);
    }

    public function checkinAm($id)
    {
        try {
            DB::beginTransaction();

            $working_hour_log = working_hour_log::find($id);

            if (isset($working_hour_log->pm_out)) {
                $working_hour_log->update([
                    'am_in' => '07:30:00',
                    'amount_timekeeping' => 1,
                ]);
            }
            elseif (isset($working_hour_log->am_out)) {
                $working_hour_log->update([
                    'am_in' => '07:30:00',
                    'amount_timekeeping' => 0.5,
                ]);
            }
            else {
                $working_hour_log->update([
                    'am_in' => '07:30:00'
                ]);
            }
            
            DB::commit();
            return redirect()->back()->with('alert-success','Checkin ca sáng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Checkin ca sáng thất bại!');
        }
    }

    public function checkoutAm($id)
    {
        try {
            DB::beginTransaction();

            $working_hour_log = working_hour_log::find($id);

            if (isset($working_hour_log->am_in) && isset($working_hour_log->pm_out)) {
                $working_hour_log->update([
                    'am_out' => '11:30:00',
                    'amount_timekeeping' => 1,
                ]);
            }
            elseif (isset($working_hour_log->am_in) && empty($working_hour_log->pm_out)) {
                $working_hour_log->update([
                    'am_out' => '11:30:00',
                    'amount_timekeeping' => 0.5,
                ]);
            }
            else {
                $working_hour_log->update([
                    'am_out' => '11:30:00',
                ]);
            }
            
            DB::commit();
            return redirect()->back()->with('alert-success','Checkout ca sáng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Checkout ca sáng thất bại!');
        }
    }

    public function checkinPm($id)
    {
        try {
            DB::beginTransaction();

            $working_hour_log = working_hour_log::find($id);

            if (isset($working_hour_log->am_in) && isset($working_hour_log->pm_out)) {
                $working_hour_log->update([
                    'pm_in' => '13:00:00',
                    'amount_timekeeping' => 1,
                ]);
            }
            elseif (isset($working_hour_log->pm_out)) {
                $working_hour_log->update([
                    'pm_in' => '13:00:00',
                    'amount_timekeeping' => 0.5,
                ]);
            }
            else {
                $working_hour_log->update([
                    'pm_in' => '13:00:00',
                ]);
            }
            
            DB::commit();
            return redirect()->back()->with('alert-success','Checkin ca chiều thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Checkin ca chiều thất bại!');
        }
    }

    public function checkoutPm($id)
    {
        try {
            DB::beginTransaction();

            $working_hour_log = working_hour_log::find($id);

            if (isset($working_hour_log->am_in)) {
                $working_hour_log->update([
                    'pm_out' => '17:00:00',
                    'amount_timekeeping' => 1,
                ]);
            }
            elseif (isset($working_hour_log->pm_in)) {
                $working_hour_log->update([
                    'pm_out' => '17:00:00',
                    'amount_timekeeping' => 0.5,
                ]);
            }
            else {
                $working_hour_log->update([
                    'pm_out' => '17:00:00',
                ]);
            }
            
            DB::commit();
            return redirect()->back()->with('alert-success','Checkout ca chiều thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Checkout ca chiều thất bại!');
        }
    }

    public function createLeaveAbsence()
    {
        $users = User::all();

        $data = [
            'users' => $users,
        ];

        return view('working_log.create', $data);
    }

    public function storeLeaveAbsence(LogRequest $request)
    {
        try {
            DB::beginTransaction();

            $check = working_hour_log::where('u_id', $request->u_id)->where('date', $request->date)->exists();
            if (!$check) {
                working_hour_log::create([
                    'u_id' => $request->u_id,
                    'date' => $request->date,
                    'leave_absence' => $request->shift,
                ]);
            }
            else {
                return redirect()->back()->with('error','Thêm ngày nghỉ thất bại! Người này đã có dữ liệu chấm công!');
            }

            DB::commit();
            return redirect()->route('workinglog_index')->with('success','Thêm ngày nghỉ thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error','Thêm ngày nghỉ thất bại!');
        }
    }
}
