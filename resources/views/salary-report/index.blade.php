@extends('layout.index')
@section('content')
<div class="container">
    
    <form action="{{ route('salaryReport.index')}}" method="get" style="padding-top: 20px" class="row g-3">
        @csrf
        <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 10px">Danh sách lương</h3>
        <div class="row">
            <div class="col-md-5">
                <input type="month" class="form-control" name="month">
            </div>

            <div class="col-md-2">
                {{-- <input type="submit" value="Submit" class="btn btn-primary"> --}}
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>   

        
    </form>
    <table class="table table-bordered table-hover mt-3">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Chức vụ</th>
                <th>Số ngày công</th>
                <th>Lương trước thuế</th>
                <th>Lương sau thuế</th>
                <th>Đơn vị</th>               
                <Th>Tháng</Th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaries as $s)
            @php
            $basic_salary = $s->user_log->position->basic_salary; 
            $coefficient = $s->user_log->position->salary->coefficient_salary; 
            $salary = $basic_salary * $coefficient; //lcb*hsl
            $socialInsurance = $salary * 10.5 / 100; //bảo hiểm xã hội = 10.5% salary
            $gross_salary = ($salary * $s->total_amount_timekeeping / 22) - $socialInsurance; //mỗi tháng làm 22 ngày
            // // $gross_salary = ($salary * $user->total_amount_timekeeping)
            $tax = $gross_salary * 10 / 100; //thuế = 10% salary
            if ($gross_salary >= 10000000) {
                $net_salary = $gross_salary - $tax;
            } else {
                $net_salary = $gross_salary;
            }
            
            @endphp
            <tr>
                <td>{{ $loop-> index + 1 }}</td>
                <td>{{ $s->user_log->id }} - {{ $s->user_log->u_name }}</td>
                <td>{{ $s->user_log->position->p_name }}</td>
                <td>{{ $s->total_amount_timekeeping}}</td>
                <td> {{number_format(($gross_salary), 0, ',', ',')}}</td>
                <td> {{ number_format(($net_salary), 0, ',', ',') }}</td>
                <td>VNĐ</td>                
                <Th>{{date_format(new DateTime($s->date), "m-Y") }}</Th>
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