@extends('layout.index')
@section('content')
<div class="mt-5 bg-light col-lg-9" style="width: 100%" id="align-table">
  <div class="container">
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
                <a href="{{ route('enterprise.edit', $ent->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                <form action="{{ route('enterprise.destroy', $ent->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{$ent->e_name}}?')">Xóa</button>
                </form>
              </div>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
      <hr>
          <div style="float: right">
            {{ $enterprises->links() }}
          </div>
    </div>
  </div>
</div>
@endsection