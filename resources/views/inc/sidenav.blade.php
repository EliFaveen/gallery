{{--    sidenav col nadarad azad hast   --}}
{{--    TODO: add to layout with if this is artist who looking at this page show sidenav--}}
<div class="sidenav">
    @auth
        <div class="small-profile-img-parent">
            @if(auth()->user()->profile_pic)
                <a href="{{route('artist.post.index')}}" class="all-sidenav user-img">
                    <img src="{{url(auth()->user()->profile_pic)}}" alt="Avatar" class=" small-profile-img">
                </a>
            @else
                <a href="{{route('artist.post.index')}}" class="all-sidenav user">
                    <i class="fas fa-user-circle"></i>
                </a>
            @endif
        </div>
    @endauth
    <a href="{{route('artist.post.create')}}" class="all-sidenav plus"><i class="fas fa-plus"></i></a>
    <a href="{{route('artist.notification')}}" class="all-sidenav heart"><i class="fas fa-heart"></i></a>
    <a href="{{route('artist.home.index')}}" class="all-sidenav home"><i class="fas fa-home"></i></a>
{{--    <a href="#" class="all-sidenav search"><i class="fas fa-search"></i></a>--}}
    <a href="{{route('artist.home.index_popular')}}" class="all-sidenav crown"><i class="fas fa-crown"></i></a>

</div>
