@extends('layout.index')
@section('content')

@if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<form enctype="multipart/form-data">

  {{-- Tìm kiếm --}}
  <div class="form-group col-lg-3" id="align-form">
    <h3 style="text-align: center">Nhân viên</h3>
    <label for="username">Tên đăng nhập</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">@</div>
      </div>
      <input type="text" class="form-control" id="username" placeholder="Username">
    </div>

    <label for="u_name">Tên người dùng</label>
    <input type="text" id="u_name" class="form-control" placeholder="Tên người dùng">

    <label for="u_gender" class="form-label">Giới tính</label>
    <select id="u_gender" class="form-select">
      <option selected disabled>Chọn...</option>
        <option>Nam</option>
        <option>Nữ</option>
    </select>

    <label for="u_phone">Số điện thoại</label>
    <input type="tel" id="u_phone" class="form-control" placeholder="Số điện thoại">

    <label for="e_name" class="form-label">Đơn vị</label>
    <select id="e_name" class="form-select">
      <option selected disabled>Chọn...</option>
      @foreach ($enterprises as $ent)
        <option value="{{ $ent->id }}"> {{ $ent->e_name }} </option>
      @endforeach
    </select>

    <label for="p_name" class="form-label">Phòng ban</label>
    <select id="p_name" class="form-select">
      <option selected disabled>Chọn...</option>
      @foreach ($deps as $dep)
        <option value="{{ $dep->id }}"> {{ $dep->d_name }} </option>
      @endforeach
    </select>

    <label for="u_status" class="form-label">Trạng thái</label>
    <select id="u_status" class="form-select">
      <option selected disabled>Chọn...</option>
        <option>Hoạt động</option>
        <option>Nghỉ việc</option>
    </select>

    <label for="u_checkindate">Ngày bắt đầu làm việc</label>
    <input type="date" id="u_checkindate" class="form-control" placeholder="">
    <hr>

    <button type="reset" class="btn btn-sm btn-info">Làm trống</button>
    <button type="submit" class="btn btn-sm btn-primary">Tìm kiếm</button>
    
  </div>


<div class="height-100 bg-light col-lg-9" id="align-table">
    <div class="container">
      <a href="{{route('Emp_Create')}}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br>
        <br>

        <div class="table-responsive-sm float-left">
          @if (Session::has('success'))
            <div class="alert alert-success">
              {{Session::get('success')}}
            </div>  
          @endif

          <table class="table table-bordered">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Ảnh đại diện</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày bắt đầu làm việc</th>               
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            
            <tbody>
              
              @foreach ($users as $user )  
              
                <tr>
                  <td>{{ $user->u_name }}</td>
                  <td>
                    @if ($user->u_avatar != '')                        
                      <img src="/uploads/{{$user->u_avatar}}" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60"/>
                    @else
                      <img src="/uploads/account-icon.png" alt="{{$user->u_name}}" class="card-img-top"  style="cursor: zoom-in;" width="60"/>
                    @endif
                  </td>
                  <td>{{ $user->u_name }}</td>
                  <td>{{ $user->u_phone }}</td>
                  <td>{{ $user->u_email }}</td>
                  <td>{{ $user->u_checkindate }}</td>
                  <td>
                    @if ($user->u_status==0)
                      Hoạt động                      
                    @else 
                      Nghỉ việc    
                    @endif</td>
                  <td>
                    <div>
                      <a href="{{ route('Emp_Edit',$user->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                      {{-- <button type="button" class="btn btn-primary btn-sm" data-url="{{ route('user.update',$user->id) }}">Sửa</button> --}}
                      {{-- <button type="button" class="btn btn-danger btn-delete btn-sm" data-url="{{ route('user.destroy',$user->id) }}">
                        Xoá
                      </button> --}}
                      <a class="btn btn-danger btn-delete btn-sm" href="{{ route('Emp_Delete',$user->id) }}">Xóa</a>
                    </div>                         
                  </td>
                  
                    
                  </tr>
                  
              @endforeach 
              

            </tbody>  
          </table>
        </div>
        
        
    </div>
    
</div>
</form>
{{-- @include('emp_manage.emp_add')
@include('emp_manage.emp_update') --}}

{{-- <script type="text/javascript" charset="utf-8">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<script type="text/Javascript" charset="utf-8">
    $(document).ready(function(){
 
    // Khi người dùng click Đăng ký
    $('#form-add').click(function(){
      e.prevenDefault();
      var url = $(this).attr('data-url');
      $('.btn-delete').click(function(){
					var url = $(this).attr('data-url');
					var _this = $(this);
					if (confirm('May co chac muon xoa khong?')) {
						$.ajax({
							type: 'delete',
							url: url,
							success: function(response) {
								toastr.success('Delete student success!')
								_this.parent().parent().remove();
							},
							error: function (jqXHR, textStatus, errorThrown) {
								//xử lý lỗi tại đây
							}
						})
					}
				})

     // Lấy dữ liệu
     var data = {
      fullname      : $('#fullname').val(),
      dob           : $('#date_of_birth').val(),
      gender        : $('#gender').val(),
      phone_no      : $('#phone_no').val(),
      emai          : $('#email').val(),
      username      : $('#username').val(),
      ID_card_code  : $('ID_card_code').val(),
      create_date   :$('create_date').val(),
      create_place  :$('#create_place').val()
         
     };

     // Gửi ajax
     $.ajax({
         type : "post",
         dataType : "JSON",
         url : url,
         data : data,
         success : function(result)
         {
            toastr.success(result.message)
            $('#AddModal').modal('hide');
            console.log(result.data)
            setTimeout(function(){
              window.location.href="{{route('user.index')}}";
            }, 500);
          },
          error:function(jqXHR, textStatus, errorThrown){
            //xử lý lỗi
          }
      });
    });
</script> --}}
@endsection