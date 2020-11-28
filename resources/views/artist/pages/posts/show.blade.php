
@extends('artist.layouts.artist')
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/show_style.css')}}"><!--custom-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection

@section('title') show post page @endsection

@section('content')

    <div class="row single-post-box">



            <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
                <div class="a-tag-parent">
                        <div class="card" >
                            {{--                image--}}
                            @if($post->photos->first())

                                {{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                                <div class="single-post-img-parent">

                                    <img  class="single-post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($post->photos->first()->img_url)}}" alt="{{$post->title}}">
                                </div>
                                {{--                </div>--}}
                            @else
                                <div class="single-post-img-parent">
                                    <img  class="single-post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                </div>
                            @endif
                            <div class="card-body" data-postid="{{$post->id}}">
{{--                                <h5 class="card-title">{{Str::limit($post->title, $limit = 28, $end = '...') }}</h5>--}}
{{--                                <p class="card-text">{{Str::limit($post->description, $limit = 28, $end = '...') }}</p>--}}
                                {{--           todo: like and unlike                --}}

{{--               test again                 --}}

{{--                                <div class="interaction">--}}
{{--                                    <a href="#" class="like">Like</a>--}}
{{--                                    <a href="#" class="like">Dislike</a>--}}
{{--                                </div>--}}
{{--                  test 3              --}}
                                <div class="interaction">
                                    <a id="likeBtn" href="#" class="btn like heart ">
                                        @if(Auth::user()->likes()->where('post_id', $post->id)->first())
                                            @if(Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1)

{{--                                                <i class="fas fa-heart custom-like " style="color: red"></i>--}}
{{--                                                <span class="glyphicon glyphicon-thumbs-up">You like this post</span>--}}
                                                You like this post
                                            @else

{{--                                                <i class="fas fa-heart custom-like "></i>--}}
{{--                                                <span class="glyphicon glyphicon-thumbs-up">Like</span>--}}
                                                Like
                                            @endif

                                        @else

{{--                                            <i class="fas fa-heart custom-like "></i>--}}
{{--                                            <span class="glyphicon glyphicon-thumbs-up">Like</span>--}}
                                            Like
                                        @endif
{{--                                            <div id="numberOfLikes"></div>--}}
                                    </a>
                                    <a id="dislikeBtn" href="#" class="btn like broken-heart">
                                        @if(Auth::user()->likes()->where('post_id', $post->id)->first())
                                            @if(Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0)


{{--                                                <i class="fas fa-heart-broken custom-dislike " style="color: red"></i>--}}
{{--                                                <span class="glyphicon glyphicon-thumbs-down">You do not like this post</span>--}}
                                                You do not like this post
                                            @else

{{--                                                <i class="fas fa-heart-broken custom-dislike "></i>--}}
{{--                                                <span class="glyphicon glyphicon-thumbs-down">Dislike</span>--}}
                                                Dislike
                                            @endif

                                        @else

{{--                                            <i class="fas fa-heart-broken custom-dislike "></i>--}}
{{--                                        <span id="action" class="glyphicon glyphicon-thumbs-down">Dislike</span>--}}
                                            Dislike
                                        @endif
{{--                                            <div id="numberOfDislikes"></div>--}}
                                    </a>

                                </div>

                            </div>
                        </div>
                </div>
            </div><!--col-md-6 end-->

        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div><!--col-md-6 end-->

    </div><!--row end-->



@endsection
@section('custom-js')
    <script src="{{url('assets/artist/js/show_script.js')}}"></script><!--custom-->
    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}'; <!-- in web.php route like -->
    </script>

@endsection
