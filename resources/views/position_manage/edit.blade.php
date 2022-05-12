@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Cập nhật chức vụ</h1>
    </div>
    <br> 
    <form action="{{ route('position.update', $position->id)}}" class="row g-3"  method="post">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{$position->id}}">
        <div class="card mb-5" style="box-shadow: 0 0 50px #ccc">
            <ul class="nav nav-tabs" role="tablist" style="padding-top: 10px;">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#home" id="home-tab" aria-controls="home" aria-selected="true" role="tab">Thông Tin Chính</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#menu1" id="menu1-tab" aria-controls="menu1"  role="tab">Phân quyền</a></li>
                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu5" >Sửa Đổi Thông Tin Tài Khoản Tại Công Ty</a></li> --}}
            </ul>

            <div class=" tab-content">
                <div id="home" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="e_name" class="form-label">Đơn vị</label>
                            <select class="form-select" name="e_name" id="add-ent">
                            @foreach ($enterprises as $ent)
                                <option value="{{$ent->id}}" @if ($position->dep_pos->e_id == $ent->id) {{"selected"}} @endif>{{ $ent->e_name }}</option>
                            @endforeach
                            </select>
                            <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
                        </div>
                    
                        <div class="col-md-12">
                            <label for="d_name" class="form-label">Phòng ban</label>
                            <select class="form-select" name="d_name" id="add-dep">
                                @foreach ($deps as $dep)
                                    <option value="{{$dep->id}}" @if ($position->d_id == $dep->id) {{"selected"}} @endif>{{ $dep->d_name }}</option>
                                @endforeach  
                            </select>
                            <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Tên chức vụ</label>
                                <input type="text" class="form-control" name="p_name" value="{{ $position->p_name }}" required autocomplete="off">
                                <span class="text-danger">@error('p_name'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Lương cơ bản</label>
                                <input type="number" class="form-control" name="basic_salary" autocomplete="off" min="5000000" step="50000"  value="{{ $position->basic_salary }}">
                                <span class="text-danger">@error('d_phone'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="controls">
                            <label>Chọn hệ số lương</label>
                            <select class="form-select" name="s_id">
                                <option disabled selected>--- Chọn HSL ---</option>
                                @foreach ($salaries as $salary)
                                <option value="{{$salary->id}}" @if ($position->s_id == $salary->id) {{"selected"}} @endif>{{ $salary->coefficient_salary }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('s_id'){{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane" role="tabpanel" aria-labelledby="menu1-tab">

                    <div class=" form-group col-md-12">
                        <label><strong>Chọn các quyền cho chức vụ</strong></label>
                        <div class="wrap" style="display:flex">
                            <div class="form-check" id="grid-checkbox">
                                @foreach($roles as $role)
                                
                                    <div class="mt-3 col-md-4" style="width: 100%">
                                    <input {{$pos_role->contains($role->id)?'checked':''}} type="checkbox" class="form-check-input" name="role[]" value="{{$role->id}}">
                                    <label class="form-check-label" style="width:100%;">{{$role->r_show}}</label>
                                    </div>
                                    
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
                    <a href="{{route('position.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
                    <button type="submit" class="btn btn-primary">Cập nhật <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </div>    
    </form>
</div>
@endsection