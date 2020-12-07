@extends('admin.layouts.index_layout')
{{--/admin/post/index--}}

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
{{--    dropdown doesnt work--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
@endsection

@section('title') صفحه پست های سایت @endsection

@section('content')

    {{--           posts           --}}

    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">

            {{--            form begins         --}}
            <form action="">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <h2 class="tm-block-title d-inline-block">جدول پست ها</h2>

                    </div>
                    {{--       search bar         --}}
                    <div class="col-md-9 col-sm-12 search-align">
                        <div class="search-parent">
                            {{--                            <input class="search-input" type="text" name="search" placeholder=" جستجو کنید" value="{{request('search')}}">--}}
                            <input class="search-input" type="text" name="search-username" placeholder="نام کاربری را جستجو کنید" value="{{request('search-username')}}">
                            <input class="search-input" type="text" name="search-email" placeholder="ایمیل را جستجو کنید" value="{{request('search-email')}}">
                            <input class="search-input" type="text" name="search-comment" placeholder="متن نظر را جستجو کنید" value="{{request('search-comment')}}">
                            <select class="email-state" id="email-state" name="search-approved">
                                <option value="">وضعیت متن</option>
                                <option value="1" {{request('search-approved') == 1 ? 'selected':""}}>تایید شده</option>
                                <option value="2" {{request('search-approved') == 2 ? 'selected':""}}>تایید نشده</option>
                            </select>
                            <button type="submit" class="search-btn"><i class="fas fa-search tm-search-icon"></i></button>
                        </div>
                    </div>

                </div>
            </form>
            {{--            form ends           --}}
            <div class="table-responsive">
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">
                        <td class="table-col-counter"> </td>
                        <th scope="col">نام کاربری</th>
                        <th scope="col">عنوان پست</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">دسته بندی ها</th>
                        <th scope="col">هشتگ ها</th>
                        <th scope="col">محبوبیت</th>
                        <th scope="col">تعداد نظرات</th>
                        <th scope="col">وضعیت پست</th>
                        <th scope="col">اقدامات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($posts as $post)
                        <tr>
                            {{----------------------------------row counter--}}
                            <td class="table-col-counter">{{$i++}}.</td>
                            {{----------------------------------username--}}
                            <td >{{ $post->user->username }}</td>
{{--                            <td>...</td>--}}
                            {{----------------------------------title--}}
                            <td >{{Str::limit($post->title, $limit = 15, $end = '...') }}</td>
                            {{----------------------------------description--}}
                            <td >{{Str::limit($post->description, $limit = 20, $end = '...') }}</td>
                            {{----------------------------------categories--}}
                            <td >
                                @if($post->categories)
                                <div class="dropdown">
                                    <span>مشاهده دسته بندی ها</span>
                                    <div class="dropdown-content">
                                        @foreach($post->categories as $category)
                                            <p>{{$category->title}}</p>
                                        @endforeach
                                            <p>ویرایش دسته بندی</p>
                                    </div>
                                </div>
                                @else
                                    بدون دسته بندی
                                @endif
                            </td>
                            {{----------------------------------hashtags--}}
                            <td>
                                <div class="dropdown">
                                    <span>Mouse over me</span>
                                    <div class="dropdown-content">
                                        <p>Hello World!</p>
                                    </div>
                                </div>
                            </td>
                        {{----------------------------------like/dislike--}}
                            <td>...</td>
                        {{----------------------------------comments--}}
                            <td>...</td>
                        {{----------------------------------able/disable--}}
                            <td>...</td>
                        {{----------------------------------tools--}}
                            <td>...</td>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="tm-table-mt tm-table-actions-row">
                <div class="row">
                    <div class="col-md-12">
{{--                                                todo: appends--}}
                        {{$posts->appends([
                            'search-username' =>request('search-username'),
                            'search-email' =>request('search-email'),
                            'search-comment' =>request('search-comment'),
                            'search-approved' =>request('search-approved'),

                            ])->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
