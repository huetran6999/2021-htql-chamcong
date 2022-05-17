@extends('layout.index')
@section('content')
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-align:center; padding-top: 28px">Thêm chức vụ</h1>
    </div>
    <br> 
        @csrf
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Tên chức vụ</label>
                        <input type="text" class="form-control" placeholder="Nhập tên chức vụ mới..." value="{{ $working_hour_log->user_log->u_name }}" readonly="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="controls">
                        <label>Checkin sáng</label>
                        <input type="text" class="form-control" placeholder="Chưa có" value="{{ $working_hour_log->am_in }}" readonly="">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="controls">
                        <label>Checkout sáng</label>
                        <input type="text" class="form-control" placeholder="Chưa có" value="{{ $working_hour_log->am_out }}" readonly="">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="controls">
                        <label>Checkin chiều</label>
                        <input type="text" class="form-control" placeholder="Chưa có" value="{{ $working_hour_log->pm_in }}" readonly="">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="controls">
                        <label>Checkin chiều</label>
                        <input type="text" class="form-control" placeholder="Chưa có" required autocomplete="off" value="{{ $working_hour_log->pm_out }}" readonly="">
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-3">
                @if (empty($working_hour_log->am_in))
                <form action="{{ route('checkin-am', $working_hour_log->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkin sáng</button>
                </form>
                @endif

                @if (empty($working_hour_log->am_out))
                <form action="{{ route('checkout-am', $working_hour_log->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkout sáng</button>
                </form>
                @endif

                @if (empty($working_hour_log->pm_in))
                <form action="{{ route('checkin-pm', $working_hour_log->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkin chiều</button>
                </form>
                @endif

                @if (empty($working_hour_log->pm_out))
                <form action="{{ route('checkout-pm', $working_hour_log->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkout chiều</button>
                </form>
                @endif
            </div>

            <div class="btn-group" role="group" style="width: 25%; margin-top: 15px; margin-left:auto; margin-right:auto; display:block; padding-bottom: 10px">
                <a href="{{route('department.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở về</a>
                <button type="reset" class="btn btn-secondary">Làm trống</button>
            </div>
        </div>
</div>
@endsection