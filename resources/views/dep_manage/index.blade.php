@extends('layout.index')
@section('content')
<h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách phòng ban</h3>
<div class="container">
<div class="container bg-light" style="width: 100%" id="align-table">
  
    <a href="{{ route('department.create') }}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br>
    <br>
    <div class="table-responsive-sm">
      @if (Session::has('message'))
      <div class="alert alert-success">
        {{Session::get('message')}}
      </div>
      @endif
      <table class="table table-bordered table-hover">
        <thead class="table-primary">
          <tr>
            <th>ID</th>
            <th>Tên đơn vị</th>
            <th>Tên phòng ban</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($departments as $dep )
          <tr>
            <td>{{ $dep->id }}</td>
            <td>{{ $dep->enterprise->e_name }}</td>
            <td>{{ $dep->d_name }}</td>
            <td>{{ $dep->d_phone }}</td>
            <td>
              <div>
                <a href="{{ route('department.edit', $dep->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                <form action="{{ route('department.destroy', $dep->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$dep->e_name}}?')">Xóa</button>
                </form>
              </div>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
      <hr>
          <div style="float: right">
            {{ $departments->links() }}
          </div>
    </div>
  </div>
</div>
@endsection