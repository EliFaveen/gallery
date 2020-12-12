{{--@foreach($users as $user)--}}
{{--    {{$user->username}}<br>--}}
{{--@endforeach--}}

@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/index_style.css')}}"><!--custom-->
@endsection

@section('title') artist homepage @endsection

@section('content')
    @include('inc.sidenav')
    {{--    @include('inc.header-big')--}}

    <section class="section2">
        <div class="container">
            <form action="">
                <div class="row row2-1">
                    <!------------------------------------------------------------------------------------------------1---جستجو-->
                    <div class="col">
                        <p class="signup-suggest"> نام حساب کاربری ، هشتگ اثر یا عنوان اثر مورد نظر را جستحو کنید</p>
                    </div>
                    <!--------------------------------------------------------------------------------------------------1-----جستجو--->
                </div><!--end row2-1-->

                <div class="row row2-2">
                    <!------------------------------------------------------------------------------------------------2---جستجو-->
                    <div class="col">
                        <div class="checkbox-search-parent d-flex mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="search-radio" id="check-username" value="1" checked>
                                <label class="form-check-label" for="check-username">
                                    نام کاربری
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="search-radio" id="check-title" value="2">
                                <label class="form-check-label" for="check-title">
                                    عنوان اثر
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="search-radio" id="check-hashtag" value="3">
                                <label class="form-check-label" for="check-hashtag">
                                    هشتگ
                                </label>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------------------------------------------------------------------2-----جستجو-->
                </div><!--end row2-2-->

                <div class="row row2-3 justify-content-center">
                    <!---------------------------------------------------------------------------------------------------جستجو فرم-->
                    <div class="col-md-4">
                        <!-- Search form -->
                        <div class="md-form mt-0">
                            <input name="search" class="form-control" type="text" placeholder="جستجو کن..." aria-label="Search">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- Search btn -->
                        <div class="btn-search-parent">
                            <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <!-------------------------------------------------------------------------------------------------------جستجو فرم-->
                </div><!--end row2-3-->
            </form>
        </div><!--end container2-->
    </section><!--end section2-->


    {{--    main    --}}
    <div class="row posts-box">
        @foreach($users as $user)
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    {{--                image--}}
                                    @if($user->profile_pic)

                                        {{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                                        <div class="post-img-parent">

                                            <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($user->profile_pic)}}" alt="{{$user->username}}">
                                        </div>
                                        {{--                </div>--}}
                                    @else
                                        <div class="post-img-parent post-img-parent2">
                                            <img  class=" post-img post-img2 pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$user->username}}</h5>
                                    <p class="card-text">{{$user->name}} {{$user->lastname}}</p>
                                </div>
                            </div>
{{--                            <div class="card-footer">--}}
{{--                                <small class="text-muted">Last updated 3 mins ago</small>--}}
{{--                            </div>--}}
                        </div>
                    </div>
{{--            <div class="col-md-4" data-aos="fade-right" data-aos-duration="2000">--}}
{{--                <div class="a-tag-parent">--}}
{{--                    <a href="{{route('artist.home.index_user',['user'=>$user->id])}}" class="show-img-style">--}}
{{--                        <div class="card card-index" >--}}
{{--                            --}}{{--                image--}}
{{--                            @if($user->profile_pic)--}}

{{--                                --}}{{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
{{--                                <div class="post-img-parent">--}}

{{--                                    <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($user->profile_pic)}}" alt="{{$user->username}}">--}}
{{--                                </div>--}}
{{--                                --}}{{--                </div>--}}
{{--                            @else--}}
{{--                                <div class="post-img-parent">--}}
{{--                                    <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">{{Str::limit($user->username, $limit = 28, $end = '...') }}</h5>--}}
{{--                                --}}{{--                            <p class="card-text">{{Str::limit($post->description, $limit = 28, $end = '...') }}</p>--}}
{{--                                --}}{{--                            <a href="#" class="btn btn-primary">Show Post</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        @endforeach


{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                {{$users->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}



    </div>

    @include('inc.footer')

@endsection

@section('custom-js')
    <script src="{{url('assets/artist/js/index_script.js')}}"></script><!--custom-->
@endsection
