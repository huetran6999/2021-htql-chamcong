@extends('layout.index')
@section('content')

<div class="container">
  <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách phụ cấp theo chức vụ</h3>
    <div class="bg-light col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @if (Session::has('message'))
          <div class="alert alert-success">
            <strong>{{Session::get('message')}}</strong>
          </div>
        @endif
        <div class="card">
            <div class="card-header">
            <h3 >Phụ cấp</h3>
            {{-- <p>Vị trí: {{$allowance->position->p_name}} - {{$allowance->position->dep_pos->d_name}}</p> --}}
            </div>
            <div class="card-body">
                <form  method="POST" action="{{route('update_allowance', $allowance->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="p_name">Số tiền ăn trưa</label>
                                <input type="text" class="form-control" id="lunch_fee" name="lunch_fee" placeholder="Tiền ăn trưa" value="{{$allowance->lunch_fee}}" required>
                                <span id="tienantrua"></span>
                            </div> 
                                <div class="form-group col-md-4">
                                    <label for="ten_chuc_vu">Số tiền xăng xe</label>
                                <input type="text" class="form-control" id="gas_fee" name="gas_fee" placeholder="Tiền xăng" value="{{$allowance->gas_fee}}" required>
                                <span id="tienxang"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ten_chuc_vu">Số tiền khác(...)</label>
                                <input type="text" class="form-control" id="others" name="others" placeholder="Tiền khác(nếu có).." value="{{$allowance->others}}" required>
                                <span id="tienkhac"></span>
                            </div>
                            </div>
                        </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary" type="submit">Lưu</button>
                                <button class="btn btn-default" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>