@extends('layout.index')
@section('content')
<div class="container">
    
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px; position:relative">Danh sách chấm công theo giờ</h3>
    
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif
    <form action="{{ route('workinglog_import') }}" method="POST" enctype="multipart/form-data" class="row g-3" style="float: left">
        @csrf

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
                <th>Đi trễ</th>
                <th>Về sớm</th>
                <th>Thời gian làm cả ngày</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            @php
                $am_checkin = "07:30:00";
                $pm_checkout = "17:00:00";
                $am_log_in = (strtotime($am_checkin) - strtotime($log->am_in))/60;
                $pm_log_out = (strtotime($pm_checkout) - strtotime($log->pm_out))/60;
                $working_log = (abs(strtotime($log->am_out) - strtotime($log->am_in)) + abs(strtotime($log->pm_out) - strtotime($log->pm_in)))/3600
            @endphp
            <tr>
                {{-- <td>{{$loop -> index + 1}}</td> --}}
                <td>{{ $log->date }}</td>
                <td>{{ $log->user_log->id }} - {{ $log->user_log->u_name }}</td>
                <td>{{ $log->am_in }}</td>
                <td>{{ $log->am_out }}</td>
                <td>{{ $log->pm_in }}</td>
                <td>{{ $log->pm_out }}</td>
                @if ($am_log_in < 0)
                    <td>Trễ {{ 0 - $am_log_in }}'</td> 
                @else
                    <td>x</td>
                @endif      
                @if ($pm_log_out < 0)
                    <td>Sớm {{ 0 - $pm_log_out }}'</td> 
                @else
                    <td>x</td>
                @endif
                <td>{{ $working_log }}</td>
                
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