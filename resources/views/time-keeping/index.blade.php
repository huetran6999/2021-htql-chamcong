@extends('layout.index')
@section('content')
<div class="container">
    <form action="{{ route('timeKeeping.index')}}" method="get">
        @csrf
        <label for="years">Năm:</label>
        <select name="years" id="years">
            <option disabled selected>--Chọn Năm--</option>
            @foreach ($years as $year)
            <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>

        <label for="months">Tháng:</label>
        <select name="months" id="months">
            <option disabled selected>--Chọn tháng--</option>
            @foreach ($months as $month)
            <option value="{{ $month }}">{{ $month }}</option>
            @endforeach
        </select>

        <input type="submit" value="Submit">
    </form>
    <form action="{{ route('timeKeeping.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import Data</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timeKeepings as $timeKeeping)
            <tr>
                <td>{{ $timeKeeping->user->username }} - {{ $timeKeeping->user->u_name }}</td>
                <td>{{ $timeKeeping->total }}</td>
                <td>{{ $timeKeeping->month }}-{{ $timeKeeping->year }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection