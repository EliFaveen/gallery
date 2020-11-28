
@extends('artist.layouts.artist')
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/show_style.css')}}"><!--custom-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!--glyphicon-->
@endsection

@section('title') show post page @endsection

@section('content')
    @php($i=0)
    @php($j=0)

    <div class="row single-post-box">

            <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
{{--                <div class="a-tag-parent">--}}
                        <div class="card" >

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






                            <div class="card-body" data-postid="{{$post->id}}">
{{--                                <h5 class="card-title">{{Str::limit($post->title, $limit = 28, $end = '...') }}</h5>--}}
{{--                                <p class="card-text">{{Str::limit($post->description, $limit = 28, $end = '...') }}</p>--}}
                                {{--           todo: like and unlike                --}}

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
{{--                </div>--}}
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
