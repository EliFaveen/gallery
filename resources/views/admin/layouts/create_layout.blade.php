<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create category</title>
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
</head>

<body class="bg02">
<div class="container">
    <!-- nav bar -->
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-xl navbar-light bg-light">
                <a class="navbar-brand" href="index.html">
                    <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                    <h1 class="tm-site-title mb-0">Dashboard</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                Reports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Daily Report</a>
                                <a class="dropdown-item" href="#">Weekly Report</a>
                                <a class="dropdown-item" href="index.html">Yearly Report</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="products.html">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="accounts.html">Accounts</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-flex" href="login.html">
                                <i class="far fa-user mr-2 tm-logout-icon"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

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

    @yield('content')


    <footer class="row tm-mt-big">
        <div class="col-12 font-weight-light">
            {{--            <p class="d-inline-block tm-bg-black text-white py-2 px-4">--}}
            {{--                Copyright &copy; 2018 Admin Dashboard . Created by--}}
            {{--                <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>--}}
            {{--            </p>--}}
        </div>
    </footer>
</div>

<script src="{{url('assets/artist/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{url('assets/artist/jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
<!-- https://jqueryui.com/download/ -->
<script src="{{url('assets/artist/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script>
    $(function () {
        $('#expire_date').datepicker();
    });
</script>
</body>

</html>
