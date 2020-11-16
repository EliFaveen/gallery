@extends('admin.layouts.index_layout')
{{--/admin/users/index--}}
{{--index and create--}}
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه دسته بندی های سایت @endsection

@section('content')

    {{--           categories index           --}}

    <div class=" col-xl-6 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">

            {{--            form begins         --}}
            <form action="">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h2 class="tm-block-title d-inline-block">جدول دسته بندی ها</h2>

                    </div>
                    {{--       search bar         --}}
                    {{--                    <div class="col-md-9 col-sm-12 search-align">--}}
                    {{--                        <div class="search-parent">--}}
                    {{--                            --}}{{--                            <input class="search-input" type="text" name="search" placeholder=" جستجو کنید" value="{{request('search')}}">--}}
                    {{--                            <input class="search-input" type="text" name="search-username" placeholder="نام کاربری را جستجو کنید" value="{{request('search-username')}}">--}}
                    {{--                            <input class="search-input" type="text" name="search-email" placeholder="ایمیل را جستجو کنید" value="{{request('search-email')}}">--}}
                    {{--                            <input class="search-input" type="text" name="search-phone" placeholder="شماره تلفن را جستجو کنید" value="{{request('search-phone')}}">--}}
                    {{--                            <select class="email-state" id="email-state" name="email_verified_at">--}}
                    {{--                                <option value="">وضعیت ایمیل</option>--}}
                    {{--                                <option value="1" {{request('email_verified_at') == 1 ? 'selected':""}}>فعال</option>--}}
                    {{--                                <option value="2" {{request('email_verified_at') == 2 ? 'selected':""}}>غیر فعال</option>--}}
                    {{--                            </select>--}}
                    {{--                            <select class="select-role" id="select-role" name="role">--}}
                    {{--                                <option value="">نقش</option>--}}
                    {{--                                <option value="admin" {{request('role') == "admin" ? 'selected':""}}>admin</option>--}}
                    {{--                                <option value="artist" {{request('role') == "artist" ? 'selected':""}}>artist</option>--}}
                    {{--                                <option value="user" {{request('role') == "user" ? 'selected':""}}>user</option>--}}
                    {{--                            </select>--}}
                    {{--                            <button type="submit" class="search-btn"><i class="fas fa-search tm-search-icon"></i></button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>
            </form>
            {{--            form ends           --}}
            <div class="table-responsive">
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">
                        <td class="table-col-counter"> </td>
                        <th scope="col">عکس</th>
                        <th scope="col">عنوان دسته</th>
                        {{--                        <th scope="col">توضیحات</th>--}}
                        <th scope="col">آخرین به روز رسانی</th>
                        <th scope="col">اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $category)
                        <tr >
                            {{--                            <div class="flex-style-parent">--}}
                            <td class="table-col-counter td-style">{{$i++}}.</td>
                            <td >
                                {{--                image--}}
                                @if($category->category_pic)

                                    {{--                <div class="col-md-3 pl-0 pr-0 mr-0 ml-0">--}}
                                    <div class="post-img-parent">

                                        <img  class="post-img  pl-0 pr-0 mr-0 ml-0" src="{{url($category->category_pic)}}" alt="{{$category->title}}">
                                    </div>
                                    {{--                </div>--}}
                                @else
                                    <div class="post-img-parent">
                                        <img  class=" post-img pl-0 pr-0 mr-0 ml-0" src="{{url('assets/artist/img/default_for_posts/image-01.jpg')}}" alt="default image">
                                    </div>
                                @endif
                            </td>
                            <td >{{$category->title}}</td>
                            {{--                                <td >{{Str::limit($category->description, $limit = 30, $end = '...') }}</td>--}}
                            <td >{{$category->updated_at->format('d/m/Y')}}</td>
                            <td>
                                <div class="d-flex">
                                    <form method="post" action="{{route('admin.category.destroy' , ['category'=>$category->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('مطمئنی؟ پاکش کنم؟')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                    </form>
                                    <a href="{{route('admin.category.edit', ['category'=>$category->id])}}"><i class="fas fa-pen-alt tm-pen-icon"></i></a>

                                </div>
                            </td>

                            {{--                            </div>--}}
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


            <div class="tm-table-mt tm-table-actions-row">
                {{--       TODO: add soft delete(disable) instead         --}}
                {{--                <div class="tm-table-actions-col-left">--}}
                {{--                    <a href="{{route('admin.category.create')}}" class="btn btn-outline-primary">ایجاد دسته بندی جدید</a>--}}
                {{--                </div>--}}
                <div class="row">
                    <div class="col-md-12">
                        {{--                        todo: appends--}}
                        {{$categories->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--           category create            --}}


    <div class="  col-xl-6 col-lg-10 col-md-12 col-sm-12 tm-col">
        <div class="bg-white tm-block" style="    height: 848px;">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="tm-block-title d-inline-block">ایجاد دسته بندی جدید</h2>
                </div>
            </div>
            <div class="row mt-4 tm-edit-product-row">
                <div class="col-xl-10 col-lg-7 col-md-12">
                    {{--           form             --}}
                    <form class="tm-edit-product-form" method="post" action="{{route('admin.category.store')}}" enctype='multipart/form-data' >
                        @csrf
                        <div class="inline-col-main d-flex" style="margin-top: 30px;">
                            <div class="inline-col1 c0l-md-6">
                                {{--           title             --}}
                                <div class="input-group mb-3">
                                    {{--                                        <label for="title" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">--}}
                                    {{--                                            عنوان دسته--}}
                                    {{--                                        </label>--}}
                                    <input id="title" name="title" type="text" class="form-control validate" placeholder="یک استایل جدید وارد کن" required>
                                </div>
                                {{--           description             --}}
                                <div class="input-group mb-3">
                                    {{--                                        <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">توضیحات</label>--}}
                                    <textarea class="form-control" name="description" id="description" placeholder="درباره ی این استایل توضیح بده" style="min-height: 172px;" required></textarea>
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
                                        <input  name="category_pic" id="fileInput" type="file" style="display:none;" multiple>
                                        <input type="button" class="btn btn-primary d-block mx-auto" value="انتخاب عکس" onclick="document.getElementById('fileInput').click();"
                                        />
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--           submit             --}}
                        <div class="input-group mb-3">
                            <div class="ml-auto col-xl-9 col-lg-8 col-md-8 col-sm-7 pl-0">
                                <button type="submit" class="btn btn-primary" style="margin-top: 55px;">ایجاد دسته بندی جدید
                                </button>
                            </div>
                        </div>
                    </form>
                    {{--           form             --}}
                </div>

            </div>
        </div>
    </div>

@endsection
