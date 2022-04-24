{{-- @extends('layout.index')
@section('content') --}}
{{-- <div class="container">
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
          <option selected disabled>--- Chọn giới tính ---</option>
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

    <div class="row g-3 col-lg-4" style="margin-left: 0.625%">
      <h5 style="text-align: center">Thông tin công tác</h5>

      <div class="col-md-12">
        <label for="e_name" class="form-label">Đơn vị</label>
        <select class="form-select" name="e_name" id="add-ent">
          <option selected disabled>--- Chọn đơn vị --- </option>
              @foreach ($enterprises as $ent)
          <option value="{{$ent->id}}">{{ $ent->e_name }}</option>
          @endforeach
        </select>
        <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
      </div>

      <div class="col-md-12">
        <label for="d_name" class="form-label">Phòng ban</label>
        <select class="form-select" name="d_name" id="add-dep">
          <option disabled selected hidden>--- Chọn phòng ban --- </option>
        </select>
        <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
      </div>

      <div class="col-md-12">
        <label for="p_name" class="form-label">Chức vụ</label>
        <select class="form-select" name="p_name">
          <option selected disabled>--- Chọn chức vụ --- </option>
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
          <option selected disabled>--- Chọn trạng thái ---</option>
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

</div> --}}

@extends('layout.index')
@section('content')
<div class="container">
  <div class="col-lg-12">
    <h1 class="page-header" style="text-align:center; padding-top: 28px">Thông tin nhân viên</h1>
  </div>
    <br>
    
  <form class="row g-3" action="{{route('Emp_Store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card" style="box-shadow: 0 0 50px #ccc">
      <ul class="nav nav-tabs" role="tablist" style="padding-top: 10px;">
          <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#home" id="home-tab" aria-controls="home" aria-selected="true" role="tab">Thông Tin Chính</a></li>
          <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#menu1" id="menu1-tab" aria-controls="menu1"  role="tab">Thông Tin Liên Hệ</a></li>
          <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#menu2" id="menu2-tab" aria-controls="menu2"  role="tab">Thông Tin Trình Độ Bằng Cấp</a></li>
          <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#menu3" id="menu3-tab" aria-controls="menu3"  role="tab">Thông Tin Công Tác</a></li>
          {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu5" >Sửa Đổi Thông Tin Tài Khoản Tại Công Ty</a></li> --}}
      </ul>

      <div class=" tab-content">

          {{-- Thông tin chính --}}
        <div id="home" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-md-2" >
              <label for="u_id" class="form-label" >ID</label>
              <input type="text" class="form-control" name="u_id" disabled>
            </div>

            <div class="col-md-5">
              <label for="u_name" class="form-label">Họ và tên</label>
              <input type="text" class="form-control" name="u_name">
            </div>

            <div class="col-md-5">
              <label for="u_gender" class="form-label">Giới tính</label>
              <select name="u_gender" class="form-select" id="genderSelection">
                <option selected disabled>--- Chọn giới tính ---</option>
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
        </div>

        {{-- Thông tin liên hệ --}}
        <div id="menu1" class="tab-pane" role="tabpanel" aria-labelledby="menu1-tab">
          <div class="row">
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

            <div class="col-md-6">
              <label for="re_name" class="form-label">Họ tên người thân</label>
              <input type="text" class="form-control" name="re_name">
            </div>

            <div class="col-md-6">
              <label for="re_gender" class="form-label">Giới tính</label>
              <select name="re_gender" class="form-select" id="regenderSelection">
                <option selected disabled>--- Chọn giới tính ---</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="re_ship" class="form-label">Quan hệ</label>
              <select name="re_ship" class="form-select" id="reshipSelection">
                <option selected disabled>--- Chọn quan hệ ---</option>
                <option value="0">Ông</option>
                <option value="1">Bà</option>
                <option value="2">Cha</option>
                <option value="3">Mẹ</option>
                <option value="4">Khác</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="re_phone" class="form-label">Số điện thoại liên hệ</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">+84</div>
                </div>
                <input type="text" class="form-control" name="re_phone">
              </div>
            </div>

            <div class="col-12">
              <label for="u_household" class="form-label">Hộ khẩu thường trú</label>
              <input type="text" class="form-control" name="u_household" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
            </div>

            <div class="col-12">
              <label for="u_address" class="form-label">Địa chỉ tạm trú</label>
              <input type="text" class="form-control" name="u_address" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
            </div>

            <div class="col-12">
              <label for="re_address" class="form-label">Địa chỉ liên hệ</label>
              <input type="text" class="form-control" name="re_address" placeholder="số nhà, đường, phường/xã, quận/huyện, thành phố/tỉnh...">
            </div>
          </div>
        </div>

        {{-- Thông tin trình độ bằng cấp --}}
        <div id="menu2" class="tab-pane" role="tabpanel" aria-labelledby="menu2-tab">
          <div class="row">
            <div class="col-12">
              <label for="l_name" class="form-label">Trình độ học vấn</label>
              <select name="l_name" class="form-select" id="lnameSelection">
                <option selected disabled>--- Chọn trình độ ---</option>
                <option value="0">Trung học phổ thông</option>
                <option value="1">Trung cấp</option>
                <option value="2">Cao đẳng</option>
                <option value="3">Đại học</option>
                <option value="4">Thạc sĩ</option>
                <option value="5">Tiến sĩ</option>
                <option value="6">PGS.TS</option>
                <option value="7">Khác</option>
              </select>
            </div>

            <div class="col-12">
              <label for="l_major" class="form-label">Ngành học</label>
              <input type="text" class="form-control" name="l_major" placeholder="công nghệ thông tin...">
            </div>

            <div class="col-12">
              <label for="l_grading" class="form-label">Xếp loại</label>
              <select name="l_name" class="form-select" id="lnameSelection">
                <option selected disabled>--- Chọn xếp loại ---</option>
                <option value="0">Xuất sắc</option>
                <option value="4">Giỏi</option>
                <option value="1">Khá</option>
                <option value="2">Trung bình</option>
                <option value="3">Khác</option>
              </select>
            </div>

            <div class="col-12">
              <label for="l_graduation_school" class="form-label">Nơi đào tạo</label>
              <input type="text" class="form-control" name="l_graduation_school" placeholder="ĐHCT...">
            </div>

            <div class="col-12">
              <label for="l_graduation_year" class="form-label">Năm tốt nghiệp</label>
              <input type="number" class="form-control" name="l_graduation_year" min="1980" max="2022" step="1" value="2020">
            </div>

            <div class="col-12">
              <label for="l_other_major" class="form-label">Văn bằng khác (nếu có)</label>
              <input type="text" class="form-control" name="l_other_major" placeholder="">
            </div>

            <div class="col-md-12">
              <label for="f_id" class="form-label">Trình độ ngoại ngữ</label>
              <select name="f_id" id="f_id" class="form-select">
                <option selected disabled>--- Chọn trình độ ---</option>
                @foreach ($lang as $l)
                <option value="{{ $l->id }}">{{ $l->f_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12">
              <label for="note" class="form-label">Ghi chú</label>
              <input type="text" class="form-control" name="note" placeholder="">
            </div>
          </div>
        </div>
        
        {{-- Thông tin công tác --}}
        <div id="menu3" class="tab-pane" role="tabpanel" aria-labelledby="menu3-tab">
          <div class="row">
            <div class="col-md-6">
              <label for="e_name" class="form-label">Đơn vị</label>
              <select class="form-select" name="e_name" id="add-ent">
                <option selected disabled>--- Chọn đơn vị --- </option>
                    @foreach ($enterprises as $ent)
                <option value="{{$ent->id}}">{{ $ent->e_name }}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
            </div>
      
            <div class="col-md-12">
              <label for="d_name" class="form-label">Phòng ban</label>
              <select class="form-select" name="d_name" id="add-dep">
                <option disabled selected hidden>--- Chọn phòng ban --- </option>
              </select>
              <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
            </div>
      
            <div class="col-md-12">
              <label for="p_name" class="form-label">Chức vụ</label>
              <select class="form-select" name="p_name">
                <option selected disabled>--- Chọn chức vụ --- </option>
                @foreach ($positions as $pos)
                  <option value="{{$pos->id}}">{{ $pos->p_name }}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('p_name'){{$message}}@enderror</span>
            </div>

            {{-- <div class="col-md-12">
              <label for="coefficient_salary" class="form-label">Hệ số lương</label>
              <input type="text" class="form-control" name="coefficient_salary" value="" readonly>
            </div> --}}

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
                <option selected disabled>--- Chọn trạng thái ---</option>
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
        </div>

        <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
          <a href="{{route('employee')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
          <button type="reset" class="btn btn-secondary">Làm trống</button>
          <button type="submit" class="btn btn-primary">Thêm <i class="fa fa-arrow-right"></i></button>
        </div>
      </div> 
          
    </div>
  </form>
       

  
</div>

                    

@endsection

