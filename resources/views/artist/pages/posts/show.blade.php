
@extends('artist.layouts.artist')
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/show_style.css')}}"><!--custom-->
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!--glyphicon-->--}}
    <style>
    /*-----------------------------------for hashtags-----------------------------------*/
    @import url('https://fonts.googleapis.com/css?family=Work+Sans:300,400');

    /*body {*/
    /*display: flex;*/
    /*align-items: center;*/
    /*justify-content: center;*/
    /*!*height: 100vh;*!*/
    /*!*overflow: hidden;*!*/
    /*font-family: 'Work Sans', sans-serif;*/
    /*!*background-color: #1a284f;*!*/
    /*!*color: white;*!*/
    /*}*/

    .wrapper {
    padding: 20px 28px;
    /*margin: 0;*/
    /*margin: 48px 263px 42px 0px !important;*/
    /*width: 580px;*/
    background-color:#869791;
    color: #fef4e1;
    border-radius: 30px;
    display: flex;
    align-items: center;
    flex-flow: row wrap;
    border: solid 2px white;
    }

    h3 {
    margin: 10px 14px 10px 0;
    font-weight: 300;
    font-size: 36px;
    }

    p {
    margin: 10px 10px;
    font-weight: 300;
    font-size: 14px;
    opacity: 0.8;
    letter-spacing: 1px;
    }

    input {
    border: none;
    border-radius: 12px;
    padding: 16px 20px;
    margin: 8px;
    width: 100%;
    color: #666;
    font-family: 'Work Sans', sans-serif;
    font-size: 16px;
    outline: none;
    }

    .tag-container {
    display: flex;
    flex-flow: row wrap;
    }

    .tag{
    pointer-events: none;
    background-color: #505d58;
    color: white;
    padding: 6px;
    margin: 5px;
    }

    .tag::before {
    pointer-events: all;
    display: inline-block;
    content: 'x';
    height: 20px;
    width: 20px;
    margin-right: 6px;
    text-align: center;
    color: #ccc;
    background-color: #505d58;
    cursor: pointer;
    }

    </style>

    @endsection

@section('title') show post page @endsection

@section('content')
    @include('inc.sidenav')

    @php($i=0)
    @php($j=0)
    @include('inc.header-small',['posts_user'=>$post->user])
    @php($i=0)
    @if(!(auth()->user()->id === $post->user->id))
        <div class="follow-unfollow">
            {{--                todo: if following--}}
            <form action="{{route('artist.home.follow_unfollow',['follower'=>auth()->user()->id,'following'=>$post->user->id])}}" method="post">
            @csrf
            @foreach (auth()->user()->following as $following) <!--following haye kasi ke logine-->
                @if($following->id == $post->user->id)
                    <button  class="btn btn-success follow-unfollow-btn btn-block {{$i++}}" name="unfollowed" value="true">following</button>
                @endif
                @endforeach
                @if($i == 0)
                    <button class="btn btn-primary follow-unfollow-btn btn-block" name="followed" value="true">follow</button>
                @endif

            </form>
        </div>
    @endif

{{--<a href="{{route('artist.home.index_user',['user'=>$post->user->id])}}">{{$post->user->username}}</a>--}}
    <div class="row single-post-box">

{{--        right      --}}
            <div class="col-md-6 right-col-md-6" >
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





{{---------------------------------------------------------------------------------------------like--}}
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


