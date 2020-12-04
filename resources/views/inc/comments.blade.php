{{--u should pass the value comments--}}

@foreach($comments as $comment)
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between">
            <div class="commenter">
                <span>{{$comment->user->name}}</span>
                <span class="text-muted">- دو دقیقه قبل</span>
            </div>
            @auth
{{--                @if($comment->parent_id == 0)--}}
                    <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment" data-id="{{$comment->id}}" data-type="product">پاسخ به نظر</span>
{{--                @endif--}}
            @endauth
        </div>

        @guest
            <div class="alert alert-warning">برای ثبت نظر لطفا وارد سایت شوید!</div>
        @endguest

        <div class="card-body">
            {{$comment->comment}}

            @include('inc.comments',['comments'=>$comment->child])
        </div>
    </div>
@endforeach
