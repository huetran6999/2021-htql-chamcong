@extends('layout.index')
@section('content')
<form>
  <table class="table table-bordered">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Tên đơn vị</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Giám đốc đơn vị</th>
        <th>Hành động</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach ($deps as $dep )  
          <tr>
            <td>{{ $dep->id }}</td>
            <td>{{ $dep->d_name }}</td>
            <td>{{ $dep->d_address }}</td>
            <td>{{ $dep->d_phone }}</td>
            <td>{{ $dep->d_phone }}</td>
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
</form>
@endsection