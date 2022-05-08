@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Thêm phòng ban</h1>
    </div>
    <br> 
    <form action="{{ route('position.store')}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
        @csrf
        <div class="row mt-5">
            {{-- <div class="col-12 col-sm-6"> --}}
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
                <div class="form-group">
                    <div class="controls">
                        <label>Tên chức vụ</label>
                        <input type="text" class="form-control" placeholder="Nhập tên chức vụ mới..." name="p_name" required autocomplete="off">
                        <span class="text-danger">@error('p_name'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Lương cơ bản</label>
                        <input type="number" class="form-control" name="basic_salary" autocomplete="off" min="5000000" step="50000" value="10000000">
                        <span class="text-danger">@error('d_phone'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="controls">
                    <label>Chọn hệ số lương</label>
                    <select class="form-select" name="s_id">
                        <option disabled selected>--- Chọn HSL ---</option>
                        @foreach ($salaries as $salary)
                        <option value="{{$salary->id}}">{{ $salary->coefficient_salary }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('s_id'){{$message}}@enderror</span>
                </div>
            {{-- </div> --}}
            {{-- <div class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                <input type="submit" value="Save" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                <a type="submit" value="Save" class="btn btn-primary text-white glow mb-1 mb-sm-0 mr-0 mr-sm-1" href="{{ route('enterprise.index')}}">Back to list<a>
            </div> --}}
        </div>
        <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
            <a href="{{route('department.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
            <button type="reset" class="btn btn-secondary">Làm trống</button>
            <button type="submit" class="btn btn-primary">Thêm <i class="fa fa-arrow-right"></i></button>
        </div>
    </form>
</div>
@endsection