{{--        left       --}}
        <div class="col-md-6 left-col-md-6">
            <nav style="font-size: 14px;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">اطلاعات پست</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">نظرات</a>

                    <a class="nav-item nav-link " id="nav-hashtag-tab" data-toggle="tab" href="#nav-hashtag" role="tab" aria-controls="nav-hashtag" aria-selected="false">هشتگ</a>
                    <a class="nav-item nav-link " id="nav-category-tab" data-toggle="tab" href="#nav-category" role="tab" aria-controls="nav-category" aria-selected="false">سبک نقاشی</a>
                    @if(auth()->user()->id == $post->user_id)
                    <a class="nav-item nav-link " id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ویرایش پست</a>
                    @endif

                    @if(auth()->user()->id == $post->user_id)
                        <div class="d-flex delete-edit-box">
                            <form method="post" action="{{route('artist.post.destroy' , ['post'=>$post->id])}}">
                                @csrf
                                @method('DELETE')
                                <div class="fa-parent-style">
                                    <button type="submit" class="fa-style" onclick="return confirm('با زدن تایید پست کامل پاک میشه!')"><i class="fas fa-trash-alt"></i></button>
                                 </div>
                            </form>
                            {{--                        <div class="fa-parent-style">--}}
                            {{--                            <a class="nav-item nav-link fa-style" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-edit"></i></a>--}}
                            {{--                        </div>--}}

                        </div>
                    @endif


                </div>
            </nav>
            <div class="tab-content text-right" id="nav-tabContent">
                <div class="tab-pane tab-style fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="title-style">
                        <div class="col-md-9 title-col-style">
                            <h3 >
                                {{$post->title}}
                            </h3>
                        </div>
                        <div class="col-md-3" style="text-align: end">
                            <div class="post-created-at">
                                {{jdate($post->created_at)->format('%B %d، %Y')}}
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="description-style">
                        {!! $post->description !!}
                    </div>
                </div>
                {{--      comments      --}}
                <div class="tab-pane fade tab-style" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    @auth
                        <div class="modal fade" id="sendComment">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ارسال نظر</h5>
                                        <button type="button" class="close mr-auto ml-0" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('send.comment') }}" method="post" id="sendCommentForm">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="commentable_id" value="{{$post->id }}" ><!--just change here-->
                                            <input type="hidden" name="commentable_type" value="{{get_class($post)}}"><!--and here-->
                                            <input type="hidden" name="parent_id" value="0">

                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">پیام دیدگاه:</label>
                                                <textarea name="comment" class="form-control" id="message-text"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                                            <button type="submit" class="btn btn-primary">ارسال نظر</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                    <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mt-2 title-comment-style">بخش نظرات</h5>
                                @auth
                                    <div class="comment-btn-parent">
                                        {{--                                    <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment" data-id="0">ثبت نظر جدید</span>--}}
                                        <span class="all-comment-btn comment" data-toggle="modal" data-target="#sendComment" data-id="0"><i class="far fa-comments"></i></span>
                                    </div>

                                @endauth
                            </div>
                            @include('inc.comments',['comments'=>$post->comments()->where('parent_id',0)->where('approved',1)->orderBy('created_at','desc')->get()])
                        </div>
                    </div>
                    {{--    end comments    --}}
                </div>
{{--                hashtags--}}
                <div class="tab-pane tab-style fade" id="nav-hashtag" role="tabpanel" aria-labelledby="nav-hashtag-tab">
                    @php($x=0)
                 <div class="row hshtag-row">
                     @if($post->hashtags()->first())
                         <ul class="list-group">
{{--                             <div class="col-md-12 d-flex">--}}
                                 @foreach($post->hashtags as $hashtag)
                                     <li class="list-group-item ml-2 mt-2">
{{--------------------------------------------------------------------------------send hashtags to search--}}
                                         <a href="/artist/home/post?search-radio=3&search={{$hashtag->hashtag}}">#{{$hashtag->hashtag}}</a>
                                     </li>
                                 @endforeach
                                 <div class="div seprate-a" style="cursor: pointer">
                                     <!-- Button trigger modal -->
                                    @if(auth()->user()->id == $post->user_id)
                                         <a class="plus" data-toggle="modal" data-target="#editHashtag">
                                             <i class="fa fa-plus"></i>
                                         </a>
                                    @endif

                                 </div>
                             <!-- Modal -->
                                     @auth
                                         <div class="modal fade" id="editHashtag">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="editHashtagLabel">ویرایش هشتگ</h5>
                                                         <button type="button" class="close mr-auto ml-0" data-dismiss="modal">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                     </div>
                                                     <form action="{{route('artist.post.updateHashtag',['post'=>$post->id])}}" method="post" id="editHashtagForm">
                                                         @csrf
                                                         @method('PATCH')
                                                         <div class="modal-body">
{{--                                                             <input type="hidden" name="commentable_id" value="{{$post->id }}" ><!--just change here-->--}}
{{--                                                             <input type="hidden" name="commentable_type" value="{{get_class($post)}}"><!--and here-->--}}
{{--                                                             <input type="hidden" name="parent_id" value="0">--}}

                                                             <div class="form-group">
                                                                 <label for="message-text" class="col-form-label">اضافه یا حذف هشتگ:</label>
{{--                                                                 <textarea name="comment" class="form-control" id="message-text"></textarea>--}}
                                                                 {{---------------------------------------------------------------------------------------------hashtags row--}}
                                                                 <div class="row">
                                                                     <div class="col-md-12">
                                                                         <div class="wrapper">
                                                                             <h3>هشتگ های تو</h3>
                                                                             <p class="info">مثل نمونه زیر یک هشتگ بنویس و اینتر بزن</p>
                                                                             <input class="" name="" type="text" id="hashtags" autocomplete="off"  placeholder="#یک_هشتگ_بنویس" >
                                                                             <div class="tag-container">

                                                                                 @if($post->hashtags)
                                                                                     @foreach($post->hashtags as $hashtag)
                                                                                         <input class="hashtag_input" type="hidden" name="hashtags[]" id="tags_{{$x}}" value="{{$hashtag->hashtag}}">
                                                                                         <p class="tag" id="tags{{$x++}}">{{$hashtag->hashtag}}</p>
                                                                                     @endforeach
                                                                                 @endif
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                                                             <button type="submit" class="btn btn-primary">ویرایش هشتگ</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     @endauth
{{--                                 </div>--}}
{{--                             </div>--}}
                         </ul>


                     @else
                         <ul class="list-group">
                             <div class="col-md-12 d-flex">
                                 @if(auth()->user()->id == $post->user_id)
                                     <a data-toggle="modal" data-target="#editHashtag" style="cursor: pointer">
                                         @endif
                                         <div class="no-post-image-parent">
                                             <img class="no-post-image" src="{{url('/assets/all_pages/img/defaults/hashtag-logo.png')}}" alt="enter-post-image" >
                                         </div>
                                         @if(auth()->user()->id == $post->user_id)
                                     </a>
                                 @endif
                                 <!-- Modal -->
                                     @auth
                                         <div class="modal fade" id="editHashtag">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="editHashtagLabel">ویرایش هشتگ</h5>
                                                         <button type="button" class="close mr-auto ml-0" data-dismiss="modal">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                     </div>
                                                     <form action="{{route('artist.post.updateHashtag',['post'=>$post->id])}}" method="post" id="editHashtagForm">
                                                         @csrf
                                                         @method('PATCH')
                                                         <div class="modal-body">
                                                             {{--                                                             <input type="hidden" name="commentable_id" value="{{$post->id }}" ><!--just change here-->--}}
                                                             {{--                                                             <input type="hidden" name="commentable_type" value="{{get_class($post)}}"><!--and here-->--}}
                                                             {{--                                                             <input type="hidden" name="parent_id" value="0">--}}

                                                             <div class="form-group">
                                                                 <label for="message-text" class="col-form-label">اضافه یا حذف هشتگ:</label>
                                                                 {{--                                                                 <textarea name="comment" class="form-control" id="message-text"></textarea>--}}
                                                                 {{---------------------------------------------------------------------------------------------hashtags row--}}
                                                                 <div class="row">
                                                                     <div class="col-md-12">
                                                                         <div class="wrapper">
                                                                             <h3>هشتگ های تو</h3>
                                                                             <p class="info">مثل نمونه زیر یک هشتگ بنویس و اینتر بزن</p>
                                                                             <input class="" name="" type="text" id="hashtags" autocomplete="off"  placeholder="#یک_هشتگ_بنویس" >
                                                                             <div class="tag-container">

                                                                                 @if($post->hashtags)
                                                                                     @foreach($post->hashtags as $hashtag)
                                                                                         <input class="hashtag_input" type="hidden" name="hashtags[]" id="tags_{{$x}}" value="{{$hashtag->hashtag}}">
                                                                                         <p class="tag" id="tags{{$x++}}">{{$hashtag->hashtag}}</p>
                                                                                     @endforeach
                                                                                 @endif
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                                                             <button type="submit" class="btn btn-primary">ویرایش هشتگ</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     @endauth
                             </div>
                         </ul>
                     @endif
                 </div>
                </div>
{{--                categories--}}
                <div class="tab-pane fade tab-style" id="nav-category" role="tabpanel" aria-labelledby="nav-category-tab">
                    @if($post->categories->first())
                        <h2 class="title-style">سبک های این نقاشی عبارتند از:</h2>
                        @foreach($post->categories as $category)
                            <div class="bg-white tm-block">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        {{--                image               --}}

                                        @if($category->category_pic)
                                            <div class="post-img-parent-large">
                                                <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                                            </div>
                                        @else
                                            <div class="post-img-parent-large">
                                                <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        {{--                    <form action="index.html" method="post" class="tm-login-form">--}}
                                        <div class="individual-title">
                                            <h1>
                                                {{$category->title}}
                                            </h1><hr>
                                        </div>
                                        <div class="individual-body">
                                            {{$category->description}}
                                        </div><hr>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 d-flex">
                            @if(auth()->user()->id == $post->user_id)
                                <a href="#">
                                    @endif
                                    <div class="no-category-image-parent">
                                        <img class="no-category-image" src="{{url('/assets/all_pages/img/defaults/nothing_logo.png')}}" alt="enter-post-image" >
                                    </div>
                                    @if(auth()->user()->id == $post->user_id)
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
{{--                edit--}}
                @if($post->user_id == auth()->user()->id)
                    <div class="tab-pane tab-style fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="form-parent">
                            <form class="" method="post" action="{{route('artist.post.update',['post'=>$post->id])}}">
                                @csrf
                                @method('PATCH')
                                {{---------------------------------------------------------------------------------------------title row--}}
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <input class="form-control" name="title" id="title" type="text" placeholder="اسم نقاشیت رو چی میزاری؟" value="{{$post->title}}">

                                    </div>
                                </div>
                                {{---------------------------------------------------------------------------------------------description row--}}
                                <div class="row justify-content-md-center description-row">
                                    <div class="col-md-8">
                                        <textarea class="tinymce form-control" name="description" id="description" placeholder="یک کپشن راجبش بنویس">{{$post->description}}</textarea>

                                    </div>
                                </div>
                                {{---------------------------------------------------------------------------------------------submit--}}
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <button type="submit" class="mt-2 btn btn-outline-success btn-block">ویرایش پست</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div><!--col-md-6 end-->

    </div><!--row end-->

    @include('inc.footer')

@endsection
@section('custom-js')
    <script src="{{url('assets/artist/js/show_script.js')}}"></script><!--custom-->
    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}'; <!-- in web.php route like -->
    </script>

    <script>
{{--    for ajax comment box    --}}
        $('#sendComment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            let paret_id = button.data('id')
            console.log(paret_id)

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('input[name="parent_id"]').val(paret_id)
        })
    //for ajax form request
