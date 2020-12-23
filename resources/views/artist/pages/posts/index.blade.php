
@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/index_style.css')}}"><!--custom-->
@endsection

@section('title') artist homepage @endsection

@section('content')
    @include('inc.sidenav')
{{--    problem: this user shouldn't be called like this--}}
{{--    parametres from controller: posts_user & posts--}}

    @if($posts_user)

        @include('inc.header-big',['posts_user'=>$posts_user])

        @php($i=0)
        @if(!(auth()->user()->id === $posts_user->id))
            <div class="follow-unfollow">
                {{--                todo: if following--}}
                <form action="{{route('artist.home.follow_unfollow',['follower'=>auth()->user()->id,'following'=>$posts_user->id])}}" method="post">
                @csrf
                @foreach (auth()->user()->following as $following) <!--following haye kasi ke logine-->
                    @if($following->id == $posts_user->id)
                        <button  class="btn btn-success follow-unfollow-btn btn-block {{$i++}}" name="unfollowed" value="true">following</button>
                    @endif
                    @endforeach
                    @if($i == 0)
                        <button class="btn btn-primary follow-unfollow-btn btn-block" name="followed" value="true">follow</button>
                    @endif

                </form>
            </div>
        @endif

        <div class="main">
            @if(!$posts->first())
                <div class="row justify-content-center mt-4 mb-4">
                    <div class="col-md-6">
                        @if(auth()->user()->id === $posts_user->id)
                        <a href="{{route('artist.post.create')}}">
                            @endif
                            <div class="no-post-image-parent">
                                <img class="no-post-image" src="{{url('/assets/all_pages/img/add-post/add-post-gray-1.png')}}" alt="enter-post-image" >
                            </div>
                            @if(auth()->user()->id === $posts_user->id)
                        </a>
                        @endif
                    </div>
                </div>

            @else
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
                <div class="row paginate-row d-flex justify-content-center">
                    <div class="col-md-12">
                        {{$posts->links()}}
                    </div>
                </div>
            @endif

        </div>

    @else

        @include('inc.header-not-found')

        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-6">
                <div class="no-post-image-parent">
                    <img class="no-post-image" src="{{url('/assets/all_pages/img/add-post/add-post-gray-1.png')}}" alt="enter-post-image" >
                </div>
            </div>
        </div>

    @endif





    @include('inc.footer')

@endsection

@section('custom-js')
    <script src="{{url('assets/artist/js/index_script.js')}}"></script><!--custom-->
@endsection
