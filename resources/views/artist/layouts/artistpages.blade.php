{{--todo:upload photo--tyle img--validation error require--crop--}}
{{--todo:post title--}}
{{--todo:post description--}}
{{--todo: categories--foreach--}}
{{--todo:hashtag--good hashtags--}}
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <link rel="stylesheet" href="{{url('assets/artist/css/bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{url('assets/artist/css/fontawesom.css')}}">--}}
    <link rel="stylesheet" href="{{url('assets/artist/css/stylepages.css')}}">
    <!-- Bootstrap CSS -->
{{--    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">--}}
    {{--croppie head links--}}
{{--    <title>Laravel PHP - Cropping and uploading an image with Croppie plugin using jQuery Ajax </title>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--croppie head links--}}
    <title>Hello, world!</title>
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


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>--}}
{{--<script src="{{url('assets/artist/js/jquery.js')}}"></script>--}}
<script src="{{url('assets/artist/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/artist/js/fontawesom.js')}}"></script>
<script src="{{url('assets/artist/js/script.js')}}"></script>

</body>
</html>
