<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
</head>
<body>
    <h2>Edit user</h2>
    <form action="/update-account/{{ $user->id }}" method="post">
        @csrf
        <label>
            Tên đăng nhập:
            <input type="text" name="username" value="{{ $user->username }}">
        </label><br><br>
       
        <label for="Password">
            Mật khẩu:
            <input type="text" name="password" >
        </label><br><br>
        <button type="submit">Cập nhật</button>
    </form>
    @if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
</body>
</html>