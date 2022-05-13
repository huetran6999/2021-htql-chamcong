@extends('layout.index')
@section('content')

<div class="container">
  <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách hợp đồng</h3>
    <div class="bg-light col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @if (Session::has('success'))
          <div class="alert alert-success">
            <strong>{{Session::get('success')}}</strong>
          </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <h5>Nhân viên: {{$user->u_name}}</h5>
                <a href="{{ url('create-contract/'.$user->id) }}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br>
                <h5>Hợp đồng đang sử dụng</h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>Số hợp đồng</th>
                            <th>Ngày lập hợp đồng</th>
                            <th>Loại hợp đồng</th>
                            <th>Người lập hợp đồng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contract as $contract)
                            @if ($contract->w_status == "0")
                                <tr>
                                    <td>{{$contract->id}}</td>
                                    <td>{{date('d-m-Y', strtotime($contract->created_at))}}</td>
                                    <td>
                                        @if ($contract->w_type == 1)
                                            <span>Hợp đồng lao động thử việc</span>
                                        @elseif($contract->w_type == 2)
                                            <span>Hợp đồng lao động có thời hạn xác định</span>
                                        @elseif ($contract->w_type == 3)
                                            <span>Hợp đồng lao động không có thời hạn xác định</span>
                                        @endif
                                    </td>
                                    <td>{{$contract->creator}}</td>
                                    <td class="text-right" align="center">
                                        {{-- Nút xem --}}
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-eye"></i></button>
                                        {{-- Nút sửa --}}
                                        <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        {{-- Nút xoá --}}
                                        <a href="#" class="btn btn-danger btn-delete btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá hợp đồng {{$contract->id}} không?')"><i class="fa fa-trash"></i></a>
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content" style="padding: 10px;padding-bottom: 40px;">
                                                    <div>
                                                        <h5>Chi tiết hợp đồng: {{$contract->id}} - {{$contract->user->u_name}}</h5>
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr align="center">
                                                                    <th>Nhân viên</th>
                                                                    <th>Ngày bắt đầu hợp đồng</th>
                                                                    <th>Mức lương cơ bản</th>
                                                                    <th>Phụ cấp</th>
                                                                    <th>Ngày kết thúc hợp đồng</th>
                                                                    <th>Trạng thái</th>                                                                                     
                                                                </tr>
                                                            </thead>
                                                            <tbody>   
                                                                <tr align="center">                                 
                                                                    <td>{{$contract->user->u_name}}</td>
                                                                    <td>{{date('d-m-Y',strtotime($contract->start_date))}}</td>
                                                                    <td>{{number_format($contract->user->position->basic_salary)}} đ/tháng</td>
                                                                    <td>{{number_format($contract->allowance->total)}} đ/tháng</td>
                                                                    @if(isset($contract->end_date))
                                                                        <td>{{date('d-m-Y',strtotime($contract->end_date))}}</td>
                                                                    @else 
                                                                        <td>Vô hạn</td>
                                                                    @endif
                                                                    @if ($contract->end_date == null)
                                                                    {
                                                                        <td class="badge bg-success">Còn hạn</td>
                                                                    }
                                                                    @else
                                                                    {
                                                                        @php
                                                                            $time=(strtotime($contract->end_date) - strtotime(date('Y-m-d')))/(60*60*24*30);
                                                                        @endphp
                                                                        @if ($time < 0)
                                                                            <td class="badge bg-danger">Hết hạn</td>
                                                                        @elseif ($time > 0 && $time < 2)
                                                                            <td class="badge bg-warning">Sắp hết hạn</td>
                                                                        @else
                                                                            <td class="badge bg-success">Còn hạn</td>
                                                                        @endif
                                                                    }                      
                                                                    @endif                                
                                                                </tr> 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
    
    
</div>
@endsection 
