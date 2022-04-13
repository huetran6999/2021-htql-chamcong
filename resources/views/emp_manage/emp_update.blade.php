@extends('layout.index')
@section('content')
<div class="container">
  <h4 class="border-start border-danger" style="text-align:center;background: #ebf5fb; padding-top: 56px">Cập nhật nhân viên</h4>
  <form method="POST"  class="row g-3" action="{{ route('Emp_Update',$user->id) }}" enctype="multipart/form-data">
   @csrf
    <div class="row g-3 border-end border-info col-lg-8">
    <h5 style="text-align: center">Thông tin cá nhân</h5>
    <div class="col-md-2">
      <label for="u_id" class="form-label">ID</label>
      <input type="text" class="form-control" id="u_id" value="{{$user->id}}" disabled>
    </div>
    <div class="col-md-5">
      <label for="u_name" class="form-label">Họ và tên</label>
      <input type="text" class="form-control" name="u_name" value="{{$user->u_name}}">
    </div>
    <div class="col-md-5">
      <label for="u_gender" class="form-label">Giới tính</label>
      <select name="u_gender" class="form-select" id="genderselection" value="{{$user->u_gender}}">
        {{-- <option value="0"@if($user->u_gender=='Nam') selected='selected' @endif >Nam</option>
        <option value="1"@if($user->u_gender=='Nữ') selected='selected' @endif >Nữ</option> --}}
        <option value="0" @if($user->u_gender == '0') ? selected : null @endif>Nam</option>
        <option value="1" @if($user->u_gender == '1') ? selected : null @endif>Nữ</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="u_dob" class="form-label">Ngày sinh</label>
      <input type="date" class="form-control" name="u_dob" value="{{$user->u_dob}}">
    </div>
    <div class="col-md-8">
      <label for="u_pob" class="form-label">Nơi sinh</label>
      <input type="text" class="form-control" name="u_pob" value="{{$user->u_pob}}" placeholder="thành phố Cần Thơ...">
    </div>
    <div class="col-md-4">
      <label for="u_IDcode" class="form-label">Số CCCD/CMND</label>
      <input type="text" class="form-control" name="u_IDcode" value="{{$user->u_IDcode}}">
    </div>
    <div class="col-md-4">
      <label for="u_IDcodedate" class="form-label">Ngày cấp</label>
      <input type="date" class="form-control" name="u_IDcodedate" value="{{$user->u_IDcodedate}}">
    </div>
    <div class="col-md-4">
      <label for="u_IDcodeplace" class="form-label">Nơi cấp</label>
      <input type="text" class="form-control" name="u_IDcodeplace" value="{{$user->u_IDcodeplace}}" placeholder="Công an thành phố Cần Thơ...">
    </div>

    <div class="col-12">
      <label for="u_household" class="form-label">Hộ khẩu thường trú</label>
      <input type="text" class="form-control" name="u_household" value="{{$user->u_household}}" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
    </div>
    <div class="col-12">
      <label for="u_address" class="form-label">Địa chỉ thường trú</label>
      <input type="text" class="form-control" name="u_address" value="{{$user->u_address}}" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
    </div>
    <div class="col-md-6">
      <label for="u_phone" class="form-label">Số điện thoại</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">+84</div>
        </div>
        <input type="text" class="form-control" name="u_phone" value="{{$user->u_phone}}">
      </div>
    </div>
    <div class="col-md-6">
      <label for="u_email" class="form-label">Email</label>
      <input type="email" class="form-control" name="u_email" value="{{$user->u_email}}" placeholder="vd: abc@gmail.com">
    </div>
    <div class="col-md-4">
      <label for="u_nationality" class="form-label">Quốc tịch</label>
      <input type="text" class="form-control" name="u_nationality" value="{{$user->u_nationality}}">
    </div>
    <div class="col-md-4">
      <label for="u_ethnic" class="form-label">Dân tộc</label>
      <input type="text" class="form-control" name="u_ethnic" value="{{$user->u_ethnic}}">
    </div>
    <div class="col-md-4">
      <label for="u_religion" class="form-label">Tôn giáo</label>
      <input type="text" class="form-control" name="u_religion" value="{{$user->u_religion}}">
    </div>
    </div>
    {{------}}
    <div class="row g-3 col-lg-4" style="margin-left: 0.625%" >
      <h5 style="text-align: center">Thông tin công tác</h5>
      <div class="col-md-12">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">@</div>
          </div>
          <input type="text" class="form-control" name="username" value="{{$user->username}}">
        </div>
      </div>
      <div class="col-md-12">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" value="{{$user->password}}">
      </div>
      <div class="col-md-12">
        <label for="u_checkindate" class="form-label">Ngày vào làm</label>
        <input type="date" class="form-control" name="u_checkindate" value="{{$user->u_checkindate}}">
      </div>
      <div class="col-md-12">
        <label for="u_status" class="form-label">Trạng thái</label>
        <select name="u_status" class="form-select" id="myStatusSelected">
          <option selected disabled>Chọn...</option>
          <option value="0" @if($user->u_status == '0') ? selected : null @endif>Hoạt động</option>
          <option value="1" @if($user->u_status == '1') ? selected : null @endif>Ngưng hoạt động</option>
        </select>
      </div>
      <div class="col-md-12">
        <label for="u_avatar" class="form-label">Ảnh hồ sơ</label>
        <input type="file" accept="image/*" class="form-control" name="u_avatar" id="u_avatar">
      </div> 
    </div>
    <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block">
      <a href="{{route('employee')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
      <button type="submit" class="btn btn-primary">Cập nhật<i class="fa fa-arrow-down"></i></button>
    </div>  
  </form>

</div>

@endsection