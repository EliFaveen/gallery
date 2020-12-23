{{--not login user--}}

<header>
    <div class="header-main-div d-flex header-image">
        @if(auth()->user()->id === $posts_user->id)
        <a href="{{route('artist.post.editProfile',['user'=>auth()->user()->id])}}" id="edit-profile">
            @endif
            <div class="image-profile-parent">
                @if($posts_user->profile_pic)
                    <img src="{{url($posts_user->profile_pic)}}" alt="Avatar" class="image image-profile" >
                @else
                    <img src="{{url('assets/all_pages/img/default_profile/default_profile.png')}}" alt="Avatar" class="image image-profile" >
                @endif
                    @if(auth()->user()->id === $posts_user->id)
                <div class="overlay">
                    <div class="text">پروفایل من</div>
                </div>
                    @endif
            </div>
            @if(auth()->user()->id === $posts_user->id)
        </a>
        @endif
        <div class="info-flex-with-profile col-md-6">
            <div class="username">
                <h1>{{$posts_user->username}}@</h1>
            </div>
            <div class="bio d-flex" style="height: 149px ;overflow: hidden;">
                <h4>بیوگرافی:</h4>
                @if($posts_user->bio)
{{--                    <h4>{{strip_tags($posts_user->bio)}}</h4>--}}
                    <h4 class="bio-style">{!!$posts_user->bio!!}</h4>
                @else
                    <h4 class="bio-style">راجب خودت بنویس...</h4>
                @endif
            </div>
        </div>

        <div class="col-md-3 follow-post">
            <div class="follow-box">
                <a href="{{route('artist.home.showFollowers',['user'=>$posts_user->id])}}" class="btn btn-follow">followers<hr>{{$posts_user->followers->count()}}</a>
                <a href="{{route('artist.home.showFollowings',['user'=>$posts_user->id])}}" class="btn btn-follow">following<hr>{{$posts_user->following->count()}}</a>
            </div>
            <div class="post-box">
                <a href="{{route('artist.home.index_user',['user'=>$posts_user->id])}}" class="btn btn-post">posts<hr>{{$posts_user->posts->count()}}</a>
            </div>
        </div>
    </div>
</header>
