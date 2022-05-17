@extends('layout.index')
@section('content')

<div class="container">
  <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách hợp đồng</h3>
<div class="container bg-light" style="width: 100%" id="align-table">
  
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="data-tables">
                <thead>
                    <tr align="center">
                        <th>ID</th>                       
                        <th>Nhân viên</th>
                        <th>Ngày lập</th>                       
                        <th>Loại hợp đồng</th>
                        <th>Người lập</th>
                        <th>Trạng thái</th>
                         
                        <th style="width:220px">Hành động</th> 
                        <th>Tác vụ</th>                                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                    <tr class="even gradeC" align="center">
                        <td>{{$contract->id}}</td>
                        
                        <td>{{$contract->user->u_name}}</td>
                        <td>{{date('d-m-Y',strtotime($contract->created_at))}}</td>
                        @if($contract->w_type == '0')
                            <td>Thử việc</td>
                        @elseif($contract->w_type == '2') 
                            <td>Có thời hạn</td>
                        @elseif($contract->w_type == '3')
                            <td>Vô hạn</td>
                        @endif                        
                        {{-- <td>{{$contract->w_type}}</td> --}}
                        <td>{{$contract->creator}}</td>
                        @if((date('m',strtotime($contract->start_date))-(date('m',strtotime($contract->end_date))))<=2)
                        <td class="badge bg-warning">Sắp hết hạn </td>
                        @else
                        <td class=" badge bg-success">Còn hạn</td>
                        @endif
                        <td>
                            
                            <a class="btn btn-sm btn-primary" href="#" title="Xem hợp đồng"> <i class="fa fa-eye"></i> </a>
                            <a class="btn btn-sm btn-warning" href="" title="Sửa"> <i class="fa fa-edit"></i></a>
                        
                            
                            <a class="btn btn-sm btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i></a>
                        </td>

                        <td>

                            <a class="btn btn-info mb-2" href="#" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý phụ lục</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection