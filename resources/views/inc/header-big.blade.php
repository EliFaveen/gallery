<header>
    <div class="header-main-div d-flex header-image">
        <a href="{{route('artist.post.editProfile',['user'=>auth()->user()->id])}}" id="edit-profile">
            <div class="image-profile-parent">
                @if(auth()->user()->profile_pic)
                    <img src="{{url(auth()->user()->profile_pic)}}" alt="Avatar" class="image image-profile" >
                @else
                    <img src="{{url('assets/all_pages/img/default_profile/default_profile.png')}}" alt="Avatar" class="image image-profile" >
                @endif

                {{--        </div>--}}
                {{--        <div class="image-profile-parent">--}}
                <div class="overlay">
                    <div class="text">پروفایل من</div>
                </div>
            </div>
        </a>
        <div class="info-flex-with-profile">
            <div class="username">
                <h1>{{auth()->user()->username}}@</h1>
            </div>
            <div class="bio d-flex">
                <h2>bio:</h2>
                @if(auth()->user()->bio)
                    <h4>{{auth()->user()->bio}}</h4>
                @else
                    <h4>راجب خودت بنویس...</h4>
                @endif
            </div>
        </div>
    </div>
</header>
