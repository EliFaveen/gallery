@extends('admin.layouts.index_layout')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
    {{--    <link rel="stylesheet" href="{{url('assets/artist/css/show_style.css')}}"><!--custom--><!--for carousel-->--}}
@endsection

@section('title') صفحه نمایش پست سایت @endsection


@section('content')
    <div class="col-8 mx-auto">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="tm-block-title d-inline-block">ویرایش اطلاعات پست:</h2>
                </div>
            </div>


                <div class="d-flex">
                    @if($post->photos->first())
                        @foreach($post->photos as $photo)
                            <div class="post-img-parent-delete">
                                {{-------------------------------------------remove pics form--}}
                                <form method="post" action="{{route('admin.post.deletePhoto',['photo'=>$photo->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <img  class="post-img-delete  pl-0 pr-0 mr-0 ml-0" src="{{url($photo->img_url)}}" alt="{{$post->title}}">
                                    <div class="btn-delete-photo-parent">
                                        <button type="submit" class="btn btn-danger btn-sm btn-small"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <div class="post-img-parent-delete">
                            <img  class=" post-img-delete pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                        </div>
                    @endif
                </div>
{{--------------------------------------------edit post infos form--}}
            <form action="{{route('admin.post.update',['post'=>$post->id])}}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('PATCH')
                <div class="inline-col-main d-flex mx-auto" style="margin-top: 30px;">
                    <div class="inline-col1 col-md-6">
                        {{--           title             --}}
                        <div class="input-group mb-3">
                            <input id="title" name="title" type="text" class="form-control validate" placeholder="یک عنوان جدید وارد کن" value="{{$post->title}}" required>
                        </div>
                        {{--           description             --}}
                        <div class="input-group mb-3">
                            {{--                                        <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">توضیحات</label>--}}
                            <textarea class="form-control" name="description" id="description" placeholder="توضیحات پست را وارد کنید" style="min-height: 172px;" required>{{$post->description}}</textarea>
                            <br>
                        </div>
                    </div>

                    <div class="inline-col2 col-md-6">
                        {{--           category_pic   out of form!!!             --}}
                        <div class="col-xl-9 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto" style=" max-width: initial;">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                {{--                                    <input id="fileInput" type="file" style="display:none;" />--}}
                                <input  name="post_pics[]" id="fileInput" type="file" style="display:none;" multiple>
                                <input type="button" class="btn btn-primary d-block mx-auto" value="انتخاب عکس" onclick="document.getElementById('fileInput').click();"
                                />
                            </div>
                        </div>

                    </div>
                </div>
                {{--           submit             --}}
                <div class="input-group mb-3">
                    <div class="mx-auto ">
                        <button type="submit" class="btn btn-primary" style="margin-top: 55px;">ویرایش
                        </button>
                    </div>
                </div>
            </form>
            <div class="input-group mt-3">
                <a href="{{route('admin.post.index')}}" type="button" class="btn btn-primary d-inline-block mx-auto">بازگشت</a>
            </div>
        </div>
    </div>
@endsection

