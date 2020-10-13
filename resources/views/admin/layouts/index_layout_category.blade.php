<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
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
</head>

<body id="reportsPage" class="bg02">
<div class="" id="home">
    <div class="container">

        @include('inc.admin_nav')

        <!-- row -->
        @yield('content')


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
<script src="{{url('assets/artist/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{url('assets/artist/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script>
    $(function () {
        $('.tm-product-name').on('click', function () {
            window.location.href = "edit-product.html";
        });
    })
</script>
</body>

</html>
