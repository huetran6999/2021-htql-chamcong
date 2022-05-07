@extends('layout.index')
@section('content')
@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif


<div class="container bg-light" style="width: 100%">
  <form class="row g-3" action="{{ route('employee')}}" method="get" enctype="multipart/form-data">
    @csrf
    <!-- Vertical -->
    {{-- <div style="padding-top: 20px; width: 30%; margin-left:auto; margin-right:auto; font-size: 11" class="row g-3">  
      <div class="col-md-12">
        <label for="d_id" class="form-label">Phòng ban</label>
        <select name="d_id" id="d_id">
          <option selected disabled>Choose...</option>
          @foreach ($deps as $dep)
          <option value="{{ $dep->id }}">{{ $dep->d_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-12">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
      </div>
      <div class="col-md-12">
        <label for="u_name">Tên người dùng</label>
        <input type="text" name="u_name" id="u_name" placeholder="Tên người dùng">
      </div>
      <button type="submit" class="btn btn-sm btn-primary" style="width: 20%">Tìm kiếm</button>
    </div> --}}
    <div class=" bg-light row g-3 col-lg-12" id="align-table" style="padding-top: 10px">
      <div class="container">
        <div style="display: flex; align-item:center">
        <div class="col-auto">
          <input type="text" class="form-control" name="search" id="search" placeholder="Tìm kiếm">
        </div>
        </div>
        
        {{-- <a href="{{route('Emp_Create')}}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br> --}}
        <br>
        <div class="table-responsive-sm float-left">
          @if (Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
          @endif
          <table class="table table-bordered table-hover" id="empTable">
            <thead class="table-primary">
              <tr>
                <th width="8%">Avatar</th>
                <th>Username</th>
                <th>Họ và tên</th>
                <th>Chức vụ</th>
                <th>Phòng ban</th>
                <th>Đơn vị</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th class="text-right">Hành động</th>
              </tr>
            </thead>

            <tbody id="listEmp">

                  
              
              @foreach ($users as $user )
              <tr>
                <td>
                  @if ($user->u_avatar != '')
                  <img src="/uploads/{{$user->u_avatar}}" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" />
                  @else
                  @if ($user->u_gender==0)
                  <img src="/uploads/male-account-icon.png" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" />
                  @else
                  <img src="/uploads/female-account-icon.png" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" />
                  @endif

                  @endif
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->u_name }}</td>
                <td>{{$user->position->p_name}}</td>
                <td>{{$user->position->dep_pos->d_name}}</td>
                <td>{{$user->position->dep_pos->enterprise->e_name}}</td>
                {{-- <td>{{$user->department->enterprise->e_name}}</td> --}}
                <td>{{ $user->u_phone }}</td>
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
                  <a href="{{ route('Emp_Delete',$user->id) }}" class="btn btn-danger btn-delete btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn vị {{$user->u_name}}?')"><i class="fa fa-trash"></i></a>
                </td>

              </tr>
              @endforeach
              

            </tbody>
          </table>
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