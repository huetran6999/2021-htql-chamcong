@extends('layout.index')
@section('content')
<div class="height-100">
    <div class="container-fluid">
      <button type="button" class="btn btn-success" disabled>
        Thêm
      </button> <br>
      <br>
        <table class="table table-hover">
            <thead class="table-primary">
              <tr>
                
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdateModalLabel">Cập nhật tài khoản</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Hello, lại là Huệ Trân đây</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
</div>
@endsection