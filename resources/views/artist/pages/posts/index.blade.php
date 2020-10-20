
@extends('artist.layouts.artist')

@section('content')

<div class="row posts-box">
{{--<div class="col-md-12 newspaper">--}}
    @foreach($posts->split($posts->count()/2) as $row)
{{--        card class style="width: 18rem;"--}}
        <div class="col-md-6" data-aos="fade-right" data-aos-duration="2000">
            @foreach($row as $post)
        <div class="card" >
            {{--                image--}}
            @if($post->photos->first())

{{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                    <div class="post-img-parent">

                        <img  class=" post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($post->photos->first()->img_url)}}" alt="{{$post->title}}">
                    </div>
{{--                </div>--}}
            @else
                <div class="post-img-parent">
                    <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <a href="#" class="btn btn-primary">Show Post</a>
            </div>
        </div>
            @endforeach

        </div>
    @endforeach
{{--</div>--}}




    <div class="row">
        <div class="col-md-12">
            {{$posts->links()}}
        </div>
    </div>



</div>

@endsection
