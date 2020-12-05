{{--index template--}}


    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{url('assets/all_pages/css/bootstrap.min.css')}}"><!--this is important dont comment it-->
    <link rel="stylesheet" href="{{url('assets/all_pages/css/fontawesom.css')}}">
    <link rel="stylesheet" href="{{url('assets/all_pages/css/stylepages.css')}}"><!--main styles like side nav-->
{{--    sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{--    <script src="sweetalert2.all.min.js"></script>--}}
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
{{--    <script src="sweetalert2.min.js"></script>--}}
{{--    <link rel="stylesheet" href="sweetalert2.min.css">--}}

    @yield('custom-css')


    <title>@yield('title')</title>
</head>
<body>



{{--    TODO: add errors to messages layout--}}

<div class="container">



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


</div>

<script src="{{url('assets/all_pages/js/jquery.js')}}"></script>
<script src="{{url('assets/all_pages/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/all_pages/js/fontawesom.js')}}"></script>
@yield('custom-js')



</body>
<script src="{{asset('js/app.js')}}"></script>
@include('sweet::alert')
</html>
