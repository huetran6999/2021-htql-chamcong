@extends('layout.index')
@section('content')
@if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif


<div class="container-fluid bg-light" style="width: 100%">
<form class="row g-3" enctype="multipart/form-data">
  <!-- Vertical -->
  
  <div class="row mb-3 bg-light border-end border-info col-lg-3" id="align-form" style="padding-top: 10px">
    <h3 style="text-align: center; padding-top: 28px">Nhân viên</h3>
    <label for="username">Tên đăng nhập</label>
    {{-- <input type="text" id = "username" class="form-control" placeholder="Tên đăng nhập"> --}}
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">@</div>
      </div>
      <input type="search" class="form-control" id="username" placeholder="Username">
    </div>
    <div>
      <label for="u_name">Tên người dùng</label>
      <input type="search" name="u_name" class="form-control search-input" placeholder="Tên người dùng">
    </div>
    <label for="u_gender">Giới tính</label>
    <div class="form-check">
      <input type="radio" id="u_gender_male" name="u_gender">
      <label class="form-check-label" for="u_gender_male">Nam</label>
      <input type="radio" id="u_gender_female" name="u_gender">
      <label class="form-check-label" for="u_gender_female">Nữ</label>
    </div>
    <label for="u_phone">Số điện thoại</label>
    <input type="tel" id="u_phone" class="form-control" placeholder="Số điện thoại">
    <label for="e_name" class="form-label">Đơn vị</label>
    <select id="e_name" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
    <label for="p_name" class="form-label">Phòng ban</label>
    <select id="p_name" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
    <label for="u_status" class="form-label">Trạng thái</label>
    <select id="u_status" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
    <label for="u_checkindate">Ngày bắt đầu làm việc</label>
    <input type="date" id="u_checkindate" class="form-control" placeholder="">
    <hr>
    <button type="reset" class="btn btn-sm btn-info">Làm trống</button>
    <button type="submit" class="btn btn-sm btn-primary">Tìm kiếm</button>
    
  </div>


<div class=" bg-light row g-3 col-lg-9" id="align-table"  style="padding-top: 10px; margin-left: 15px">
    <div class="container">
      <a href="{{route('Emp_Create')}}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br>
        <br>
        <div class="table-responsive-sm float-left">
          @if (Session::has('success'))
            <div class="alert alert-success">
              {{Session::get('success')}}
            </div>  
          @endif
          @if (session('fail'))
            <h6 class="alert alert-danger">{{ session('fail') }}</h6>
          @endif
          @if (session('del-success'))
            <h6 class="alert alert-success">{{ session('del-success') }}</h6>
          @endif
        <table class="table table-bordered">
            <thead class="table-primary">
              <tr>
                <th>STT</th>
                <th width="8%">Avatar</th>
                <th>Họ và tên</th>
                <th>Chức vụ</th>
                <th>Phòng ban</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th class="text-right">Hành động</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($users as $user )  
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                      @if ($user->u_avatar != '')                        
                        <img src="/uploads/{{$user->u_avatar}}" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60"/>
                      @else
                        <img src="/uploads/account-icon.png" alt="{{$user->u_name}}" class="card-img-top"  style="cursor: zoom-in;" width="60"/>
                      @endif
                    </td>
                    <td>{{ $user->u_name }}</td>
                    <td>{{$user->position->p_name}}</td>
                    <td>{{$user->department->d_name}}</td>
                    <td>{{ $user->u_phone }}</td>
                    <td>
                      @if ($user->u_status==0)
                        <span class="badge bg-success">Hoạt động</span>                     
                      @else 
                        <span class="badge bg-danger">Ngưng hoạt động</span>    
                      @endif
                    </td>
                    <td class="text-right">
                      <div>
                        <a href="{{ route('Emp_Edit',$user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger btn-delete btn-sm" href="{{ route('Emp_Delete',$user->id) }}"><i class="fa fa-trash"></i></a>
                      </div>                         
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

