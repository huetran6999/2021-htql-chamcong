@extends('layout.index')
@section('content')
<div class="container">
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px; position:relative">Danh sách chấm công</h3>

    <form action="{{ route('timeKeeping.index') }}" method="GET">
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

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Phòng ban</th>
                <th>Chức vụ</th>
                <th>Đi muộn</th>
                <th>Về sớm</th>
                <th>Phạt</th>
                <th>Nghỉ phép</th>
                <th>Nghỉ không phép</th>
                <th>Số công làm</th>
                <th>Tổng công nhận</th>
                <th>Thời điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timeKeepings as $timeKeeping)
            @php
                // Phạt
                $penalize = floor($timeKeeping->total_late/3) + floor($timeKeeping->total_soon/3);

                // Nghỉ quá phép
                $excessive_leave = 0;
                $leave_absence = 0;
                if ($timeKeeping->total_leave_absence > 1) {
                    $excessive_leave = $timeKeeping->total_leave_absence - 1;
                    $leave_absence = 1;
                }
                elseif ($timeKeeping->total_leave_absence > 0 && $timeKeeping->total_leave_absence <= 1){
                    $leave_absence = $timeKeeping->total_leave_absence;
                }

            @endphp
            <tr>
                <td>{{$loop -> index + 1}}</td>
                <td>{{ $timeKeeping->user_log->id }} - {{ $timeKeeping->user_log->u_name }}</td>
                <td>{{ $timeKeeping->user_log->position->dep_pos->d_name }}</td>
                <td>{{ $timeKeeping->user_log->position->p_name }}</td>
                <td>{{ $timeKeeping->total_late }}</td>
                <td>{{ $timeKeeping->total_soon }}</td>
                <td>{{ $penalize }}</td>
                <td>{{ $timeKeeping->total_leave_absence }}</td>
                <td>{{ $timeKeeping->total_unauthorized_absence }}</td>
                <td>{{ $timeKeeping->total_amount_timekeeping }}</td>
                <td>{{ $timeKeeping->total_amount_timekeeping + $leave_absence - $penalize - $excessive_leave }}</td>
                <td>{{ date_format(new DateTime($timeKeeping->date), "m-Y") }}</td>
                {{-- <td>{{ $timeKeeping->month }}-{{ $timeKeeping->year }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    

    {{-- <form action="{{ route('timeKeeping.import') }}" method="POST" enctype="multipart/form-data" class="row g-3" style="float: left">
        @csrf
        <div class="form-group col-md-10">
            <label for="file">Chọn file chấm công</label>
            <input type="file" name="file" id="file" class="form-control">
            
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-file-import"></i></button>
            
        </div>
    </form> --}}

    <div style="float: right">
        {{ $timeKeepings->links() }}
    </div>
</div>
@endsection