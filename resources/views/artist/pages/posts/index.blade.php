
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


    <div class="card-body"><h5 class="card-title">پست های من</h5>
        <table class="mb-0 table">
            <thead>
            <tr>
                <th>#</th>
                <th>عنوان پست</th>
                <th>توضیحات</th>
                <th>تصاویر</th>
                <th>ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
{{--                    <td>--}}
{{--                        --}}{{--                        {{\App\Category::find($product->category_id)->title}}--}}
{{--                        {{$product->category->title }}--}}
{{--                    </td>--}}
                    <td>
                        @foreach(\App\Photo::where('post_id',$post->id)->get() as $pic)
                            <img class="img-fluid img-thumbnail" src="{{url($pic->image_url)}}" style="width: 100px; height: 100px;">
                        @endforeach
{{--                        @foreach($post->photos as $product_photo)--}}
{{--                            <img style="width: 100px; height: 100px;" class="img-thumbnail img-fluid" src="{{url($product_photo->image_url)}}">--}}
{{--                        @endforeach--}}
                    </td>
                    <td>
                        <a href="#"><i class="fa fa-pencil-alt"></i></a>

                        {{--                        <form method="post" action="/delete-type/{{$type->id}}">--}}
                        {{--                            @csrf--}}
                        {{--                            <button onclick="return confirm('sure?')" type="submit" class="btn btn-danger">delete</button>--}}
                        {{--                        </form>--}}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{$posts->links()}}
        </div>
    </div>


@endsection
