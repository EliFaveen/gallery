@extends('layouts.app')

@section('custom-css')      <link href="{{url('assets/auth/css/auth_style.css')}}" rel="stylesheet"> @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {{--    form    --}}
        <div class="col-md-8">
            <div class="card card-background-style">
                <div class="card-header"><h2 class="pt-1">ثبت نام</h2>
                <p class="gray-comments">به جمع ما خوش آمدید</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                    <div class="flex-main">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">نام</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">نام خانوادگی</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">نام کاربری</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">تلفن همراه</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{-------------------------------------------------------disable role--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="role" class="col-md-4 col-form-label text-md-right">نوع فعالیت شما</label>--}}

{{--                                <div class="col-md-6 pt-2 pl-0 pr-3 radios-parent">--}}
{{--                                    <div class="radio1">--}}
{{--                                        <input class="radio" id="artist" type="radio" class="" name="role" value="artist">--}}
{{--                                        <label for="artist" class="pl-2">هنرمند</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="radio2">--}}
{{--                                        <input class="radio" id="user" type="radio" class="" name="role" value="user">--}}
{{--                                        <label for="user">هنر دوست</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{-----------------------------------------------------------password--}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row last-form-input">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تکرار رمز عبور</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-12 offset-md-4 btn-parent">
                                    <button type="submit" class="btn btn-block">
                                        ثبت نام
                                    </button>
                                </div>
                            </div>

                    </div>
{{--                        @php(dd(request()->all()))--}}
                    </form>
                </div>
            </div>
        </div>

        {{--    logo    --}}
{{--        <div class="col-md-4 logo-background-img">--}}
{{--            <img class="" src="{{url('assets/auth/img/logo_with_text.png')}}">--}}
{{--        </div>--}}
    </div>
</div>
@endsection
