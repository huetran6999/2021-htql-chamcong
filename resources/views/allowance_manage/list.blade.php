@extends('layout.index')
@section('content')

<div class="container">
  <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách phụ cấp theo chức vụ</h3>
    <div class="bg-light col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @if (Session::has('success'))
          <div class="alert alert-success">
            <strong>{{Session::get('success')}}</strong>
          </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead align="center" class="table-primary">
                        <tr>
                            <th>STT</th>
                            <th>Chức vụ</th>
                            <th>Tiền ăn trưa</th>
                            <th>Tiền xăng xe</th>
                            <th>Khác</th>
                            <th>Tổng tiền phụ cấp</th>
                            <th>Đơn vị</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allowance as $a)
                            <tr>
                                <td  align="center">{{$loop-> index + 1 }}</td>
                                <td>{{$a->position->p_name}} - {{$a->position->dep_pos->d_name}}</td>
                                <td  align="center">{{ number_format($a->lunch_fee)}}</td>
                                <td  align="center">{{ number_format($a->gas_fee)}}</td>
                                <td  align="center">{{ number_format($a->others)}}</td>
                                <td  align="center"><strong>{{ number_format($a->total)}}</strong></td>
                                <td>đ/tháng</td>
                                <td  align="center">
                                    <a href="{{ route('edit_allowance', $a->p_id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>