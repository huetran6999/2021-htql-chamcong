<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hệ thống quản lý</title>
</head>
<body>
  <h2>Đây là trang quản lý</h2>
  <form action="/create-account" method="post">
    @csrf
    <label>
        Tên đăng nhập:
        <input type="text" name="username">
    </label><br><br>
    <label>
        Password:
        <input type="text" name="password">
    </label><br><br>
    <button type="submit">Thêm</button>
</form>
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
</body>
</html>