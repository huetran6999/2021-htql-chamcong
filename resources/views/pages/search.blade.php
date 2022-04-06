@extends('index')
@section('content')
<div class="height-100 bg-light">
    <div class="container-fluid">
        {{-- <button type="submit" class="btn btn-info">Thêm nhân viên</button> <br>
        <br> --}}
        <table class="table table-hover">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Tên đăng nhập</th>
                <th>Số CCCD</th>
                <th>Ngày cấp</th>
                <th>Nơi cấp</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user as $u )
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->fullname }}</td>
                    <td>{{ $u->date_of_birth }}</td>
                    <td>{{ $u->gender }}</td>
                    <td>{{ $u->phone_no }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->username }}</td>
                    {{-- <td>{{ $user->password }}</td> --}}
                    <td>{{ $u->ID_card_code }}</td>
                    <td>{{ $u->create_date }}</td>
                    <td>{{ $u->create_place }}</td>
                    <td>
                       
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal">
                            Sửa
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#UpdateModal">
                          Xoá
                        </button>
                                                        
                    <td>
                </tr>
                @endforeach
              
            </tbody>
            
            
        </table>
        
        
    </div>
    
</div>
<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true" style="width: 100%;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateModalLabel">Cập nhật nhân viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/update-account/{{ $u->id }}" method="POST">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Họ và tên</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fullname" value="{{ $u->fullname }}" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Ngày sinh</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="dob" value="{{ $u->date_of_birth }}" disabled>
              </div>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender"  >
                  <label class="form-check-label">
                    Nam
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender">
                  <label class="form-check-label">
                    Nữ
                  </label>
                </div>
            </fieldset>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Số điện thoại</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phone_no" value="{{ $u->phone_no }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="{{ $u->email }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username" value="{{ $u->username }}" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Số CCCD</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ID_card_code" value="{{ $u->ID_card_code }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Ngày cấp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="create_date" value="{{ $u->create_date }}">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nơi cấp</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="create_place" value="{{ $u->create_place }}">
              </div>
            </div>
            {{-- <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                  </label>
                </div>
              </div>
            </div> --}}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
</div>
@endsection