@extends('layout.index')
@section('content')
<div class="container" style="width: 100%">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Thêm đơn vị</h1>
    </div>
    <br>  
    <form action="{{ route('enterprise.store')}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
        @csrf
        <div class="row mt-5">
            {{-- <div class="col-12 col-sm-6"> --}}
                <div class="col-md-12">
                    {{-- <div class="controls"> --}}
                        <label>Tên đơn vị</label>
                        <input type="text" class="form-control" placeholder="Nhập tên đơn vị..." name="e_name" required autocomplete="off">
                        <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
                    {{-- </div> --}}
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" placeholder="Nhập địa chỉ..." name="e_address" required autocomplete="off">
                        <span class="text-danger">@error('e_address'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="vd: 3888xxx" name="e_phone" autocomplete="off">
                        <span class="text-danger">@error('e_phone'){{$message}}@enderror</span>
                    </div>
                </div>
            {{-- </div> --}}
            {{-- <div class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                <input type="submit" value="Save" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                <a type="submit" value="Save" class="btn btn-primary text-white glow mb-1 mb-sm-0 mr-0 mr-sm-1" href="{{ route('enterprise.index')}}">Back to list<a>
            </div> --}}
            <br>
           
        </div>
        <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
            <a href="{{route('enterprise.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
            <button type="reset" class="btn btn-secondary">Làm trống</button>
            <button type="submit" class="btn btn-primary">Thêm <i class="fa fa-arrow-right"></i></button>
        </div>
    </form>
</div>
@endsection