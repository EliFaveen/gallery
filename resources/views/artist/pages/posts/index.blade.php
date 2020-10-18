
@extends('artist.layouts.artist')

@section('content')
    @foreach($posts as $post)
    <div class="card" style="width: 18rem;">
        {{--        image         --}}
        @if($post->photos->first())
            <img style="" class="card-img-top img-thumbnail img-fluid" src="{{url($post->photos->first()->img_url)}}" alt="{{$post->title}}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <a href="#" class="btn btn-primary">Show Post</a>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            {{$posts->links()}}
        </div>
    </div>


@endsection
