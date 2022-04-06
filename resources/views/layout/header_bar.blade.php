<header class="header" id="header">
    <form method="GET",class='navbar-form navbar-left',role='search' action="{{route('search')}}">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg></button>
            </form>
          </div>
        </div>
      </nav>
    </form>
    <div class="header_img"> <img src="assets/images/logo-ctu.png" alt=""> </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        @include('layout.sidebar')
        @yield('sidebar')
    </nav>
</div>