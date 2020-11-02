@extends('layouts.app')

@section('custom-css')      <link href="{{url('assets/auth/css/auth_style.css')}}" rel="stylesheet"> @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تایید رمز عبور</div>

                <div class="card-body">
                    لطفا رمز عبور خود را بار دیگر وارد کنید تا به این صفحه دسترسی پیدا کنید

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">رمز عبور</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-block">
                                    تایید رمز
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
