@extends('layout.index')
@section('content')
@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif


<div class="container">

  <form class="row g-3" action="{{ route('employee')}}" method="get" enctype="multipart/form-data">
    @csrf
    <div class=" bg-light row g-3 col-lg-12" id="align-table" style="padding-top: 10px">
      <div class="container">
        
            <div style="display: flex; align-item:center">
            <div class="col-auto">
              <input type="text" class="form-control" name="search" id="search" placeholder="Tìm kiếm" autocomplete="off">
            </div>
        </div>
            
            {{-- <a href="{{route('Emp_Create')}}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br> --}}
        <br>
            
        <div class="table-responsive-sm float-left">
          @if (Session::has('success'))
          <div class="alert alert-success">
            <strong>{{Session::get('success')}}</strong>
          </div>
          @endif
          @if (Session::has('del-success'))
          <div class="alert alert-success">
            <strong>{{Session::get('del-success')}}</strong>
          </div>
          @endif
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-hover" id="empTable">
                <thead class="table-primary">
                  <tr>
                    <th width="8%">Avatar</th>
                    
                    <th>Họ và tên</th>
                    <th>Chức vụ</th>
                    <th>Phòng ban</th>
                    <th>Đơn vị</th>
                    {{-- <th>Số điện thoại</th> --}}
                    <th>Trạng thái</th>
                    <th class="text-right">Hành động</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead>

                <tbody id="listEmp">
                  @foreach ($users as $user )
                  <tr>
                    <td>
                      {{-- @if ($user->u_avatar != '') --}}
                        <img src="/uploads/{{$user->u_avatar}}" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" />
                      {{-- @else
                        @if ($user->u_gender==0)
                          <img src="/uploads/male-account-icon.png" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" />
                        @else
                          <img src="/uploads/female-account-icon.png" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" />
                        @endif

                      @endif --}}
                    </td>
                    
                    <td>{{ $user->u_name }}</td>
                    <td>{{$user->position->p_name}}</td>
                    <td>{{$user->position->dep_pos->d_name}}</td>
                    <td>{{$user->position->dep_pos->enterprise->e_name}}</td>
                    {{-- <td>{{$user->department->enterprise->e_name}}</td> --}}
                    {{-- <td>{{ $user->u_phone }}</td> --}}
                    <td>
                      @if ($user->u_status==0)
                      <span class="badge bg-success">Hoạt động</span>
                      @else
                      <span class="badge bg-danger">Ngưng hoạt động</span>
                      @endif
                    </td>
                    <td class="text-right">
                      {{-- Nút xem --}}
                      <a href="{{ route('Emp_Info',$user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                      {{-- Nút sửa --}}
                      <a href="{{ route('Emp_Edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      {{-- Nút xoá --}}
                      <a href="{{ route('Emp_Delete',$user->id) }}" class="btn btn-danger btn-delete btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng {{$user->u_name}} không?')"><i class="fa fa-trash"></i></a>
                    </td>
                    <td><a href="{{ route('contractUser_info',$user->id) }}" class="btn btn-primary btn-sm">Xem hợp đồng</td>

                  </tr>
                  @endforeach
                  

                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div style="float: right">
            {{ $users->links() }}
          </div>
        </div>
          
      </div>

    </div>

  </form>


</div>
@endsection