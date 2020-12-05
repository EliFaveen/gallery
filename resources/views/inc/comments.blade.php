{{--u should pass the value comments--}}

@foreach($comments as $comment)
    <div class="card comment-card mt-2">
        <div class="card-header comment-card-header d-flex justify-content-between">
            <div class="commenter d-flex">
                @if($comment->user->profile_pic)
                    <div class="profile-img-parent">
                        <img class="profile-img "  src="{{url($comment->user->profile_pic)}}" alt="{{$post->title}}">
                    </div>
                @else
                    <div class="profile-img-parent">
                        <img class="profile-img "  src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                    </div>
                @endif
                <div class="header-card-infos d-flex">
                    <span>{{$comment->user->username}}@ </span>
                    <span class="text-muted ml-2">- {{jdate($comment->created_at)->ago()}}</span>
                    @auth

                        <div class="reply-btn-parent">
                            {{--                @if($comment->parent_id == 0)--}}
                            <span class="all-reply-btn reply" data-toggle="modal" data-target="#sendComment" data-id="{{$comment->id}}" data-type="product"><i class="fas fa-reply"></i></span>
                            {{--                @endif--}}
                        </div>
                    @endauth
                    @if($comment->user_id == auth()->user()->id)
{{--                        <div class="reply-btn-parent">--}}
{{--                            <span class="all-reply-btn reply" data-toggle="modal" data-target="#sendComment" data-id="{{$comment->id}}" data-type="product"><i class="fas fa-trash"></i></span>--}}
{{--                        </div>--}}
                        <form method="post" action="{{route('delete.comment' , ['comment'=>$comment->id])}}">
                            @csrf
                            @method('DELETE')
                            <div class="reply-btn-parent">
                                <button type="submit" class=" delete-btn all-reply-btn reply" onclick="return confirm('مطمئنی؟ پاکش کنم؟')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                            </div>
                        </form>
{{--                        <div class="reply-btn-parent">--}}
{{--                            <span class="all-reply-btn reply" data-toggle="modal" data-target="#sendComment" data-id="{{$comment->id}}" data-type="product"><i class="fas fa-edit"></i></span>--}}
{{--                        </div>--}}


                    @endif
                </div>
            </div>

        </div>

        @guest
            <div class="alert alert-warning">برای ثبت نظر لطفا وارد سایت شوید!</div>
        @endguest


        <div class="card-body comment-card-body">
            <div class="body-comment d-flex">
                {{$comment->comment}}
{{--                @if($comment->child->count() > 0)--}}
{{--                     <button onclick="myFunction()">Click Me</button>--}}
{{--                @endif--}}
            </div>
{{--            <div id="myDIV">--}}
                @if($comment->parent_id !=0 )
                    <div class="parent-comment d-flex">
                        {{$comment->parent->user->username}}@
                    </div>
                @endif
                @include('inc.comments',['comments'=>$comment->child])
{{--            </div>--}}
        </div>

    </div>
@endforeach
