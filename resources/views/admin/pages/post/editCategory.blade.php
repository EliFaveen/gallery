@extends('admin.layouts.index_layout')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه ویرایش دسته بندی سایت @endsection


@section('content')

    <div class="col-10 mx-auto">
        <div class="bg-white tm-block">
            <form action="{{route('admin.post.updateCategory',['post'=>$post->id])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="row">
                            @foreach(\App\Category::get() as $category)
                                <div class="col-md-2">
                                    <input class="image-checkbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" @foreach($post->categories as $post_category) @if($post_category->id == $category->id) checked @endif @endforeach>
                                    <label for="Checkbox{{$category->id}}">
                                        <div class="post-img-parent">
                                            <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                                        </div>
                                        <div>
                                            {{$category->title}}
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="input-group mt-3">
                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">ویرایش</button>
                </div>
            </form>
            <div class="input-group mt-3">
                <a href="{{route('admin.post.index')}}" type="button" class="btn btn-primary d-inline-block mx-auto">بازگشت</a>
            </div>
        </div>
    </div>

@endsection
