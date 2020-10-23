
@extends('artist.layouts.artist')

@section('content_diable')

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
 @section('content_diable')

     <div class="list-group">
         <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
             <div class="d-flex w-100 justify-content-between">
                 <h5 class="mb-1">List group item heading</h5>
                 <small>3 days ago</small>
             </div>
             <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
             <small>Donec id elit non mi porta.</small>
         </a>
         <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
             <div class="d-flex w-100 justify-content-between">
                 <h5 class="mb-1">List group item heading</h5>
                 <small class="text-muted">3 days ago</small>
             </div>
             <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
             <small class="text-muted">Donec id elit non mi porta.</small>
         </a>
         <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
             <div class="d-flex w-100 justify-content-between">
                 <h5 class="mb-1">List group item heading</h5>
                 <small class="text-muted">3 days ago</small>
             </div>
             <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
             <small class="text-muted">Donec id elit non mi porta.</small>
         </a>
         <div>sdfsdf</div>
         <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
             <div class="d-flex w-100 justify-content-between">
                 <h5 class="mb-1">List group item heading</h5>
                 <small class="text-muted">3 days ago</small>
             </div>
             <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
             <small class="text-muted">Donec id elit non mi porta.</small>
         </a>
         <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
             <div class="d-flex w-100 justify-content-between">
                 <h5 class="mb-1">List group item heading</h5>
                 <small class="text-muted">3 days ago</small>
             </div>
             <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
             <small class="text-muted">Donec id elit non mi porta.</small>
         </a>
         <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
             <div class="d-flex w-100 justify-content-between">
                 <h5 class="mb-1">List group item heading</h5>
                 <small class="text-muted">3 days ago</small>
             </div>
             <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
             <small class="text-muted">Donec id elit non mi porta.</small>
         </a>
     </div>


 @endsection
@section('content_diable')

    <div class="row posts-box">
        <div class="col-md-12 newspaper">
{{--            @foreach($posts->count() as $post_count)--}}
            @php($post_count=$posts->count())
                @switch($post_count)
                    @case($post_count%2 == 0)
                        {{$post_count.' is even'}}

                    @break

                    @case($post_count%2 == 1)
                        {{$post_count.' is odd'}}
                    @break

                    @default
                    Default case...
                @endswitch

            @foreach($posts as $post)
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




        <div class="row">
            <div class="col-md-12">
                {{$posts->links()}}
            </div>
        </div>



    </div>

@endsection
@section('content')

    <div class="row posts-box">


                @foreach($posts as $post)
            <div class="col-md-4" data-aos="fade-right" data-aos-duration="2000">
                <div class="a-tag-parent">
                    <a href="{{route('artist.post.show',['post'=>$post->id])}}" class="show-img-style">
                        <div class="card card-index" >
                            {{--                image--}}
                            @if($post->photos->first())

                                {{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                                <div class="post-img-parent">

                                    <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($post->photos->first()->img_url)}}" alt="{{$post->title}}">
                                </div>
                                {{--                </div>--}}
                            @else
                                <div class="post-img-parent">
                                    <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit($post->title, $limit = 28, $end = '...') }}</h5>
                                {{--                            <p class="card-text">{{Str::limit($post->description, $limit = 28, $end = '...') }}</p>--}}
                                {{--                            <a href="#" class="btn btn-primary">Show Post</a>--}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                @endforeach


        <div class="row">
            <div class="col-md-12">
                {{$posts->links()}}
            </div>
        </div>



    </div>

@endsection

