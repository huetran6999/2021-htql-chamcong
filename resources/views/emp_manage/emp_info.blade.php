@extends('layout.index')
@section('content')
<div class="container">
    <h3 class="border-start border-end border-danger" style="text-align:center; padding-top: 28px">Thông tin nhân viên</h3>
    <br>
    <form>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Thông Tin Chính</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1" >Thông Tin Liên Hệ</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu4" >Thông Tin Gia Đình/Người Thân</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2" >Thông Tin Trình Độ Bằng Cấp</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu3" >Thông Tin Công Tác</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu5" >Sửa Đổi Thông Tin Tài Khoản Tại Công Ty</a></li> --}}
                </ul>
            </div>
            <div class="card-body">
                <div id="#home">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#menu1" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>   
        </div> 
    </form>
</div>

                    

@endsection