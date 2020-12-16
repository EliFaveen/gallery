<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <title>Products Page - Dashboard Template</title>--}}
    <title>@yield('title')</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{url('assets/admin/css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{url('assets/admin/css/tooplate.css')}}">

{{--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}

    {{--    sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    @yield('custom-css')



</head>

<body id="reportsPage" class="bg02">
<div class="" id="home">
    <div class="container">

        @include('inc.admin_nav')

        <!-- errors -->
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
        <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                @yield('content')

            </div>

        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
{{--                <p class="d-inline-block tm-bg-black text-white py-2 px-4">--}}
{{--                    Copyright &copy; 2018 Admin Dashboard . Created by--}}
{{--                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>--}}
{{--                </p>--}}
            </div>
        </footer>
    </div>
</div>
<script src="{{url('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('.tm-product-name').on('click', function () {--}}
{{--            window.location.href = "edit-product.html";--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
{{--@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])--}}
@yield('custom-js')
</body>
@include('sweet::alert')
</html>
