{{--not login user--}}

<header>
    <div class="header-main-div d-flex header-image">
{{--        @if(auth()->user()->id === $posts_user)--}}
        <a href="{{route('artist.home.index_user',['user'=>$posts_user->id])}}" id="edit-profile">
{{--            @endif--}}
            <div class="image-profile-parent-small">
                @if($posts_user->profile_pic)
                    <img src="{{url($posts_user->profile_pic)}}" alt="Avatar" class="image image-profile-small" >
                @else
                    <img src="{{url('assets/all_pages/img/default_profile/default_profile.png')}}" alt="Avatar" class="image image-profile-small" >
                @endif

                {{--        </div>--}}
                {{--        <div class="image-profile-parent">--}}
                    @if(auth()->user()->id === $posts_user)
                <div class="overlay">
                    <div class="text">پروفایل من</div>
                </div>
                    @endif
            </div>
{{--            @if(auth()->user()->id === $posts_user)--}}
        </a>
{{--        @endif--}}
        <div class="info-flex-with-profile col-md-7">
            <div class="username">
                <a href="{{route('artist.home.index_user',['user'=>$posts_user->id])}}"><h4>{{$posts_user->username}}@</h4></a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="follow-box-small d-flex">
                <a class="btn btn-follow-small">followers<br> 0</a>
                <a class="btn btn-follow-small middle-btn">following<br> 0</a>
                <a class="btn btn-follow-small">posts<br> {{$posts_user->posts->count()}}</a>
            </div>
        </div>
    </div>
</header>
