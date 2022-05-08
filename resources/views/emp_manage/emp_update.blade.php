@extends('layout.index')
@section('content')
<div class="container">
  <h4 class="border-start border-danger" style="text-align:center;background: #ebf5fb; padding-top: 56px">Cập nhật nhân viên</h4>

  <form class="row g-3" action="{{route('Emp_Update', $user->id)}}" method="POST" enctype="multipart/form-data">
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
              <input type="text" class="form-control" name="u_id" value="{{$user->id}}" disabled>
            </div>

            <div class="col-md-5">
              <label for="u_name" class="form-label">Họ và tên</label>
              <input type="text" class="form-control" name="u_name" value="{{$user->u_name}}">
            </div>

            <div class="col-md-5">
              <label for="u_gender" class="form-label">Giới tính</label>
              <select name="u_gender" class="form-select" id="genderselection" value="{{$user->u_gender}}">
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
              <input type="text" class="form-control" name="u_pob" value="{{$user->u_pob}}">
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
              <input type="text" class="form-control" name="u_IDcodeplace" value="{{$user->u_IDcodeplace}}">
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
        </div>

        {{-- Thông tin liên hệ --}}
        <div id="menu1" class="tab-pane" role="tabpanel" aria-labelledby="menu1-tab">
          @foreach ($par as $p)
          <div class="row">
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
              <input type="email" class="form-control" name="u_email" value="{{$user->u_email}}" >
            </div>

            
 
              <div class="col-md-6">
                <label for="re_name" class="form-label">Họ tên người thân</label>
                <input type="text" class="form-control" name="re_name" value="{{$p->re_name}}">
              </div>

              <div class="col-md-6">
                <label for="re_gender" class="form-label">Giới tính</label>
                <select name="re_gender" class="form-select" id="regenderSelection" value="{{$p->re_gender}}">
                  <option selected disabled>--- Chọn giới tính ---</option>
                  <option value="0" @if($p->re_gender == '0') ? selected : null @endif>Nam</option>
                  <option value="1" @if($p->re_gender == '1') ? selected : null @endif>Nữ</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="re_ship" class="form-label">Quan hệ</label>
                <select name="re_ship" class="form-select" id="reshipSelection"value="{{$p->re_ship}}">
                  <option selected disabled>--- Chọn quan hệ ---</option>
                  <option value="0" @if ($p->re_ship == '0') ? selected : null @endif>Ông</option>
                  <option value="1" @if ($p->re_ship == '1') ? selected : null @endif>Bà</option>
                  <option value="2" @if ($p->re_ship == '2') ? selected : null @endif>Cha</option>
                  <option value="3" @if ($p->re_ship == '3') ? selected : null @endif>Mẹ</option>
                  <option value="4" @if ($p->re_ship == '4') ? selected : null @endif>Khác</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="re_phone" class="form-label">Số điện thoại liên hệ</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">+84</div>
                  </div>
                  <input type="text" class="form-control" name="re_phone" value="{{$p->re_phone}}">
                </div>
              </div>

              <div class="col-12">
                <label for="re_address" class="form-label">Địa chỉ liên hệ</label>
                <input type="text" class="form-control" name="re_address" value="{{$p->re_address}}" >
              </div>

            

            <div class="col-12">
              <label for="u_household" class="form-label">Hộ khẩu thường trú</label>
              <input type="text" class="form-control" name="u_household" value="{{$user->u_household}}">
            </div>

            <div class="col-12">
              <label for="u_address" class="form-label">Địa chỉ tạm trú</label>
              <input type="text" class="form-control" name="u_address" value="{{$user->u_address}}">
            </div>
          </div>
          @endforeach
        </div>

        {{-- Thông tin trình độ bằng cấp --}}
        <div id="menu2" class="tab-pane" role="tabpanel" aria-labelledby="menu2-tab">  
            <div class="row">
              @foreach ($lit as $l)
              <div class="col-12">
                <label for="l_name" class="form-label">Trình độ học vấn</label>
                <select name="l_name" class="form-select" id="lnameSelection">
                  <option selected disabled>--- Chọn trình độ ---</option>
                  <option value="0" @if ($l->l_name == '0') ? selected : null @endif>Trung học phổ thông</option>
                  <option value="1" @if ($l->l_name == '1') ? selected : null @endif>Trung cấp</option>
                  <option value="2" @if ($l->l_name == '2') ? selected : null @endif>Cao đẳng</option>
                  <option value="3" @if ($l->l_name == '3') ? selected : null @endif>Đại học</option>
                  <option value="4" @if ($l->l_name == '4') ? selected : null @endif>Thạc sĩ</option>
                  <option value="5" @if ($l->l_name == '5') ? selected : null @endif>Tiến sĩ</option>
                  <option value="6" @if ($l->l_name == '6') ? selected : null @endif>PGS.TS</option>
                  <option value="7" @if ($l->l_name == '7') ? selected : null @endif>Khác</option>
                </select>
              </div>

              <div class="col-12">
                <label for="l_major" class="form-label">Ngành học</label>
                <input type="text" class="form-control" name="l_major" value="{{$l->l_major}}">
              </div>

              <div class="col-12">
                <label for="l_grading" class="form-label">Xếp loại</label>
                <select name="l_grading" class="form-select" id="lnameSelection">
                  <option selected disabled>--- Chọn xếp loại ---</option>
                  <option value="0" @if ($l->l_grading == '0') ? selected : null @endif>Xuất sắc</option>
                  <option value="4" @if ($l->l_grading == '4') ? selected : null @endif>Giỏi</option>
                  <option value="1" @if ($l->l_grading == '1') ? selected : null @endif>Khá</option>
                  <option value="2" @if ($l->l_grading == '2') ? selected : null @endif>Trung bình</option>
                  <option value="3" @if ($l->l_grading == '3') ? selected : null @endif>Khác</option>
                </select>
              </div>

              <div class="col-12">
                <label for="l_graduation_school" class="form-label">Nơi đào tạo</label>
                <input type="text" class="form-control" name="l_graduation_school" value="{{$l->l_graduation_school}}">
              </div>

              <div class="col-12">
                <label for="l_graduation_year" class="form-label">Năm tốt nghiệp</label>
                <input type="number" class="form-control" name="l_graduation_year" min="1980" max="2022" step="1" value="{{$l->l_graduation_year}}">
              </div>

              <div class="col-md-12">
                <label for="f_id" class="form-label">Trình độ ngoại ngữ</label>
                <select name="f_name" id="fnameSelection" class="form-select">
                  <option selected disabled>--- Chọn trình độ ---</option>
                  @foreach ($lang as $la)
                    <option @if($user->foreign_language->id==$la->id) {{"selected"}} @endif value="{{$la->id}}">{{$la->f_name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12">
                <label for="l_other_major" class="form-label">Văn bằng khác (nếu có)</label>
                <input type="text" class="form-control" name="l_other_major" value="{{$l->l_ohter_major}}">
              </div>

              <div class="col-12">
                <label for="note" class="form-label">Ghi chú</label>
                <input type="text" class="form-control" name="note" value="{{$l->note}}">
              </div>

            
            @endforeach
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
                  <option @if($user->position->dep_pos->e_id==$ent->id) {{"selected"}} @endif value="{{$ent->id}}">{{$ent->e_name}}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
            </div>
      
            <div class="col-md-12">
              <label for="d_name" class="form-label">Phòng ban</label>
              <select class="form-select" name="d_name" id="add-dep">
                <option disabled selected hidden>--- Chọn phòng ban --- </option>
                @foreach ($deps as $dep)
                  <option @if($user->position->d_id == $dep->id) {{"selected"}} @endif value="{{$dep->id}}">{{$dep->d_name}}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
            </div>
      
            <div class="col-md-12">
              <label for="p_name" class="form-label">Chức vụ</label>
              <select class="form-select" name="p_name">
                <option selected disabled>--- Chọn chức vụ --- </option>
                @foreach ($positions as $pos)
                <option @if($user->p_id==$pos->id) {{"selected"}} @endif value="{{$pos->id}}">{{$pos->p_name}}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('p_name'){{$message}}@enderror</span>
            </div>

            <div class="col-md-12">
              <label for="coefficient_salary" class="form-label">Hệ số lương</label>
              <input type="text" class="form-control" name="coefficient_salary" value="{{$user->position->salary->coefficient_salary}}" readonly>               
            </div>

            <div class="col-md-6">
              <label for="username" class="form-label">Tên đăng nhập</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" name="username" value="{{$user->username}}">
              </div>
            </div>
            <div class="col-md-6">
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
                <option selected disabled>--- Chọn trạng thái ---</option>
                <option value="0" @if ($user->u_status == '0') ? selected : null @endif>Hoạt động</option>
                <option value="1" @if ($user->u_status == '1') ? selected : null @endif>Ngưng hoạt động</option>
              </select>
            </div>
            <div class="col-md-12">
              <label for="u_avatar" class="form-label">Ảnh hồ sơ</label>
              <input type="file" accept="image/*" class="form-control" name="u_avatar" id="u_avatar">
              <div><img src="/uploads/{{$user->u_avatar}}" alt="{{$user->u_name}}" class="card-img-top" style="cursor: zoom-in;" width="60" /></div>
      
            </div>
          </div>
        </div>

        <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
          <a href="{{route('employee')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
          {{-- <button type="reset" class="btn btn-secondary">Làm trống</button> --}}
          <button type="submit" class="btn btn-primary">Cập nhật <i class="fa fa-arrow-right"></i></button>
        </div>
      </div> 
    </div>
          
    </div>
  </form>
</div>

@endsection