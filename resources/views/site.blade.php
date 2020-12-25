<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سایت گالری تیدا</title>
    <link rel="stylesheet" href="{{url('assets/all_pages/css/bootstrap.min.css')}}"><!--this is important dont comment it-->
    <link rel="stylesheet" href="{{url('assets/all_pages/css/fontawesom.css')}}">
    <link rel="stylesheet" href="{{url('assets/site/css/site.css')}}">
<link >
</head>

<body>
<header>
    <div class="welcome">
        <h2>
            به سایت گالری تیدا گلد خوش آمدید
        </h2>
        <p>برای ادامه لطفا وارد سایت شود</p>
    </div>
    <h1>Tida Gold Gallery</h1>
    <div class="logo-img-parent">
        <img class="logo-img" src="{{url('assets/all_pages/img/logo/rose-gold-1585003_1920.png')}}" alt="line-logo" >
    </div>

    <div class="row login-register-box">
        @if (Route::has('login'))
{{--            <div class="top-right links">--}}
                @auth
                <div class="col-md-4">
                    @if(auth()->user()->role === 'admin')
                        <a class="btn btn-warning d-block" href="{{ route('admin.home.index')}}">Home</a>
                    @else
                        <a class="btn btn-warning d-block" href="{{ route('artist.post.index') }}">Home</a>
                    @endif

                </div>
                @else
                    <div class="col-md-4">
                        <a class="btn btn-warning d-block" href="{{ route('login') }}">Login</a>
                    </div>

                    @if (Route::has('register'))
                       <div class="col-md-4">
                           <a class="btn btn-warning d-block" href="{{ route('register') }}">Register</a>
                       </div>
                    @endif
                @endauth
{{--            </div>--}}
        @endif
    </div>
</header>


<footer>
    <h6>با ما همراه باشید</h6>

    <a href="" class="all-sidenav instagram"><i class="fab fa-instagram"></i></a>
    <a href="" class="all-sidenav linkedin"><i class="fab fa-linkedin-in"></i></a>
    <a href="" class="all-sidenav whatsapp"><i class="fab fa-whatsapp"></i></a>
    <a href="" class="all-sidenav twitter"><i class="fab fa-twitter"></i></a>
    <a href="" class="all-sidenav pinterest"><i class="fab fa-pinterest-p"></i></a>
    <a href="" class="all-sidenav facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="" class="all-sidenav telegram"><i class="fab fa-telegram-plane"></i></a>







</footer>

<script src="{{url('assets/all_pages/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/all_pages/js/fontawesom.js')}}"></script>
</body>
</html>
