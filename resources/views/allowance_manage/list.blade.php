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
                    <thead align="center">
                        <tr>
                            <th>Chức vụ</th>
                            <th>Tiền ăn trưa</th>
                            <th>Tiền xăng xe</th>
                            <th>Khác</th>
                            <th>Tổng tiền phụ cấp</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allowance as $a)
                            <tr>
                                <td>{{$a->position->p_name}} - {{$a->position->dep_pos->d_name}}</td>
                                <td>{{$a->lunch_fee}}</td>
                                <td>{{$a->gas_fee}}</td>
                                <td>{{$a->others}}</td>
                                <td>{{$a->total}}</td>
                                <td>Sửa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>