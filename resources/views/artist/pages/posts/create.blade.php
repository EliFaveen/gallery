
@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/create_style.css')}}">
{{--    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.carousel.min.css')}}"><!--owl.carousel.min.css-->--}}
{{--    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.theme.default.min.css')}}"><!--owl.theme.default.min.css-->--}}
@endsection

@section('title') صفحه اضافه کردن پست @endsection

@section('content')

    @include('inc.sidenav')

<div class="form-parent">
    <form class="" method="post" action="{{route('artist.post.store')}}" enctype='multipart/form-data' >
        @csrf
        {{--        todo:upload photo--style img--validation error require--crop--}}
        {{---------------------------------------------------------------------------------------------image row--}}
        {{--        <div class="row">--}}
        {{--            <div class="col-md-12">--}}
        {{--                <input class="form-control" name="photos[]" id="photos" type="file" multiple>--}}
        {{--                <br>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        todo:post title--}}
        {{---------------------------------------------------------------------------------------------title row--}}
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <input class="form-control input-style @error('title') is-invalid @enderror" name="title" id="title" type="text" placeholder="اسم نقاشیت رو چی میزاری؟" >
                @error('title')
                <span class="invalid-feedback" role="alert" style="text-align: right">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
            </div>
        </div>

        {{--        todo:post description--}}
        {{---------------------------------------------------------------------------------------------description row--}}
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <textarea class="tinymce form-control input-style description-style  @error('description') is-invalid @enderror" name="description" id="description" placeholder="یک کپشن راجبش بنویس" ></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert" style="text-align: right">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
            </div>
        </div>

        {{---------------------------------------------------------------------------------------------category row--}}
        {{-------------------------------------------------------category basic--}}
        <section class="section4 p-0">
            <div class="row">
                <div class="container-fluid">
                    <div class="row row4-1">
                        <div class="col">
                            <div class="text-painting-style">
                                <p>سبک های نقاشی</p>
                            </div>
                        </div>
                    </div><!--end row4-1-->
                    <div class="col-md-12 scroll-category">
                        <ul>

                            @foreach(\App\Category::get() as $category)
                                <li>

                                    <input class="image-checkbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" />
                                    <label for="Checkbox{{$category->id}}">
                                        <div class="post-img-parent">
                                            <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                                        </div>
                                        <div style="color: black">{{$category->title}}</div>
                                    </label>


                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{--------------------------------------------------------------------------category pro--}}

{{--        <section class="section4 p-0">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row row4-1">--}}
{{--                    <div class="col">--}}
{{--                        <div class="text-painting-style">--}}
{{--                            <p>سبک های نقاشی</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end row4-1-->--}}

{{--                <div class="row row4-2 flex-container">--}}
{{--                    <div class="owl-carousel owl-theme">--}}

{{--                        @foreach(\App\Category::get() as $category)--}}

{{--                            <div class="item">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <input class="image-checkbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" />--}}
{{--                                        <label for="Checkbox{{$category->id}}">--}}
{{--                                            <div class="post-img-parent">--}}
{{--                                                <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">--}}
{{--                                            </div>--}}
{{--                                            <div class="overlay">--}}
{{--                                                <div class="text-header">{{$category->title}}</div>--}}
{{--                                            </div>--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

{{--                            </div>--}}

{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                    <!--------------------------------------------------------------------------------------------------سبک ها نقاشی-->--}}

{{--                    <!--------------------------------------------------------------------------------------------------------سبک های نقاشی-->--}}
{{--                </div><!--end row4-2-->--}}
{{--            </div><!--end container4-->--}}
{{--        </section>--}}
        <!--end section4-->



        {{---------------------------------------------------------------------------------------------hashtags row--}}
        {{--                todo:hashtag--good hashtags--}}



        <div class="row">
            <div class="col-md-12">
                <div class="wrapper">
                    <h3>هشتگ های تو</h3>
                    <p class="info">مثل نمونه زیر یک هشتگ بنویس و اینتر بزن</p>
                    <input class="" name="" type="text" id="hashtags" autocomplete="off"  placeholder="#یک_هشتگ_بنویس" >
                    <div class="tag-container">
                    </div>
                </div>
            </div>
        </div>


        {{--        todo:user_id auth--}}
        {{--        todo:color--}}


        <div class="row justify-content-md-center">
            <div class="col-md-3">
                <button type="submit" class="mt-2 btn btn-outline-success btn-block">پست جدید</button>
            </div>
        </div>
    </form>
</div>


@endsection

@section('custom-js')

{{--    <script src="{{url('assets/artist/js/owl_carousel/jquery.min.js')}}"></script><!--jquery.min-->--}}
{{--    <script src="{{url('assets/artist/js/owl_carousel/owl.carousel.min.js')}}"></script><!--owl.carousel.min-->--}}

    <script src="{{url('assets/artist/js/create_script.js')}}"></script><!--custom-->


@endsection
