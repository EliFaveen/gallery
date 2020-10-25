{{--index template--}}


    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{url('assets/all_pages/css/bootstrap.min.css')}}"><!--this is important dont comment it-->
    <link rel="stylesheet" href="{{url('assets/all_pages/css/fontawesom.css')}}">
    @yield('custom-css')

    <title>my title-@yield('title')</title>
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
</html>
