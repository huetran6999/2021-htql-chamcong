<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập hệ thống</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/images/bg-01.jpg')";>
            <div class="wrap-login100 p-l-110 p-r-110 p-t-30 p-b-33">
                @if (session('thongbao'))           

                   
                        <div class="alert alert-danger" role="alert">
                            <strong>{{session('thongbao')}}</strong>
                        </div>
                    
                @endif
                <form class="login100-form validate-form flex-sb flex-w" method="post">
                    @csrf
                    <span class="login100-form-title p-b-53">
                        ĐĂNG NHẬP
                    </span>
                    <div id="abc">
                        <div class="p-b-9">
                            <span class="txt1">
                                Tên người dùng
                            </span>
                        </div>

                        <div class="wrap-input100" > 
                            <input class="input100" type="text" name="username" >
                        </div>

                        @if ($errors->has('username'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$errors->first('username')}}</strong>
                            </div>
                        @endif
                    </div>
                
                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Mật khẩu
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" >
                    </div>
                    <div id="abc">
                    @if ($errors->has('username'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('password')}}</strong>
                    </div>
                    @endif
                    </div>


                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    {{-- <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script> --}}
<!--===============================================================================================-->
   <!--  <script src="assets/vendor/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
    {{-- <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> --}}
<!--===============================================================================================-->
    <!-- <script src="assets/vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
    <!-- <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
   <!--  <script src="assets/vendor/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
    <script src="assets/js/main.js"></script>

</body>
</html>