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
      Họ và tên:
      <input type="text" name="fullname">
  </label><br><br>
  <label>
    Ngày sinh:
    <input type="text" name="dob">
</label><br><br>
<label>
  Giới tính:
  <input type="text" name="gender">
</label><br><br>
<label>
  Số điện thoại:
  <input type="text" name="phone_no">
</label><br><br>
<label>
  Email:
  <input type="text" name="email">
</label><br><br>
    <label>
        Tên đăng nhập:
        <input type="text" name="username">
    </label><br><br>
    <label>
        Password:
        <input type="text" name="password">
    </label><br><br>
    <label>
      Số CCCD:
      <input type="text" name="code">
  </label><br><br>
  <label>
    Ngày cấp:
    <input type="text" name="create_date">
</label><br><br>
<label>
  Nơi cấp:
  <input type="text" name="create_place">
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