//java script
document.querySelector('#sendCommentForm').addEventListener('submit',function (event){
    event.preventDefault(); //form data doesnt sent and stop here with submit
    let target=event.target;//target is our form
    // console.log(target.querySelector('input[name=commentable_id]'))
    let data= {
        commentable_id : target.querySelector('input[name=commentable_id]').value,
        commentable_type : target.querySelector('input[name=commentable_type]').value,
        parent_id : target.querySelector('input[name=parent_id]').value,
        comment : target.querySelector('textarea[name=comment]').value,
    }
    //validation
    // if(data.comment.length < 2){
    //     console.error('plz enter comment more than 2 char')
    //     return ;
    // }
//    ajax request with jquery library not axios
//     console.log(document.head.querySelector('meta[name="csrf-token"]').content) //access in layout blade meta tag
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }


    })

    $.ajax({
        type:'POST',
        url:'/comments',
        data:JSON.stringify(data),//our data is an object we should send it as json
        success:function (data){
            //  console.log(data)
            // alert("عکس شما با موفقیت آپلود شد");
            Swal.fire({
                title: 'با تشکر',
                text: 'متن شما با موفقیت ارسال شد...پس از تایید در سایت نمایش داده خواهد شد',
                icon: 'success',
                confirmButtonText: 'باشه'
            })
        }
    })

})


    </script>
    <script>
        // create.blade.php-----------------------------------------------------------------for hashtags this intrupt my like system
        let input, hashtagArray, container, t={{$x}};

        input = document.querySelector('#hashtags');
        container = document.querySelector('.tag-container');
        hashtagArray = [];

        input.addEventListener('keyup', () => {
            if (event.which == 13 && input.value.length > 0) {
                var text = document.createTextNode(input.value);
                var myinput = document.createElement('input');
                //var mydiv = document.createElement('div');
                var p = document.createElement('p');

                //container.appendChild(mydiv);
                // mydiv.appendChild(myinput);
                container.appendChild(myinput);
                myinput.appendChild(text);
                myinput.classList.add('hashtag_input');

                container.appendChild(p);
                p.appendChild(text);
                p.classList.add('tag');

                p.setAttribute("id", 'tags' + t);

                myinput.setAttribute("type", "hidden");
                myinput.setAttribute('name', 'hashtags[]');
                myinput.setAttribute('id', 'tags_' + t);

                $('#tags_' + t).val(input.value);
                t++;

                input.value = '';


                //for p tags
                let deleteTags = document.querySelectorAll('.tag');
                let deleteInput = document.querySelectorAll('.hashtag_input');


                for(let i = 0; i < deleteTags.length; i++) {
                    deleteTags[i].addEventListener('click', () => {
                        container.removeChild(deleteTags[i]);
                        container.removeChild(deleteInput[i]);


                    });

                }
            }
        });
        //create.blade.php-------------------------------------------------------------------except enter for texterea
        $(document).on("keydown", ":input:not(textarea)", function(event) {
            return event.key != "Enter";
        });
    </script>

@endsection
