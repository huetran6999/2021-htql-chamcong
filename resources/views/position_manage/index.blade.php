@extends('layout.index')
@section('content')
<div class=" bg-light col-lg-9" style="width: 100%" id="align-table">
  
  <div class="container">
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Danh sách chức vụ</h3>
    <a href="{{ route('position.create') }}" class="btn btn-success btn-add" style="float: right"><i class="fa fa-plus"></i> Thêm mới</a> <br>
    <br>
    <div class="table-responsive-sm">
      @if (Session::has('message'))
      <div class="alert alert-success">
        <strong>{{Session::get('message')}}</strong>
      </div>
      @endif

      @if (Session::has('failed'))
      <div class="alert alert-danger">
        <strong>{{Session::get('failed')}}</strong>
      </div>
      @endif
      <table class="table table-bordered table-hover">
        <thead class="table-primary">
          <tr>
            <th>STT</th>
            <th>Tên chức vụ</th>
            <th>Phòng ban</th>
            <th>Đơn vị</th>
            <th>Lương cơ bản</th>
            <th>Hệ số lương</th>
            <th>Hành động</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($positions as $pos )
          <tr>
            <td>{{ $loop-> index + 1 }}</td>
            <td>{{ $pos->p_name }}</td>
            <td>{{ $pos->dep_pos->d_name }}</td>
            <td>{{ $pos->dep_pos->enterprise->e_name }}</td>
            <td>{{ $pos->basic_salary }}</td>
            <td>{{ $pos->salary->coefficient_salary }}</td>
            <td>
              <div>
                <a href="{{ route('position.edit', $pos->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <form action="{{ route('position.destroy', $pos->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá chức vụ {{$pos->p_name}} không?')"><i class="fa fa-trash"></i></button>
                </form>
              </div>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
      <hr>
          <div style="float: right">
            {{ $positions->links() }}
          </div>
    </div>
  </div>
</div>
@endsection