{{--@foreach($users as $user)--}}

{{--    {{$user->id}}--}}

{{--@endforeach--}}

{{--@foreach($users as $user)--}}
{{--    {{$user->username}}<br>--}}
{{--@endforeach--}}

@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/index_style.css')}}"><!--custom-->
@endsection

@section('title') artist homepage @endsection

@section('content')
    @include('inc.sidenav')
    @include('inc.header-big',['posts_user'=>$posts_user])

    {{--    main    --}}
    <div class="row posts-box">
        @foreach($users as $user)
            <div class="col-md-4 mt-3 mb-3">
{{--link to page --}}
                <a class="user-link" href="{{route('artist.home.index_user',['user'=>$user->id])}}">
                    <div class="card user-card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                {{--                image--}}
                                @if($user->profile_pic)

                                    {{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                                    <div class="post-img-parent post-img-parent2">

                                        <img  class="post-img post-img2 pl-0 pr-0 mr-0 ml-0" src="{{url($user->profile_pic)}}" alt="{{$user->username}}">
                                    </div>
                                    {{--                </div>--}}
                                @else
                                    <div class="post-img-parent post-img-parent2">
                                        <img  class=" post-img post-img2 pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                    </div>
                                @endif
                            </div>
                            <div class="card-body user-card-body">
                                <h5 class="card-title">{{$user->username}}</h5>
                                <p class="card-text">{{$user->name}} {{$user->lastname}}</p>
                            </div>
                        </div>
                        {{--                            <div class="card-footer">--}}
                        {{--                                <small class="text-muted">Last updated 3 mins ago</small>--}}
                        {{--                            </div>--}}
                    </div>
                </a>
            </div>

        @endforeach


{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                {{$users->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}



    </div>

    @include('inc.footer')

@endsection

@section('custom-js')
    <script src="{{url('assets/artist/js/index_script.js')}}"></script><!--custom-->
@endsection
