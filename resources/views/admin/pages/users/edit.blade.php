@extends('admin.layouts.index_layout')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه ویرایش کاربران سایت @endsection

@section('content')
{{--    <div class="row tm-mt-big">--}}
        <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12">
            <div class="bg-white tm-block">
                <div class="row header-style">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">ویرایش کاربر</h2>
                    </div>
                </div>
                <div class="row mt-4 tm-edit-product-row">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        {{--           form             --}}
                        <form class="tm-edit-product-form" method="post" action="{{route('admin.users.update' , ['user'=>$user->id])}}"  >
                            @csrf
                            @method('PATCH')
                            <div class="flex-main">

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">نام</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

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
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">نوع فعالیت شما</label>

                                    <div class="col-md-6 pt-2 pl-0 pr-3 radios-parent">
                                        <div class="radio1">
                                            <input class="radio" id="artist" type="radio" class="" name="role" value="artist" @if($user->role == 'artist') checked @endif>
                                            <label for="artist" class="pl-2">هنرمند</label>
                                        </div>
{{--                                        <div class="radio2">--}}
{{--                                            <input class="radio" id="user" type="radio" class="" name="role" value="user" @if($user->role == 'user') checked @endif>--}}
{{--                                            <label for="user">هنر دوست</label>--}}
{{--                                        </div>--}}
                                        <div class="radio3">
                                            <input class="radio" id="admin" type="radio" class="" name="role" value="admin" @if($user->role == 'admin') checked @endif>
                                            <label for="admin">ادمین</label>
                                        </div>
                                    </div>
                                </div>
                                {{--                        todo: birthdate--}}
                                {{--                        todo: country--}}
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="تنها اگر میخواهید پسورد را تغییر دهید این بخش را پر کنید">

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
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="تنها اگر میخواهید پسورد را تغییر دهید این بخش را پر کنید">
                                    </div>
                                </div>

                                @if(!$user->hasVerifiedEmail())
                                    <div class="form-check checkbox-style">
                                        <input type="checkbox" name="verify" class="form-check-input" id="verify">
                                        <label for="verify" class="form-check-label">ایمیل این اکانت فعال است</label>
                                    </div>
                                @endif



                                <div class="form-group row">
                                    <div class="tm-table-actions-col-left">
                                        <button class="btn btn-outline-success">ویرایش کاربر</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        {{--           form             --}}
                    </div>

                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection
