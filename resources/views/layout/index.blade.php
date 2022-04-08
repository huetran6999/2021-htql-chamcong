<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/images/logo-ctu.png" type="image" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebar.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- <script src="assets/js/modal.js"></script> --}}
    <link href="assets/css/nav.css" rel="stylesheet">
    <link href="assets/css/abc.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">​
    <title>Hệ thống quản lý</title>
</head>   
<body>
        @include('layout.navbar')
        <!--Container Main start-->
        @yield('content')

        

        <!-- jquery 3.3.1 -->
        <script src="{{asset('admin_asset/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
        <!-- Datatables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <!-- bootstap bundle js -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
        <!-- loại trường hợp -->
        
        
        
        <script src="{{asset('admin_asset/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
        <!-- slimscroll js -->
        <script src="{{asset('admin_asset/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('admin_asset/assets/libs/js/main-js.js')}}"></script>
        <!-- chart chartist js -->
        <script src="{{asset('admin_asset/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
        <!-- sparkline js -->
        <script src="{{asset('admin_asset/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
        <!-- morris js -->
        <script src="{{asset('admin_asset/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
        <script src="{{asset('admin_asset/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
        <!-- chart c3 js -->
        <script src="{{asset('admin_asset/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
        <script src="{{asset('admin_asset/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
        <script src="{{asset('admin_asset/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
        <script src="{{asset('admin_asset/assets/libs/js/dashboard-ecommerce.js')}}"></script>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        @yield('script')
        <!-- Optional JavaScript -->
        <script src="{{asset('js/custom.js')}}"></</script>
</body>
</html>