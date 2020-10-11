
{{--@extends('artist.layouts.artistpages')--}}

@extends('artist.layouts.artist')

@section('content')


    {{--    sidenav col nadarad azad hast   --}}
    {{--    TODO: add to layout with if this is artist who looking at this page show sidenav--}}
    <div class="sidenav">
        <a href="{{route('artist.post.create')}}" class="all-sidenav plus"><i class="fas fa-plus"></i></a>
        <a href="#" class="all-sidenav heart"><i class="fas fa-heart"></i></a>
        <a href="#" class="all-sidenav home"><i class="fas fa-home"></i></a>
        <a href="#" class="all-sidenav search"><i class="fas fa-search"></i></a>
        <a href="#" class="all-sidenav crown"><i class="fas fa-crown"></i></a>

    </div>

    @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
            @foreach($photos as $photo)

            <img class="card-img-top" src="{{url($post->img_url)}}" alt="Card image cap">
            @endforeach
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach

@endsection
