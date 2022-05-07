@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Thêm phòng ban</h1>
    </div>
    <br> 
    <form action="{{ route('department.store')}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
        @csrf
        <div class="row mt-5">
            {{-- <div class="col-12 col-sm-6"> --}}
                <div class="col-md-12">
                    <div class="controls">
                        <label>Chọn đơn vị</label>
                        <select class="form-select" name="e_id">
                            <option disabled selected>--- Chọn đơn vị ---</option>
                            @foreach ($enterprises as $ent)
                            <option value="{{$ent->id}}">{{ $ent->e_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('e_id'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Tên phòng ban</label>
                        <input type="text" class="form-control" placeholder="Nhập tên phòng ban..." name="d_name" required autocomplete="off">
                        <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="vd: 3888..." name="d_phone" autocomplete="off">
                        <span class="text-danger">@error('d_phone'){{$message}}@enderror</span>
                    </div>
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