{{--disable--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{url('assets/admin/css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{url('assets/admin/jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/tooplate.css')}}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('custom-css')


    <title>@yield('title')</title>
</head>

<body class="bg02">
<div class="container">
    <!-- nav bar -->
    @include('inc.admin_nav')

    <!-- row -->
    {{--    @if(session('success'))--}}
    {{--        <div class="row mb-2">--}}
    {{--            <div class="col-md-12">--}}
    {{--                <div class="alert alert-success" role="alert">--}}
    {{--                    {{session('success')}}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row tm-mt-big">

        @yield('content')

    </div>
    <footer class="row tm-mt-big">
        <div class="col-12 font-weight-light">
            {{--            <p class="d-inline-block tm-bg-black text-white py-2 px-4">--}}
            {{--                Copyright &copy; 2018 Admin Dashboard . Created by--}}
            {{--                <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>--}}
            {{--            </p>--}}
        </div>
    </footer>
</div>

<script src="{{url('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{url('assets/admin/jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
<!-- https://jqueryui.com/download/ -->
<script src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script>
    $(function () {
        $('#expire_date').datepicker();
    });
</script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>
