@extends('layout.index')
@section('content')
<div class="container">
    <form action="{{ route('timeKeeping.index')}}" method="get" class="row g-3" style="padding-top: 56px">
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
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
    

    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Nhân viên</th>
                <th>Tổng ngày chấm công</th>
                <th>Thời điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timeKeepings as $timeKeeping)
            <tr>
                <td>{{$loop -> index + 1}}</td>
                <td>{{ $timeKeeping->user->username }} - {{ $timeKeeping->user->u_name }}</td>
                <td>{{ $timeKeeping->total }}</td>
                <td>{{ $timeKeeping->month }}-{{ $timeKeeping->year }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('timeKeeping.import') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="form-group col-md-10">
            {{-- <label for="file">Chọn file chấm công</label> --}}
            <input type="file" name="file" id="file" class="form-control">
            
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-file-import"></i> Nhập</button>
            
        </div>
    </form>
</div>
@endsection