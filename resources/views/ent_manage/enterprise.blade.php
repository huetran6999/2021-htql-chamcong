@extends('layout.index')
@section('content')
<form>
  
    <div class="height-100 bg-light col-lg-9" id="align-table">
        <div class="container">
          <a href="#" class="btn btn-success btn-add"><i class="fa fa-plus"></i> Thêm mới</a> <br>
            <br>
            <div class="table-responsive-sm">
              @if (Session::has('success'))
                <div class="alert alert-success">
                  {{Session::get('success')}}
                </div>  
              @endif
            <table class="table table-bordered">
                <thead class="table-primary">
                  <tr>
                    <th>ID</th>
                    <th>Tên đơn vị</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($enterprises as $ent )  
                      <tr>
                        <td>{{ $ent->id }}</td>
                        <td>{{ $ent->e_name }}</td>
                        <td>{{ $ent->e_address }}</td>
                        <td>{{ $ent->e_phone }}</td>
                        <td>
                          <div>
                            <a href="#" class="btn btn-primary btn-sm">Sửa</a>
                            <a class="btn btn-danger btn-delete btn-sm" href="#">Xóa</a>
                          </div>                         
                        </td>
                        
                      </tr>
                  @endforeach    
                </tbody>  
            </table>
            </div>
            
            
        </div>
        
    </div>
    </form>
</form> 
@endsection