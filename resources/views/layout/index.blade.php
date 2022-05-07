<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/images/logo-ctu.png')}}" type="image" sizes="16x16">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nav.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css')}}">
    <title>Hệ thống quản lý</title>
</head>

<body>
    @include('layout.navbar')

    <!--Container Main start-->
    @yield('content')
    <script src="{{ @asset('vendor/larapex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js')}}"></script>
    <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
    <script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}"></script>
    {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') }}"></script> --}}
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/emp.js') }}"></script>
    <script src="{{ asset('assets/js/salary.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</body>

</html>