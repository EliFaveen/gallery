
@extends('artist.layouts.artist')

@section('custom-css')
{{--    <link rel="stylesheet" href="{{url('assets/artist/css/index_style.css')}}"><!--custom-->--}}
    <link rel="stylesheet" href="{{url('assets/artist/css/editProfile_style.css')}}"><!--custom-->
@endsection

@section('title') سایت گالری - پروفایل @endsection

@section('content')
    @include('inc.sidenav')

    {{--    profile  --}}
    <div class="row">
        <div class="col-md-12">

                @csrf
                @method('PATCH')
                <div class="card">
                <div class="card-header header-image">
                    @include('inc.login_logout_btns')
                    <form class="" method="post" action="{{route('artist.post.updateProfilePic',['user'=>$user->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="image-profile-parent">
                            @if($user->profile_pic)
                                <img src="{{url($user->profile_pic)}}" alt="Avatar" class="image image-profile" >
                            @else
                                <img src="{{url('assets/all_pages/img/default_profile/default_profile_green.png')}}" alt="Avatar" class="image image-profile" >
                            @endif
                            <div class="overlay">
                                <div class="text">
                                    <label class="custom-file-upload">
                                        <input id="file" type="file" name="photo" onchange="form.submit()">
                                        <i class="fa fa-edit" for="file-upload"></i> آپلود
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                    <form class="" method="post" action="{{route('artist.post.updateProfile',['user'=>$user->id])}}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                    <div class="flex-main col-md-7" style="margin: auto">

                        {{--                        todo: verify email--}}
                        @if(!$user->email_verified_at)
                            <div class="alert alert-warning" role="alert" style="text-align: right;">
                                برای فعالسازی ایمیل بر روی این
                                <a href="{{route('verification.notice')}}" class="alert-link">لینک</a>
                                کلیک کنید!
                            </div>
                        @else
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: right;">
                                <strong class="ml-2 mr-2">باتشکر!</strong>ایمیل شما فعال سازی شده است.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">نام</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-2 col-form-label text-md-right">نام خانوادگی</label>

                            <div class="col-md-10">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">ایمیل</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="فقط اگر میخواهید ایمیل خود را تغییر دهید این فیلد را پر کنید" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-2 col-form-label text-md-right">نام کاربری</label>

                            <div class="col-md-10">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="فقط اگر میخواهید نام کاربری خود را تغییر دهید این فیلد را پر کنید" name="username" autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">تلفن همراه</label>

                            <div class="col-md-10">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--                        todo: birthdate--}}
                        {{--                        todo: country--}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">کشور</label>

                            <div class="col-md-10">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{$user->country}}">

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        {{--                        todo: bio--}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">بیوگرافی</label>

                            <div class="col-md-10">
{{--                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>--}}
                                <textarea id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" autocomplete="bio" autofocus>{{$user->bio}}</textarea>
                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12 offset-md-4 btn-parent">
                                <button type="submit" class="btn btn-block">
                                    ویرایش
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                    </form>
            </div>

        </div>
    </div>


@endsection

@section('custom-js')
{{--    <script src="{{url('assets/artist/js/index_script.js')}}"></script><!--custom-->--}}
{{--    <script>--}}
{{--        document.getElementById("file").onchange = function() {--}}
{{--            document.getElementById("form").submit();--}}
{{--        };--}}
{{--    </script>--}}
@endsection
