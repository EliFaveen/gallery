
@extends('artist.layouts.artist')
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/show_style.css')}}"><!--custom-->
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!--glyphicon-->--}}
@endsection

@section('title') show post page @endsection

@section('content')
    @php($i=0)
    @php($j=0)

    <div class="row single-post-box">

{{--        right      --}}
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


{{--        left       --}}
        <div class="col-md-6">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">اطلاعات پست</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">نظرات</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ویرایش</a>
{{--                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">حذف</a>--}}
                </div>
            </nav>
            <div class="tab-content text-right" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="title-style">
                        <h3>
                            {{$post->title}}
                        </h3>
                    </div>
                    <div class="description-style">
                        {{$post->description}}
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2asdasd</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3asdasdsd</div>
            </div>
        </div><!--col-md-6 end-->

    </div><!--row end-->



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
                    <form action="{{ route('send.comment') }}" method="post">
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
                <h4 class="mt-4">بخش نظرات</h4>
                @auth
                    <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment">ثبت نظر جدید</span>
                @endauth
            </div>
            {{--                <div class="card">--}}
            {{--                    <div class="card-header d-flex justify-content-between">--}}
            {{--                        <div class="commenter">--}}
            {{--                            <span>نام نظردهنده</span>--}}
            {{--                            <span class="text-muted">- دو دقیقه قبل</span>--}}
            {{--                        </div>--}}
            {{--                        <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment" data-id="2" data-type="product">پاسخ به نظر</span>--}}
            {{--                    </div>--}}

            {{--                    <div class="card-body">--}}
            {{--                        محصول زیبایه--}}

            {{--                        <div class="card mt-3">--}}
            {{--                            <div class="card-header d-flex justify-content-between">--}}
            {{--                                <div class="commenter">--}}
            {{--                                    <span>نام نظردهنده</span>--}}
            {{--                                    <span class="text-muted">- دو دقیقه قبل</span>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}

            {{--                            <div class="card-body">--}}
            {{--                                محصول زیبایه--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
    </div>
@endsection
@section('custom-js')
    <script src="{{url('assets/artist/js/show_script.js')}}"></script><!--custom-->
    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}'; <!-- in web.php route like -->
    </script>
    <script>
        // $('#nav-home-tab a').on('click', function (e) {
        //     e.preventDefault()
        //     $(this).tab('show')
        // })
        // $('#nav-profile-tab a').on('click', function (e) {
        //     e.preventDefault()
        //     $(this).tab('show')
        // })
        // $('#nav-profile-tab a').on('click', function (e) {
        //     e.preventDefault()
        //     $(this).tab('show')
        // })

    </script>

{{--    comment   --}}
    <script>
        $('#sendComment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
        })
    </script>

@endsection
