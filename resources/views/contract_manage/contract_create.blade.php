@extends('layout.index')
@section('content')

<div class="container">
  <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Lập hợp đồng</h3>
    <div class="container bg-light" style="width: 100%" id="align-table">
        
            <div class="card">
                <div class="card-body">
                    {{-- <div class="row g-3"> --}}
                    <form action="{{ url('store-contract/'.$user->id)}}" class="row g-3"  method="post">
                        @csrf
                        <div class="row mt-5">
                            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> --}}
                            
                                <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="controls"> --}}
                                        <label>Loại hợp đồng</label>
                                        <select class="form-select" name="w_type" id="w_type">
                                            <option value="1" selected>--- Chọn loại hợp đồng ---</option>
                                            <option value="0">Hợp đồng lao động thử việc</option>
                                            <option value="2">Hợp đồng lao động có thời hạn xác định</option>
                                            <option value="3">Hợp đồng lao động không có thời hạn xác định</option>
                                        </select>
                                        <span class="text-danger">@error('w_type'){{$message}}@enderror</span>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-md-3" id="start_date">
                                    
                                        <label>Ngày bắt đầu hợp đồng</label>
                                        <input type="date" class="form-control" name="start_date" required>
                                        <span class="text-danger">@error('start_date'){{$message}}@enderror</span>
                                    
                                </div>

                                <div class="col-md-3" id="end_date">
                                    
                                        <label>Ngày kết thúc hợp đồng</label>
                                        <input type="date" class="form-control" name="end_date">
                                        <span class="text-danger">@error('end_date'){{$message}}@enderror</span>
                                    
                                </div>
                                </div>

                                <div id="luong">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <label >Mức lương chính</label>
                                        <input type="text" class="form-control" name="basic_salary" value="{{$user->position->basic_salary}}" disabled>
                                    </div>
                                    <div class="col-lg-6">
                                        <label >Phụ cấp với chức vụ: <strong>{{$user->position->p_name}}</strong></label>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <p class=" ml-4 mb-4">Ăn trưa</p>
                                                <p class="ml-4 mb-4">Xăng xe</p>
                                                <p class="ml-4 mb-4">Khác</p>
                                                <div class="gach" style="background-color: red;
                                                width: 300px;
                                                height: 2px;"></div>
                                                <p class="ml-4 mt-4">Tổng tiền</p>
                                            
                                            </div>
                                            <div class="col-lg-4">
                                                <label type="text" class="form-control text-center" name="basic_salary">{{$allowance->lunch_fee}}đ/tháng</label>
                                                <label type="text" class="form-control text-center" name="basic_salary">{{($allowance->gas_fee)}}đ/tháng</label>
                                                <label type="text" class="form-control text-center" name="basic_salary">{{($allowance->others)}}đ/tháng</label>
                                                <label type="text" class="form-control text-center mt-5" name="basic_salary">{{($allowance->total)}}đ/tháng</label>
                                            </div>
                                        </div>
                                    </div>
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
                {{-- </div> --}}
            </div>
        </div>
    </div>
  
    
    
</div>
@endsection 
