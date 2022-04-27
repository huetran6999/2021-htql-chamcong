@extends('layout.index')
@section('content')
<div class="container">
    
    <form action="{{ route('salaryReport.index')}}" method="get" style="padding-top: 20px" class="row g-3">
        @csrf
        <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 10px">Danh sách lương</h3>
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
            <select name="months" id="months" class="form-select" disabled>
                <option disabled selected>--Chọn tháng--</option>
                @foreach ($months as $month)
                <option value="{{ $month }}" >{{ $month }}</option>
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
                <th>Số ngày công</th>
                <th>Lương trước thuế</th>
                <th>Lương sau thuế</th>
                <th>Đơn vị</th>
                <Th>Tháng</Th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @php
            $salary = $user->user->position->basic_salary * $user->user->position->salary->coefficient_salary ; //lcb*hsl
            $socialInsurance = $salary * 10.5 / 100; //bảo hiểm xã hội = salary - hcb*hsl(100%-10.5%)
            $gross_salary2 = ($salary * $user->total / 24) - $socialInsurance; //lương ròng tháng 2
            $gross_salary = ($salary * $user->total / 26) - $socialInsurance; //lương ròng các tháng còn lại
            $tax = $gross_salary * 10 / 100; //thuế = 10% salary
            if ($gross_salary2 >= 10000000 || $gross_salary >= 10000000) {
                $net_salary2 = $gross_salary2 - $tax;
                $net_salary = $gross_salary - $tax;
            }
            
            @endphp
            <tr>
                <td>{{ $loop-> index + 1 }}</td>
                <td>{{ $user->user->username }} - {{ $user->user->u_name }}</td>
                <td>{{ $user->total}}</td>
                @if ($user->month === 2)
                <td> {{ number_format(($gross_salary2), 0, ',', ',') }}</td>
                @else
                <td> {{ number_format(($gross_salary), 0, ',', ',') }}</td>
                @endif
                {{-- <td>{{ $user->position>p_name }}</td> --}}
                @if ($user->month === 2)
                <td> {{ number_format(($net_salary2), 0, ',', ',') }}</td>
                @else
                <td> {{ number_format(($net_salary), 0, ',', ',') }}</td>
                @endif
                <td>VNĐ</td>
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