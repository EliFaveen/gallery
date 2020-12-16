<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{url('assets/admin/css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/fullcalendar.min.css')}}">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/tooplate.css')}}">

    @yield('custom-css')
</head>

<body id="reportsPage">
<div class="" id="home">
    <div class="container">
        @include('inc.admin_nav')
        <!-- row -->
        @yield('content')

    </div>
</div>
<script src="{{url('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{url('assets/admin/js/moment.min.js')}}"></script>
<!-- https://momentjs.com/ -->
<script src="{{url('assets/admin/js/utils.js')}}"></script>
<script src="{{url('assets/admin/js/Chart.min.js')}}"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="{{url('assets/admin/js/fullcalendar.min.js')}}"></script>
<!-- https://fullcalendar.io/ -->
<script src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script src="{{url('assets/admin/js/tooplate-scripts.js')}}"></script>

@yield('custom-js')
</body>
</html>
