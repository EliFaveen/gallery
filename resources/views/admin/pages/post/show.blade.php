@extends('admin.layouts.index_layout')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
{{--    <link rel="stylesheet" href="{{url('assets/artist/css/show_style.css')}}"><!--custom--><!--for carousel-->--}}
@endsection

@section('title') صفحه نمایش پست سایت @endsection


@section('content')
    @php($i=0)
    @php($j=0)

    <div class="col-8 mx-auto">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-5 text-center mx-auto">
{{--                                    image--}}
{{--                    @if($post->photos->first())--}}
{{--                        @foreach($post->photos as $photo)--}}
{{--                        <div class="post-img-parent-large">--}}
{{--                            <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($photo->img_url)}}" alt="{{$post->title}}">--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
{{--                    @else--}}
{{--                        <div class="post-img-parent-large">--}}
{{--                                <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    {{--                image--}}
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        @if($post->photos->first())
                            {{--                                <ol class="carousel-indicators">--}}

                            {{--                                    @foreach($post->photos as $photo)--}}
                            {{--                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if($i==0) class="active {{$i++}}" @endif></li>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </ol>--}}
                            <div class="carousel-inner">
                                @foreach($post->photos as $photo)
                                    <div class="carousel-item @if($j==0) active @endif {{$j++}}">
                                        <div class="single-post-img-parent">
                                            <img  class="single-post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($photo->img_url)}}" alt="{{$post->title}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="single-post-img-parent">
                                        <img  class="single-post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
{{--                    <form action="index.html" method="post" class="tm-login-form">--}}

                                {{-----------------------------------------------------------------------------------------------title--}}
                                <div class="individual-title">
                                    <h1>
                                        {{$post->title}}
                                    </h1><hr>
                                </div>

                                {{---------------------------------------------------------------------------------------------description--}}
                                <div class="individual-body">
                                    <p style="text-align: center;">{{$post->description}}</p><hr class="mb-5">
                                </div>

                        {{---------------------------------------------------------------------------------------------categories--}}
                        <section style="text-align: justify" class="">
                            <div class="row row-top">
                                <div class="col-md-3 pr-0 pl-1 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                          سبک هنر
                                        </div>
                                        @if($post->categories)
                                            <ul class="list-group list-group-flush ">
                                                @foreach($post->categories as $category)
                                                    <li class="list-group-item"><a href="#"><i class="fas fa-angle-left ml-1 side-fa"></i>{{$category->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            {{---------------------------------------------------------------------------------------------hashtags--}}
                                <div class="col-md-3 pr-0 pl-1 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            هشتگ ها
                                        </div>
                                        @if($post->hashtags)
                                            <ul class="list-group list-group-flush ">
                                                @foreach($post->hashtags as $hashtag)
                                                    <li class="list-group-item"><a href="#"><i class="fas fa-angle-left ml-1 side-fa"></i>{{$hashtag->hashtag}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="input-group mt-3">
                            <a href="{{route('admin.post.index')}}" type="button" class="btn btn-primary d-inline-block mx-auto">بازگشت</a>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
