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
{{--                                @if($post->categories)--}}
{{--                                <div class="dropdown">--}}
{{--                                    <span>مشاهده دسته بندی ها</span>--}}
{{--                                    <div class="dropdown-content">--}}
{{--                                        @foreach($post->categories as $category)--}}
{{--                                            <p>{{$category->title}}</p>--}}
{{--                                        @endforeach--}}
{{--                                            <p>ویرایش دسته بندی</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @else--}}
{{--                                    بدون دسته بندی--}}
{{--                                @endif--}}

                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
                                مشاهده
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$post->id}}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal{{$post->id}}Label">دسته بندی های این پست:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if($post->categories)
                                                <ul class="list-group">
                                                    @foreach($post->categories as $category)
                                                        <li class="list-group-item">{{$category->title}}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                بدون دسته بندی
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                            <button type="button" class="btn btn-primary">ویرایش</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </td>
                            {{----------------------------------hashtags--}}
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target="#exampleModal-{{$post->id}}">
                                    مشاهده
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal-{{$post->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal-{{$post->id}}Label">دسته بندی های این پست:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($post->hashtags)
                                                    <ul class="list-group">
                                                        @foreach($post->hashtags as $hashtag)
                                                            <li class="list-group-item">{{$hashtag->hashtag}}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                   بدون هشتگ
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                <button type="button" class="btn btn-primary">ویرایش</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        {{----------------------------------like/dislike--}}
                            <td>

                            </td>
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

@section('custom-js')
    <script>
        function swalFunction() {
            {{--Swal.fire({--}}
            {{--    title: 'دسته بندی های این پست:',--}}
            {{--    text:--}}
            {{--        '@if($post->categories)'+--}}
            {{--            '@foreach($post->categories as $category)'+--}}
            {{--                '<p>'{{$category->title}}'</p>'+--}}
            {{--            '@endforeach'+--}}
            {{--        '@else'+--}}
            {{--            'بدون دسته بندی'+--}}
            {{--        '@endif',--}}
            {{--    icon: 'info',--}}
            {{--    confirmButtonText: 'باشه'--}}
            {{--})--}}


            // var x = document.getElementById("myDIV");
            // if (x.style.display === "block") {
            //     x.style.display = "none";
            // } else {
            //     x.style.display = "block";
            // }
        }
    </script>
    <script>

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

    </script>
@endsection
