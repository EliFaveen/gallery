{{--not login user--}}

<header>
    <div class="header-main-div d-flex header-image">
        @if(auth()->user()->id === $posts_user)
        <a href="{{route('artist.post.editProfile',['user'=>auth()->user()->id])}}" id="edit-profile">
            @endif
            <div class="image-profile-parent">
                @if($posts_user->profile_pic)
                    <img src="{{url($posts_user->profile_pic)}}" alt="Avatar" class="image image-profile" >
                @else
                    <img src="{{url('assets/all_pages/img/default_profile/default_profile.png')}}" alt="Avatar" class="image image-profile" >
                @endif

                {{--        </div>--}}
                {{--        <div class="image-profile-parent">--}}
                    @if(auth()->user()->id === $posts_user)
                <div class="overlay">
                    <div class="text">پروفایل من</div>
                </div>
                    @endif
            </div>
            @if(auth()->user()->id === $posts_user)
        </a>
        @endif
        <div class="info-flex-with-profile col-md-6">
            <div class="username">
                <h1>{{$posts_user->username}}@</h1>
            </div>
            <div class="bio d-flex">
                <h4>بیوگرافی:</h4>
                @if($posts_user->bio)
                    <h4>{{$posts_user->bio}}</h4>
                @else
                    <h4>راجب خودت بنویس...</h4>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="follow-box">
                <a class="btn btn-follow">followers<hr>0</a>
                <a class="btn btn-follow">following<hr>0</a>
            </div>
            <div class="post-box">
                <a class="btn btn-post">posts<hr>{{$posts_user->posts->count()}}</a>
            </div>
        </div>
    </div>
</header>
