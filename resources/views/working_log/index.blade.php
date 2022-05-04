@extends('layout.index')
@section('content')
<div class="container">
    
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px; position:relative">Danh sách chấm công theo giờ</h3>
    
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    <form action="{{ route('workinglog_import') }}" method="POST" enctype="multipart/form-data" class="row g-3" style="float: left">
        @csrf

        <div class="col-md-5">
            {{-- <label for="years" class="form-label">Năm:</label> --}}
            <select name="years" id="years" class="form-select">
                <option disabled selected>--Chọn Năm--</option>
                @foreach ($dates as $date)
                <option value="{{ $date->getYears() }}">{{ $date->getYears() }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            {{-- <label for="months" class="form label">Tháng:</label> --}}
            <select name="months" id="months" class="form-select" disabled>
                <option disabled selected>--Chọn tháng--</option>
                @foreach ($dates as $date)
                <option value="{{ $date->getMonths() }}">{{ $date->getMonths() }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            {{-- <input type="submit" value="Submit" class="btn btn-primary"> --}}
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-primary">
            <tr>
                {{-- <th>STT</th> --}}
                <th>Ngày</th>
                <th>Họ và tên</th>
                <th>Vào ca sáng</th>
                <th>Ra ca sáng</th>
                <th>Vào ca chiều</th>
                <th>Ra ca chiều</th>
                <th>Đi trễ (p)</th>
                <th>Về sớm (p)</th>
                <th>Thời gian làm cả ngày</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            
            @php
                $am_checkin = "07:30:00";
                $am_checkout = "11:30:00";
                $pm_checkout = "17:00:00";
                $pm_checkin = "13:00:00";
                $am_log_in = abs(strtotime($am_checkin) - strtotime($log->am_in))/60;
                $pm_log_in = abs(strtotime($pm_checkin) - strtotime($log->pm_in))/60;
                $am_log_out = abs(strtotime($am_checkout) - strtotime($log->am_out))/60;
                $pm_log_out = abs(strtotime($pm_checkout) - strtotime($log->pm_out))/60;
                $soon = floor($am_log_out + $pm_log_out);
                $late = floor($am_log_in + $pm_log_in);
                $working_log = round((abs(strtotime($log->am_out) - strtotime($log->am_in)) + abs(strtotime($log->pm_out) - strtotime($log->pm_in)))/3600);

            @endphp
            <tr>
                {{-- <td>{{$loop -> index + 1}}</td> --}}
                <td>{{ $log->getDays() }}/{{ $log->getMonths() }}/{{ $log->getYears() }}</td>
                <td>{{ $log->user_log->id }} - {{ $log->user_log->u_name }}</td>
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
                <td>{{ $working_log }}h</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    


        <div class="form-group col-md-10">
            {{-- <label for="file">Chọn file chấm công</label> --}}
            <input type="file" name="file" id="file" class="form-control">
            
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-file-import"></i></button>
            
        </div>
    </form>

    {{-- <div style="float: right">
        {{ $timeKeepings->links() }}
    </div> --}}
</div>
@endsection