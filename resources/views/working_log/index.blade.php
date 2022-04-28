@extends('layout.index')
@section('content')
<div class="container">
    
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px; position:relative">Danh sách chấm công</h3>
    
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

    <form action="{{ route('workinglog_index')}}" method="get" class="row g-3 mt-1">
        @csrf
    </form>    

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
            {{-- @php
                $am_time = 
            @endphp --}}
            @foreach ($log as $log)
            <tr>
                <td>{{$loop -> index + 1}}</td>
                <td>{{ $log->user->username }} - {{ $log->user->u_name }}</td>
                <td>{{$log->user->department->d_name}}</td>
                <td>{{$log->user->position->p_name}}</td>
                <td>{{ $log->am_in }}</td>
                <td>{{ $log->am_out }}</td>
                <td>{{ $log->pm_in }}</td>
                <td>{{ $log->pm_out }}</td>
                {{-- <td>{{ $log->sub }}</td> --}}
                <td>{{ $log->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    

    <form action="{{ route('workinglog_import') }}" method="POST" enctype="multipart/form-data" class="row g-3" style="float: left">
        @csrf
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