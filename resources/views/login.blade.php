<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập hệ thống</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* css cho hình nền */
        #bgimg{
            background-image: url('assets/images/bg-01.jpg');
            background-size: cover;
        }
    </style>

</head>
<body>

    <div class="vh-100" id="bgimg">
        <div class="container py-5 h-100">

            {{-- thông báo lỗi đăng nhập-sai tài khoản --}}
            @if (session('thongbao'))           
                <div class="alert alert-danger" role="alert">
                    <strong>{{session('thongbao')}}</strong>
                </div>
                    
            @endif

            {{-- thông báo đăng xuất thành công --}}
            @if (session('success'))           
                <div class="alert alert-success" role="alert">
                    <strong>{{session('success')}}</strong>
                </div>
                    
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <form method="POST" action="{{ url('/login') }}">
                                @csrf
                                <h3 class="mb-5  text-center">ĐĂNG NHẬP HỆ THỐNG</h3>
                    
                                <div class="form-outline mb-4">
                                    
                                    <label class="form-label">Tên đăng nhập</label>
                                    <input type="text" class="form-control form-control-lg" name="username" required/>

                                    {{-- thông báo lỗi-chưa đúng yêu cầu file LoginRequest --}}
                                    @if ($errors->has('username'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('username')}}</strong>
                                        </div>
                                    @endif
                                </div>                    
                                <div class="form-outline mb-4">
                                    <label class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control form-control-lg" name="password" required/>

                                    {{-- thông báo lỗi-chưa đúng yêu cầu file LoginRequest --}}
                                    @if ($errors->has('username'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('password')}}</strong>
                                        </div>
                                    @endif
                                </div>                                
                                <div class=" text-center">
                                    <button class="btn btn-primary btn-lg " type="submit">Đăng nhập</button>
                                </div>
                            </form>
            
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>
</body>
</html>
