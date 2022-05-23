@extends('layout.index')
@section('content')
<div class="container">
    
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px; position:relative">Lịch sử chấm công</h3>
    
    <div class="card">
        <div class="card-header">
            <h5> Nhân viên: <strong>{{Auth::user()->id}} - {{Auth::user()->u_name}}</strong> </h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <h6 class="alert alert-success"><strong>{{ session('success') }}</strong></h6>
            @endif

            @if (session('error'))
                <h6 class="alert alert-danger"><strong>{{ session('error') }}</strong></h6>
            @endif

            @if (session('failed'))
                <h6 class="alert alert-danger"><strong>{{ session('failed') }}</strong></h6>
            @endif
            
            <form action="{{ route('Timekeeping_Info') }}" method="GET" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <input type="month" class="form-control" name="month">
                    </div>

                    <div class="col-md-2">
                        {{-- <input type="submit" value="Submit" class="btn btn-primary"> --}}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            

            <div class="col-md-12">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="table-primary">
                        <tr>
                            {{-- <th>STT</th> --}}
                            <th>Ngày</th>
                            <th>Vào ca sáng</th>
                            <th>Ra ca sáng</th>
                            <th>Vào ca chiều</th>
                            <th>Ra ca chiều</th>
                            <th>Đi trễ (p)</th>
                            <th>Về sớm (p)</th>
                            <th>Đi muộn</th>
                            <th>Về sớm</th>
                            <th>Nghỉ phép</th>
                            <th>Nghỉ không phép</th>
                            <th>Số chấm công</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        @php
                        $am_checkin = "07:30:00";
                        $am_checkout = "11:30:00";
                        $pm_checkout = "17:00:00";
                        $pm_checkin = "13:00:00";
                        $late_am = 0;
                        $late_pm = 0;
                        $soon_am = 0;
                        $soom_pm = 0;
                        // Tính muộn sáng
                        if (isset($log->am_in)) {
                            $late_am = (strtotime($am_checkin) - strtotime($log->am_in))/60;
                            $late_am = ($late_am < 0) ? abs($late_am) : 0;
                        }
                        // Tính muộn chiều
                        if (isset($log->pm_in)) {
                            $late_pm = (strtotime($pm_checkin) - strtotime($log->pm_in))/60;
                            $late_pm = ($late_pm < 0) ? abs($late_pm) : 0;
                        }
                        // Tính về sớm sáng
                        if (isset($log->am_out)) {
                            $soon_am = (strtotime($am_checkout) - strtotime($log->am_out))/60;
                            $soon_am = ($soon_am < 0) ? abs($soon_am) : 0;
                        }
                        // Tính về sớm chiều
                        if (isset($log->pm_out)) {
                            $soom_pm = (strtotime($pm_checkout) - strtotime($log->pm_out))/60;
                            $soom_pm = ($soom_pm < 0) ? abs($soom_pm) : 0;
                        }
                        $soon = floor($soon_am + $soom_pm);
                        $late = floor($late_am + $late_pm);
                        

                        // $am_log_in = (strtotime($am_checkin) - strtotime($log->am_in))/60;
                        // $pm_log_in = abs(strtotime($pm_checkin) - strtotime($log->pm_in))/60;
                        // $am_log_out = abs(strtotime($am_checkout) - strtotime($log->am_out))/60;
                        // $pm_log_out = abs(strtotime($pm_checkout) - strtotime($log->pm_out))/60;
                        // dd($am_log_in, $pm_log_in);
                        // $soon = floor($am_log_out + $pm_log_out);
                        // $late = floor($am_log_in + $pm_log_in);
                        $working_log = round((abs(strtotime($log->am_out) - strtotime($log->am_in)) + abs(strtotime($log->pm_out) - strtotime($log->pm_in)))/3600);

                        @endphp
                        <tr>
                            {{-- <td>{{$loop -> index + 1}}</td> --}}
                            <td>{{ $log->getDays() }}/{{ $log->getMonths() }}/{{ $log->getYears() }}</td>
                            <td>{{ $log->am_in }}</td>
                            <td>{{ $log->am_out }}</td>
                            <td>{{ $log->pm_in }}</td>
                            <td>{{ $log->pm_out }}</td>
                            @if ($log->am_in > $am_checkin || $log->pm_in > $pm_checkin)
                            <td>{{ $late }}</td> 
                            @else
                            <td>0</td>
                            @endif    
                            @if ($log->am_out < $am_checkout || $log->pm_out < $pm_checkout)
                            <td>{{ $soon }}</td> 
                            @else
                            <td>0</td>
                            @endif
                            <td>{{ $log->late }}</td>
                            <td>{{ $log->soon }}</td>
                            <td>{{ $log->leave_absence }}</td>
                            <td>{{ $log->unauthorized_absence }}</td>
                            <td>{{ $log->amount_timekeeping }}</td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <hr>





</div>
@endsection