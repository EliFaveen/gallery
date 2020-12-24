
@extends('artist.layouts.artist')
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/notifications_style.css')}}"><!--custom-->

@endsection

@section('title') صفحه اعلانات کاربر @endsection

@section('content')
    @include('inc.sidenav')
    @include('inc.header-small',['posts_user'=>auth()->user()])

    @if(!($singleArray_likes == null) || !($singleArray_comments == null))
{{--        @foreach($posts_new_likes as $post_new_likes)--}}
            @foreach($singleArray_likes as $post_new_like)
                <div class="alert alert-success " role="alert">
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                <a href="{{route('artist.like_visited',['like'=>$post_new_like->id])}}" class="alert-link">
                    <div class=header-flex>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mentioned-post-parent">
                                    <img class="mentioned-post" src="{{url($post_new_like->post->photos->first()->img_url)}}" alt="enter-post-image" >
                                </div>
                            </div>
                        </div>
                        <h4 class="alert-heading mr-3 ml-3">پست شما یک علاقه مندی جدید دارد!</h4>
                        @if($post_new_like->like)
                            <div class="heart-post-parent">
                                <i class="fa fa-heart heart-post"></i>
                            </div>
                        @else
                            <div class="heart-post-parent">
                                <i class="fa fa-heart-broken heart-post"></i>
                            </div>
                        @endif

                    </div>
                </a>

{{--                    <p>کاربر <a href="#" class="alert-link">{{$post_new_like->user->username}}</a> پست شما را لایک کرده</p>--}}
                    <hr>
                    <p class="mb-0">کاربر <a href="{{route('artist.home.index_user',['user'=>$post_new_like->user_id])}}" class="alert-link">{{$post_new_like->user->username}}</a> به پست شما علاقه
                        @if($post_new_like->like)
                            داشته
                        @else
                            نداشته
                        @endif
                        </p>


                </div>
            @endforeach
{{--        @endforeach--}}

{{--        @foreach($posts_new_comments as $post_new_comments)--}}
            @foreach($singleArray_comments as $post_new_comment)
                <div class="alert alert-info " role="alert">
                    <a href="{{route('artist.comment_visited',['comment'=>$post_new_comment->id])}}" class="alert-link">
                        <div class=header-flex>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mentioned-post-parent">
                                        <img class="mentioned-post" src="{{url(\App\Post::find($post_new_comment->commentable_id)->photos->first()->img_url)}}" alt="enter-post-image" >
                                    </div>
                                </div>
                            </div>
                            <h4 class="alert-heading mr-3 ml-3">پست شما یک دیدگاه جدید دارد!</h4>
                            <div class="comment-post-parent">
                                <i class="fa fa-comment comment-post"></i>
                            </div>


                        </div>
                    </a>

                    {{--                    <p>کاربر <a href="#" class="alert-link">{{$post_new_like->user->username}}</a> پست شما را لایک کرده</p>--}}
                    <hr>
                    <p class="mb-0"><a href="{{route('artist.home.index_user',['user'=>$post_new_comment->user_id])}}" class="alert-link">{{$post_new_comment->user->username}}</a> : <br>

                        {{Str::limit($post_new_comment->comment, $limit = 100, $end = '...') }}

                    </p>


                </div>
            @endforeach
{{--        @endforeach--}}
    @else
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-6">
                <div class="no-notify-image-parent">
                    <img class="no-notify-image" src="{{url('/assets/all_pages/img/defaults/notification3.png')}}" alt="enter-post-image" >
                </div>
            </div>
        </div>
    @endif

    @include('inc.footer')

@endsection
@section('custom-js')

@endsection
