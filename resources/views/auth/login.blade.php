@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            {{--    form    --}}
            <div class="col-md-4">
                <div class="card card-background-style">
                    <div class="card-header"><h2 class="pt-1">ورود</h2>
                        <p class="green-comments">سلام دوست قدیمی من!</p>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="fix-bottom-form">

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-2 checkbox-style">
                                                <input class=" " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            </div>
                                            <div class="col-md-10">
                                                <label class=" login-remember-label" for="remember">
                                                    مرا به یاد داشته باش
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-block">
                                        ورود
                                    </button>

                                    @if (Route::has('password.request'))
                                        <div class="forgot-link mt-2">
                                            <a class="" href="{{ route('password.request') }}">
                                                رمز عبورت را فراموش کردی؟
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
            {{--    logo    --}}
            <div class="col-md-4 logo-background-img">
                <img class="" src="{{url('assets/auth/img/logo_with_text.png')}}">
            </div>
    </div>
</div>
@endsection
