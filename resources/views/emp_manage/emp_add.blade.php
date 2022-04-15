@extends('layout.index')
@section('content')
<div class="container">
  <h4 class="border-start border-danger" style="text-align:center;background: #ebf5fb; padding-top: 28px">Thêm nhân viên</h4>
  <form class="row g-3" style="border-radius: 25px" action="{{route('Emp_Store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3 border-end border-info col-lg-8">
      <h5 style="text-align: center">Thông tin cá nhân</h5>
      <div class="col-md-2">
        <label for="u_id" class="form-label">ID</label>
        <input type="text" class="form-control" name="u_id" disabled>
      </div>
      <div class="col-md-5">
        <label for="u_name" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" name="u_name">
      </div>
      <div class="col-md-5">
        <label for="u_gender" class="form-label">Giới tính</label>
        <select name="u_gender" class="form-select" id="genderSelection">
          <option selected disabled>---> Chọn giới tính <---< /option>
          <option value="0">Nam</option>
          <option value="1">Nữ</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="u_dob" class="form-label">Ngày sinh</label>
        <input type="date" class="form-control" name="u_dob">
      </div>
      <div class="col-md-8">
        <label for="u_pob" class="form-label">Nơi sinh</label>
        <input type="text" class="form-control" name="u_pob" placeholder="thành phố Cần Thơ...">
      </div>
      <div class="col-md-4">
        <label for="u_IDcode" class="form-label">Số CCCD/CMND</label>
        <input type="text" class="form-control" name="u_IDcode">
      </div>
      <div class="col-md-4">
        <label for="u_IDcodedate" class="form-label">Ngày cấp</label>
        <input type="date" class="form-control" name="u_IDcodedate">
      </div>
      <div class="col-md-4">
        <label for="u_IDcodeplace" class="form-label">Nơi cấp</label>
        <input type="text" class="form-control" name="u_IDcodeplace" placeholder="Công an thành phố Cần Thơ...">
      </div>
      <div class="col-12">
        <label for="u_household" class="form-label">Hộ khẩu thường trú</label>
        <input type="text" class="form-control" name="u_household" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
      </div>
      <div class="col-12">
        <label for="u_address" class="form-label">Địa chỉ thường trú</label>
        <input type="text" class="form-control" name="u_address" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
      </div>
      <div class="col-md-6">
        <label for="u_phone" class="form-label">Số điện thoại</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">+84</div>
          </div>
          <input type="text" class="form-control" name="u_phone">
        </div>
      </div>
      <div class="col-md-6">
        <label for="u_email" class="form-label">Email</label>
        <input type="email" class="form-control" name="u_email" placeholder="vd: abc@gmail.com">
      </div>
      <div class="col-md-4">
        <label for="u_nationality" class="form-label">Quốc tịch</label>
        <input type="text" class="form-control" name="u_nationality">
      </div>
      <div class="col-md-4">
        <label for="u_ethnic" class="form-label">Dân tộc</label>
        <input type="text" class="form-control" name="u_ethnic">
      </div>
      <div class="col-md-4">
        <label for="u_religion" class="form-label">Tôn giáo</label>
        <input type="text" class="form-control" name="u_religion">
      </div>
    </div>
    {{------}}
    <div class="row g-3 col-lg-4" style="margin-left: 0.625%">
      <h5 style="text-align: center">Thông tin công tác</h5>

      <div class="col-md-12">
        <label for="e_name" class="form-label">Đơn vị</label>
        <select class="form-select" name="e_name" id="add-ent">
          <option selected disabled>---> Chọn đơn vị <---< /option>
              @foreach ($enterprises as $ent)
          <option value="{{$ent->id}}">{{ $ent->e_name }}</option>
          @endforeach
        </select>
        <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
      </div>

      <div class="col-md-12">
        <label for="d_name" class="form-label">Phòng ban</label>
        <select class="form-select" name="d_name" id="add-dep">
          <option disabled selected hidden>---> Chọn phòng ban <--- </option>
        </select>
        <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
      </div>

      <div class="col-md-12">
        <label for="p_name" class="form-label">Chức vụ</label>
        <select class="form-select" name="p_name">
          <option selected disabled>---> Chọn chức vụ <---< /option>
              @foreach ($positions as $pos)
          <option value="{{$pos->id}}">{{ $pos->p_name }}</option>
          @endforeach
        </select>
        <span class="text-danger">@error('p_name'){{$message}}@enderror</span>
      </div>

      <div class="col-md-6">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">@</div>
          </div>
          <input type="text" class="form-control" name="username">
        </div>
      </div>
      <div class="col-md-6">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password">
      </div>
      <div class="col-md-12">
        <label for="u_checkindate" class="form-label">Ngày vào làm</label>
        <input type="date" class="form-control" name="u_checkindate">
      </div>
      <div class="col-md-12">
        <label for="u_status" class="form-label">Trạng thái</label>
        <select name="u_status" class="form-select" id="myStatusSelected">
          <option selected disabled>---> Chọn trạng thái <---< /option>
          <option value="0">Hoạt động</option>
          <option value="1">Ngưng hoạt động</option>
        </select>
      </div>
      <div class="col-md-12">
        <label for="u_avatar" class="form-label">Ảnh hồ sơ</label>
        <input type="file" accept="image/*" class="form-control" name="u_avatar" id="u_avatar">
        <div id="imagePreview"></div>

      </div>
    </div>
    <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block">
      <a href="{{route('employee')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
      <button type="reset" class="btn btn-secondary">Làm trống</button>
      <button type="submit" class="btn btn-primary">Thêm <i class="fa fa-arrow-right"></i></button>
    </div>


  </form>

</div>

@endsection