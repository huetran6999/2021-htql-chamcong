@extends('layout.index')
@section('content')
<div class="container">
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px; position:relative">Danh sách chấm công</h3>
    <form action="{{ route('timeKeeping.index')}}" method="get" class="row g-3 mt-1">
        @csrf
        
        <div class="col-md-5">
            {{-- <label for="years" class="form-label">Năm:</label> --}}
            <select name="years" id="years" class="form-select">
                <option disabled selected>--Chọn Năm--</option>
                @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-5">
            {{-- <label for="months" class="form label">Tháng:</label> --}}
            <select name="months" id="months" class="form-select">
                <option disabled selected>--Chọn tháng--</option>
                @foreach ($months as $month)
                <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            {{-- <input type="submit" value="Submit" class="btn btn-primary"> --}}
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </form>
    

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Phòng ban</th>
                <th>Chức vụ</th>
                <th>Tổng số ngày công</th>
                <th>Thời điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timeKeepings as $timeKeeping)
            <tr>
                <td>{{$loop -> index + 1}}</td>
                <td>{{ $timeKeeping->user->username }} - {{ $timeKeeping->user->u_name }}</td>
                <td>{{$timeKeeping->user->department->d_name}}</td>
                <td>{{$timeKeeping->user->position->p_name}}</td>
                <td>{{ $timeKeeping->total }}</td>
                <td>{{ $timeKeeping->month }}-{{ $timeKeeping->year }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    

    <form action="{{ route('timeKeeping.import') }}" method="POST" enctype="multipart/form-data" class="row g-3" style="float: left">
        @csrf
        <div class="form-group col-md-10">
            {{-- <label for="file">Chọn file chấm công</label> --}}
            <input type="file" name="file" id="file" class="form-control">
            
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-file-import"></i></button>
            
        </div>
    </form>

    <div style="float: right">
        {{ $timeKeepings->links() }}
    </div>
</div>
@endsection