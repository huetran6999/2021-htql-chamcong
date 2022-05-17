@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Thêm ngày nghỉ phép</h1>
    </div>
    @if (session('error'))
        <h6 class="alert alert-danger">{{ session('error') }}</h6>
    @endif
    <br> 
    <form action="{{ route('store-leave-absence')}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
        @csrf
        <div class="row mt-5">
                <div class="col-md-12">
                    <div class="controls">
                        <label>Ngày nghỉ phép</label>
                        <input type="date" class="form-control" placeholder="Chọn ngày" name="date" required autocomplete="off">
                        {{-- <span class="text-danger">@error('e_id'){{$message}}@enderror</span> --}}
                    </div>

                    <div class="controls mt-2">
                        <label>Chọn nhân viên</label>
                        <select class="form-select" name="u_id">
                            <option disabled selected>--- Chọn nhân viên ---</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{ $user->u_name }}</option>
                            @endforeach
                        </select>
                        {{-- <span class="text-danger">@error('e_id'){{$message}}@enderror</span> --}}
                    </div>

                    <div class="form-group mt-2">
                        <div class="controls">
                            <label>Ca nghỉ</label>
                            <select class="form-select" name="shift">
                                <option disabled selected>--- Chọn ca nghỉ ---</option>
                                <option value="0.5">Ca sáng</option>
                                <option value="0.5">Ca chiều</option>
                                <option value="1">Cả ngày</option>
                            </select>
                            {{-- <span class="text-danger">@error('d_name'){{$message}}@enderror</span> --}}
                        </div>
                    </div>
                </div>
        </div>
        <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
            <a href="{{route('workinglog_index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
            <button type="reset" class="btn btn-secondary">Làm trống</button>
            <button type="submit" class="btn btn-primary">Thêm <i class="fa fa-arrow-right"></i></button>
        </div>
    </form>
@endsection