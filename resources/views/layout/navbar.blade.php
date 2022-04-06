{{-- <div font-size:100%;> 
    <a href="{{route('index')}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Hệ thống quản lý</span> </a>
        <div class="nav_list">
      <a href="{{route('account')}}" class="nav_link {{ (\Request::route()->getName() == 'account') ? 'active' : '' }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Quản lý tài khoản</span> </a>
      <a href="{{route('employee')}}" class="nav_link {{ (\Request::route()->getName() == 'employee') ? 'active' : '' }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Quản lý nhân viên</span> </a>
      <a href="{{route('department')}}" class="nav_link {{ (\Request::route()->getName() == 'department') ? 'active' : '' }}"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Quản lý phòng ban</span> </a> 
      <a href="{{route('group')}}" class="nav_link {{ (\Request::route()->getName() == 'group') ? 'active' : '' }}"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Quản lý đơn vị</span> </a> 
      <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Quyền/Nhóm quyền</span> </a>
      <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Ngày làm việc</span> </a> 
      <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Lịch sử chấm công</span> </a>
      <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Báo cáo chấm công</span> </a>
    </div>
</div> <a href="{{route('logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Đăng xuất</span> </a> --}}

<!-- Navbar -->
<nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark z-depth-5">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{route('index')}}">
      <img src="assets/images/logo-ctu.png" height="50" alt="ctu-logo" loading="lazy" /> Hệ thống quản lý
    </a>

    <!-- Toggle button -->
    {{-- <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsibleNavbar"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{route('index')}}">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a  href="{{route('employee')}}" class="nav-link {{ (\Request::route()->getName() == 'employee') ? 'active' : '' }}">Nhân viên</a>
        </li>
        <li class="nav-item">
          <a href="{{route('enterprise')}}" class="nav-link {{ (\Request::route()->getName() == 'enterprise') ? 'active' : '' }}">Đơn vị</a>
        </li>
        <li class="nav-item">
          <a href="{{route('department')}}" class="nav-link {{ (\Request::route()->getName() == 'department') ? 'active' : '' }}">Phòng ban</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Recently Added</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My List</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Báo cáo
          </a>
          <div class="dropdown-menu">
             <a class="dropdown-item" href="#">Báo cáo lương</a>
             <a class="dropdown-item" href="#">Báo cáo chấm công</a>
          </div>
       </li>
      </ul>
      <!-- Left links -->

      <!-- Search form -->
      {{-- <form class="d-flex input-group w-auto">
        <input type="search" class="form-control" placeholder="Nhập vào cần tìm..." aria-label="Search" />
        <button class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark" style="padding: .45rem 1.5rem .35rem;">
          Tìm kiếm
        </button>
      </form> --}}
      <ul class="navbar-nav mb-2 mb-lg-0">
        @if (Auth::check())
          
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              <img src="assets/images/logo-ctu.png" height="30" alt="ctu-logo" loading="lazy" />{{ Auth::user()->u_name }}
            </a>
            <div class="dropdown-menu">
               <a class="dropdown-item" href="#">Xem hồ sơ</a>
               <a class="dropdown-item" href="#">Xem lịch sử chấm công</a>
               <a class="dropdown-item" href="#">Xem báo cáo</a>
               <hr class="dropdown-divider" />
               <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
            </div>
         </li>
        @endif
      </ul>

    </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>