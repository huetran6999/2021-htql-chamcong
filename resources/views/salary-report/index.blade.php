@extends('layout.index')
@section('content')
<div class="container">
    <form action="{{ route('salaryReport.index')}}" method="get">
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
    <table class="table">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Salary</th>
                <Th>Date</Th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @php
            $salary = $user->user->position->basic_salary * $user->user->salary->coefficient_salary ;
            $socialInsurance = $salary * 10.5 / 100;
            $tax = $salary * 10 / 100;
            @endphp
            <tr>
                <td>{{ $user->user->username }} - {{ $user->user->u_name }}</td>
                @if ($user->month === 2)
                <td>đ {{ number_format((($salary * $user->total / 24) - $socialInsurance - $tax), 0, ',', ',') }}</td>
                @else
                <td>đ {{ number_format((($salary * $user->total / 26) - $socialInsurance - $tax), 0, ',', ',') }}</td>
                @endif
                <Th>{{ $user->month }}-{{ $user->year }}</Th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection