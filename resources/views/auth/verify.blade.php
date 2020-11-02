@extends('layouts.app')

@section('custom-css')      <link href="{{url('assets/auth/css/auth_style.css')}}" rel="stylesheet"> @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تایید ایمیل کاربر</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            یک لینک جدید برای ایمیل شما اسال شد.
                        </div>
                    @endif

                        قبل از ادامه ، لطفاً ایمیل خود را برای لینک تأیید ایمیل بررسی کنید. اگر ایمیل را دریافت نکردید,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline btn-verify">روی این قسمت کلیک کنید تا لینک به ایمیل شما ارسال شود</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
