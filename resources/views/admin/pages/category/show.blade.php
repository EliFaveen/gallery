@extends('admin.layouts.index_layout')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه نمایش دسته بندی سایت @endsection


@section('content')

    <div class="col-12 mx-auto tm-login-col">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12 text-center">
                    {{--                image               --}}
                    @if($category->category_pic)
                        <div class="post-img-parent-large">
                            <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                        </div>
                    @else
                        <div class="post-img-parent-large">
                                <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
{{--                    <form action="index.html" method="post" class="tm-login-form">--}}
                        <div class="individual-title">
                            <h1>
                                {{$category->title}}
                            </h1>
                        </div>
                        <div class="individual-body">
                            {{$category->description}}
                        </div>
                        <div class="input-group mt-3">
                            <a href="{{route('admin.category.index')}}" type="button" class="btn btn-primary d-inline-block mx-auto">بازگشت</a>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
