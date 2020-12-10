
@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/index_style.css')}}"><!--custom-->
@endsection

@section('title') artist homepage @endsection

@section('content')
    @include('inc.sidenav')
{{--    @include('inc.login_logout_btns')--}}
{{--    profile  --}}
{{--    <div class="container">--}}
<header>
<div class="header-main-div d-flex header-image">
    <a href="{{route('artist.post.editProfile',['user'=>auth()->user()->id])}}" id="edit-profile">
        <div class="image-profile-parent">
            <img src="{{url('assets/all_pages/img/default_profile/default_profile.png')}}" alt="Avatar" class="image image-profile" >
            {{--        </div>--}}
            {{--        <div class="image-profile-parent">--}}
            <div class="overlay">
                <div class="text">پروفایل من</div>
            </div>
        </div>
    </a>
    <div class="info-flex-with-profile">
        <div class="username">
            <h1>{{auth()->user()->username}}@</h1>
        </div>
        <div class="bio d-flex">
            <h2>bio:</h2>
            @if(auth()->user()->bio)
                <h4>{{auth()->user()->bio}}</h4>
            @else
                <h4>راجب خودت بنویس...</h4>
            @endif
        </div>
    </div>
</div>
</header>
{{--    </div>--}}

    <div class="row posts-box">
                @foreach($posts as $post)
            <div class="col-md-4" data-aos="fade-right" data-aos-duration="2000">
                <div class="a-tag-parent">
                    <a href="{{route('artist.post.show',['post'=>$post->id])}}" class="show-img-style">
                        <div class="card card-index" >
                            {{--                image--}}
                            @if($post->photos->first())

                                {{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                                <div class="post-img-parent">

                                    <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($post->photos->first()->img_url)}}" alt="{{$post->title}}">
                                </div>
                                {{--                </div>--}}
                            @else
                                <div class="post-img-parent">
                                    <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit($post->title, $limit = 28, $end = '...') }}</h5>
                                {{--                            <p class="card-text">{{Str::limit($post->description, $limit = 28, $end = '...') }}</p>--}}
                                {{--                            <a href="#" class="btn btn-primary">Show Post</a>--}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                @endforeach


        <div class="row">
            <div class="col-md-12">
                {{$posts->links()}}
            </div>
        </div>



    </div>

@endsection

@section('custom-js')
    <script src="{{url('assets/artist/js/index_script.js')}}"></script><!--custom-->
@endsection
