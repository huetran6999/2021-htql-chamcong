@extends('layout.index')
@section('content')
<div class="container">
    <form action="{{ route('salaryReport.index')}}" method="get" style="padding-top: 56px" class="row g-3">
        @csrf
        <div class="col-md-5 form-inline">
        {{-- <label for="years" class="form-label">Năm:</label> --}}
        <select name="years" id="years" class="form-select">
            <option disabled selected>--Chọn Năm--</option>
            @foreach ($years as $year)
            <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-5">
        {{-- <label for="months" class="form-label">Tháng:</label> --}}
        <select name="months" id="months" class="form-select">
            <option disabled selected>--Chọn tháng--</option>
            @foreach ($months as $month)
            <option value="{{ $month }}">{{ $month }}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-2">
            <input type="submit" value="Duyệt" class="btn btn-primary">
        </div>    

        
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Nhân viên</th>
                <th>Lương</th>
                <Th>Ngày</Th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @php
            $salary = $user->user->position->basic_salary * $user->user->position->salary->coefficient_salary ; //gross-salary
            $socialInsurance = $salary * 10.5 / 100; //bảo hiểm xã hội
            $tax = $salary * 10 / 100; //thuế
            @endphp
            <tr>
                <td>{{ $loop-> index + 1 }}</td>
                <td>{{ $user->user->username }} - {{ $user->user->u_name }}</td>
                @if ($user->month === 2)
                <td> {{ number_format((($salary * $user->total / 24) - $socialInsurance - $tax), 0, ',', ',') }} VNĐ</td>
                @else
                <td> {{ number_format((($salary * $user->total / 26) - $socialInsurance - $tax), 0, ',', ',') }} VNĐ</td>
                @endif
                <Th>{{ $user->month }}-{{ $user->year }}</Th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection