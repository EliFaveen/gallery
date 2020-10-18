
{{--@extends('artist.layouts.artistpages')--}}

@extends('artist.layouts.artist')

@section('content')

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
{{--                        @if(\App\Photo::where('post_id',$post->id) != null)--}}
{{--                            @foreach(\App\Photo::where('post_id',$post->id)->get() as $pics)--}}

{{--                                <img class="img-fluid img-thumbnail" src="{{url($pics->img_url)}}" style="width: 100px; height: 100px;">--}}
{{--                                --}}
{{--                            @endforeach--}}
{{--                        @else--}}

{{--                            <img class="img-fluid img-thumbnail"  src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="Image" style="width: 100px; height: 100px;">--}}

{{--                         @endif--}}

                            @foreach($post->photos as $pics)
                                @if($pics->img_url)
                                    <img style="width: 100px; height: 100px;" class="img-thumbnail img-fluid" src="{{url($pics->img_url)}}">

                                @else
                                {{--Todo : else doesnt work--}}
                                    <img class="img-fluid img-thumbnail"  src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="Image" style="width: 100px; height: 100px;">

                                @endif
                            @endforeach

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
