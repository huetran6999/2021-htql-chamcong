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
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Phòng ban</th>
                <th>Chức vụ</th>
                <th>Vào ca sáng</th>
                <th>Ra ca sáng</th>
                <th>Vào ca chiều</th>
                <th>Ra ca chiều</th>
                <th>Thời gian làm sáng</th>
                <th>Thời gian làm chiều</th>
                <th>Thời gian làm cả ngày</th>
                <th>Ngày</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($log as $log)
            @php
                $am_checkin = new DateTime($log->user_log->working_log->am_in);
            @endphp
            <tr>
                <td>{{$loop -> index + 1}}</td>
                <td>{{ $log->user_log->username }} - {{ $log->user_log->u_name }}</td>
                <td>{{$log->user_log->department->d_name}}</td>
                <td>{{$log->user_log->position->p_name}}</td>
                <td>{{ $log->am_in }}</td>
                <td>{{ $log->am_out }}</td>
                <td>{{ $log->pm_in }}</td>
                <td>{{ $log->pm_out }}</td>
                <td>{{ $am_checkin }}</td>
                <td>{{ $am_out_log }}</td>
                <td>{{ $log->date }}</td>
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