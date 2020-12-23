
@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/index_style.css')}}"><!--custom-->
@endsection

@section('title') artist homepage @endsection

@section('content')
    @include('inc.sidenav')
{{--    @include('inc.header-big')--}}

@include('inc.searchbar')


{{--    main    --}}
<div class="main">
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
                            @include('inc.card_body',['post'=>$post])
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @if (!$without_paginate)
        <div class="row paginate-row d-flex justify-content-center">
            <div class="col-md-12">
                {{$posts->links()}}
            </div>
        </div>
    @endif


</div>



    @include('inc.footer')

@endsection

@section('custom-js')
    <script src="{{url('assets/artist/js/index_script.js')}}"></script><!--custom-->
@endsection
