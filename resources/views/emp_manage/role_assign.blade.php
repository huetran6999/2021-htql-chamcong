@extends('layout.index')
@section('content')
<div class="container">
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Phân quyền người dùng</h3>
    <br>
    @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
    @endif
    <table class="table table-bordered">
        <thead class="table-primary">
            <th>STT</th>
            <th>Tên người dùng</th>
            <th>Username</th>
            <th>Email</th>
            <th>Chức vụ</th>
            <th>Phòng ban</th>
            <th>Quản lý</th>
            <th>Nhân sự</th>
            <th>Kế toán</th>
            <th>Nhân viên</th>
            <th>Hành động</th>
        </thead>

        <tbody>
            @foreach ($user as $u)
            <form method="POST" action="{{route('assign_role')}}">
                @csrf
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->u_name}}</td>
                    <td>
                        {{$u->username}}
                        <input type="hidden" name="username" value="{{$u->username}}">
                    </td>
                    <td>{{$u->u_email}}</td>
                    <td>{{$u->position->p_name}}</td>
                    <td>{{$u->department->d_name}}</td>
                    <td><input type="checkbox" name="manager_role" {{$u->hasRole(['manager']) ? 'checked' : ''}}></td>
                    <td><input type="checkbox" name="userleader_role" {{$u->hasRole(['userleader']) ? 'checked' : ''}}></td>
                    <td><input type="checkbox" name="salaryleader_role" {{$u->hasRole(['salaryleader']) ? 'checked' : ''}}></td>
                    <td><input type="checkbox" name="employee_role" {{$u->hasRole(['employee']) ? 'checked' : ''}}></td>

                    <td><input type="submit" class="btn btn-sm btn-secondary" value="Phân quyền"></td>
                </tr>
            </form>
            @endforeach

        </tbody>
    </table>
    <hr>
    <div style="float: right">
        {{ $user->links() }}
      </div>
</div>

@endsection