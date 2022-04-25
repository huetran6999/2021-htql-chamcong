@extends('layout.index')
@section('content')
<div class="container">
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách lương</h3>
    <form action="{{ route('salaryReport.index')}}" method="get" style="padding-top: 20px" class="row g-3">
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
                {{-- <th>Phòng ban</th>
                <th>Chức vụ</th> --}}
                <th>Lương</th>
                <Th>Tháng</Th>
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
                {{-- @foreach ($pos as $p)
                
                <td>{{ $p->p_name }}</td>
                
                
                @endforeach --}}
                
                {{-- <td>{{ $user->position>p_name }}</td> --}}
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
    <hr>
    {{-- <div style="float: right">
        {{$users->links();}}
    </div> --}}
</div>
@endsection