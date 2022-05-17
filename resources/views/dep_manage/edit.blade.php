@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Cập nhật phòng ban</h1>
    </div>
    <br> 
    <form action="{{ route('department.update', $department->id)}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$department->id}}">
        <div class="row mt-5">
            {{-- <div class="col-12 col-sm-6"> --}}
                <div class="form-group">
                    <div class="controls">
                        <label>Tên đơn vị</label>
                        <select class="form-select" name="e_id">
                            @foreach ($enterprises as $ent)
                            <option value="{{$ent->id}}" {{ $department->e_id == $ent->id ? 'selected' : '' }}> {{ $ent->e_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('e_id'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Tên phòng ban</label>
                        <input type="text" class="form-control" placeholder="Nhập tên phòng ban..." name="d_name" value="{{ $department->d_name }}" required autocomplete="off">
                        <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="Nhập SĐT..." name="d_phone" value="{{ $department->d_phone }}" autocomplete="off">
                        <span class="text-danger">@error('d_phone'){{$message}}@enderror</span>
                    </div>
                </div>
            {{-- </div> --}}
            <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
                <a href="{{ route('department.index') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
                <button type="submit" class="btn btn-primary">Cập nhật <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection