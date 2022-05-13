@extends('layout.index')
@section('content')

<div class="container">
  <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Lập hợp đồng</h3>
    <div class="container bg-light" style="width: 100%" id="align-table">
        <form action="{{ url('contract-create'.$user->id)}}" class="row g-3" style="border-radius: 25px; box-shadow: 0 0 50px #ccc;" method="post">
            @csrf
            <div class="row mt-5">
                {{-- <div class="col-12 col-sm-6"> --}}
                    <div class="col-md-12">
                        {{-- <div class="controls"> --}}
                            <label>Loại hợp đồng</label>
                            <select class="form-select" name="w_type" id="w_type">
                                <option value="0" selected disabled>--- Chọn loại hợp đồng ---</option>
                                <option value="1">Hợp đồng lao động thử việc</option>
                                <option value="2">Hợp đồng lao động có thời hạn xác định</option>
                                <option value="3">Hợp đồng lao động không có thời hạn xác định</option>
                            </select>
                            <span class="text-danger">@error('w_type'){{$message}}@enderror</span>
                        {{-- </div> --}}
                    </div>
                    <div class="form-group" id="start_date">
                        <div class="controls">
                            <label>Ngày bắt đầu hợp đồng</label>
                            <input type="date" class="form-control" name="start_date" required>
                            <span class="text-danger">@error('start_date'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <div class="form-group" id="end_date">
                        <div class="controls">
                            <label>Ngày kết thúc hợp đồng</label>
                            <input type="date" class="form-control" name="end_date">
                            <span class="text-danger">@error('end_date'){{$message}}@enderror</span>
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
                <button type="reset" class="btn btn-secondary">Làm trống</button>
                <button type="submit" class="btn btn-primary">Thêm <i class="fa fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
  
    
    
</div>
@endsection 
