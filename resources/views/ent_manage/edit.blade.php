@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Cập nhật đơn vị</h1>
    </div>
    <br> 
    <form action="{{ route('enterprise.update', $enterprise->id)}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$enterprise->id}}">
        <div class="row mt-5">
            {{-- <div class="col-12 col-sm-6"> --}}
                <div class="form-group">
                    <div class="controls">
                        <label>Tên đơn vị</label>
                        <input type="text" class="form-control" placeholder="Nhập tên đơn vị..." name="e_name" value="{{$enterprise->e_name}}" required autocomplete="off">
                        <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" placeholder="Nhập địa chỉ đơn vị" name="e_address" value="{{ $enterprise->e_address }}" required autocomplete="off">
                        <span class="text-danger">@error('e_address'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="Nhập SĐT..." name="e_phone" value="{{ $enterprise->e_phone }}">
                        <span class="text-danger">@error('e_phone'){{$message}}@enderror</span>
                    </div>
                </div>
            {{-- </div> --}}
            <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
                <a href="{{ route('enterprise.index') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
                <button type="submit" class="btn btn-primary">Cập nhật <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection