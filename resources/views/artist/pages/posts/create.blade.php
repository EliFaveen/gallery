
@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/create_style.css')}}">
    {{--croppie head links--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--croppie head links--}}
    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.carousel.min.css')}}"><!--owl.carousel.min.css-->
    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.theme.default.min.css')}}"><!--owl.theme.default.min.css-->
@endsection

@section('title') صفحه اضافه کردن پست @endsection

@section('content')

    <form class="" method="post" action="{{route('artist.post.store')}}" enctype='multipart/form-data' >
        @csrf
{{--        todo:upload photo--style img--validation error require--crop--}}
        {{---------------------------------------------------------------------------------------------image row--}}
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" name="photos[]" id="photos" type="file" multiple>
                <br>
            </div>
        </div>
{{--        <div class="container">--}}
{{--            <div class="panel panel-info">--}}
{{--                <div class="panel-heading">Laravel PHP - Cropping and uploading an image with Croppie plugin using jQuery Ajax</div>--}}
{{--                <div class="panel-body">--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-4 text-center">--}}
{{--                            <div id="upload-demo"></div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4" style="padding:5%;">--}}
{{--                            <strong>Select image to crop:</strong>--}}
{{--                            <input type="file" id="image">--}}

{{--                            <button  class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        todo:post title--}}
        {{---------------------------------------------------------------------------------------------title row--}}
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" name="title" id="title" type="text" placeholder="اسم نقاشیت رو چی میزاری؟">
                <br>
            </div>
        </div>

{{--        todo:post description--}}
        {{---------------------------------------------------------------------------------------------description row--}}
        <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" name="description" id="description" placeholder="یک کپشن راجبش بنویس"></textarea>
                <br>
            </div>
        </div>

        {{---------------------------------------------------------------------------------------------category row--}}
{{--category basic--}}
        <div class="row">
            <div class="col-md-12">
                <ul>
{{--                    todo: move DB codes to model--}}
                    @foreach(\App\Category::get() as $category)
                        <li>

                            <input class="image-checkbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" />
                            <label for="Checkbox{{$category->id}}">
                                    <div class="post-img-parent">
                                        <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                                    </div>
                            </label>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
{{--        category with title --}}
        <div class="row">
            <div class="col-md-12">
                <ul>
                    {{--            todo: move DB codes to model--}}
                    @foreach(\App\Category::get() as $category)
                        <li>

                            <input class="image-ckeckbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" />
                            <label for="Checkbox{{$category->id}}">{{$category->title}}</label>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
{{--category pro--}}

        <section class="section4 p-0">
            <div class="container-fluid">
                <div class="row row4-1">
                    <div class="col">
                        <div class="text-painting-style">
                            <p>سبک های نقاشی</p>
                        </div>
                    </div>
                </div><!--end row4-1-->

                <div class="row row4-2 flex-container">
                    <div class="owl-carousel owl-theme">

                        @foreach(\App\Category::get() as $category)

                        <div class="item">
                            <ul>
                                <li>
                                    <input class="image-checkbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" />
                                    <label for="Checkbox{{$category->id}}">
                                            <div class="post-img-parent">
                                                <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                                            </div>
                                            <div class="overlay">
                                                <div class="text-header">{{$category->title}}</div>
                                            </div>
                                    </label>
                                </li>
                            </ul>

                        </div>

                        @endforeach

{{--                        <div class="item">--}}
{{--                            <div class="img-father">--}}
{{--                                <img src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="Avatar" class="image pl-0 pr-0 mr-0 ml-0">--}}
{{--                            </div>--}}
{{--                            <div class="overlay">--}}
{{--                                <div class="text-header">از نزدیک ببینید</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                    <!--------------------------------------------------------------------------------------------------سبک ها نقاشی-->

                    <!--------------------------------------------------------------------------------------------------------سبک های نقاشی-->
                </div><!--end row4-2-->
            </div><!--end container4-->
        </section><!--end section4-->



        {{---------------------------------------------------------------------------------------------hashtags row--}}
        {{--                todo:hashtag--good hashtags--}}



        <div class="wrapper">
            <h3>هشتگ های تو</h3>
            <p class="info">مثل نمونه زیر یک هشتگ بنویس و اینتر بزن</p>
            <input class="" name="" type="text" id="hashtags" autocomplete="off"  placeholder="#یک_هشتگ_بنویس" >
            <div class="tag-container">
            </div>
        </div>


{{--        todo:user_id auth--}}
{{--        todo:color--}}


        <button type="submit" class="mt-2 btn btn-success">پست جدید</button>
    </form>

{{-------------------------------------------------script--------------------------------------------------}}

{{--    <script type="text/javascript">--}}

{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}


{{--        var resize = $('#upload-demo').croppie({--}}
{{--            enableExif: true,--}}
{{--            enableOrientation: true,--}}
{{--            viewport: { // Default { width: 100, height: 100, type: 'square' }--}}
{{--                width: 200,--}}
{{--                height: 200,--}}
{{--                type: 'square' //square--}}
{{--            },--}}
{{--            boundary: {--}}
{{--                width: 300,--}}
{{--                height: 300--}}
{{--            }--}}
{{--        });--}}


{{--        $('#image').on('change', function () {--}}
{{--            var reader = new FileReader();--}}
{{--            reader.onload = function (e) {--}}
{{--                resize.croppie('bind',{--}}
{{--                    url: e.target.result--}}
{{--                }).then(function(){--}}
{{--                    console.log('jQuery bind complete');--}}
{{--                });--}}
{{--            }--}}
{{--            reader.readAsDataURL(this.files[0]);--}}
{{--        });--}}


{{--        $('.upload-image').on('click', function (ev) {--}}
{{--            resize.croppie('result', {--}}
{{--                type: 'canvas',--}}
{{--                size: 'viewport'--}}
{{--            }).then(function (img) {--}}
{{--                $.ajax({--}}
{{--                    url: "{{route('artist.post.create')}}",--}}
{{--                    type: "POST",--}}
{{--                    data: {"image":img},--}}
{{--                    success: function (data) {--}}
{{--                        html = '<img src="' + img + '" />';--}}
{{--                        $("#preview-crop-image").html(html);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}


{{--    </script>--}}
@endsection

@section('custom-js')

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}

    <script src="{{url('assets/artist/js/owl_carousel/jquery.min.js')}}"></script><!--jquery.min-->
    <script src="{{url('assets/artist/js/owl_carousel/owl.carousel.min.js')}}"></script><!--owl.carousel.min-->

    <script src="{{url('assets/artist/js/create_script.js')}}"></script><!--custom-->
@endsection
