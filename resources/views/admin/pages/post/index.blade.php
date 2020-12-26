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
                            <input class="search-input media-search" type="text" name="search-username" placeholder="نام کاربری را جستجو کنید" value="{{request('search-username')}}">
                            <input class="search-input media-search" type="text" name="search-info" placeholder="عنوان یا توضیحات را جستجو کنید" value="{{request('search-email')}}">
{{--                            <input class="search-input" type="text" name="search-comment" placeholder="متن نظر را جستجو کنید" value="{{request('search-comment')}}">--}}
                            <select class="email-state media-search" id="email-state" name="search-approved">
                                <option value="">وضعیت پست</option>
                                <option value="1" {{request('search-approved') == 1 ? 'selected':""}}>فعال</option>
                                <option value="2" {{request('search-approved') == 2 ? 'selected':""}}>غیر فعال</option>
                            </select>
                            <button type="submit" class="search-btn media-search"><i class="fas fa-search tm-search-icon"></i></button>
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
                            <td >{{strip_tags(Str::limit($post->description, $limit = 20, $end = '...')) }}</td>
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
                                            <a type="button" class="btn btn-primary" href="{{route('admin.post.editCategory',['post'=>$post->id])}}">ویرایش</a>
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
                                                <h5 class="modal-title" id="exampleModal-{{$post->id}}Label">هشتگ های این پست:</h5>
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
                                                <a type="button" class="btn btn-primary" href="{{route('admin.post.editHashtag',['post'=>$post->id])}}">ویرایش</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        {{----------------------------------like/dislike--}}
                            <td>
                                <span class="badge badge-success badge-pill ml-2"><i class="far fa-thumbs-up ml-1"></i>{{$post->likes->where('like',1)->count()}}</span>
                                <span class="badge badge-danger badge-pill"><i class="far fa-thumbs-down ml-1"></i>{{$post->likes->where('like',0)->count()}}</span>
                            </td>
                        {{----------------------------------comments--}}
                            <td>
                                <span class="badge badge-info badge-pill"><i class="far fa-comment-dots ml-1"></i>{{$post->comments->count()}}</span>
                            </td>
                        {{----------------------------------able/disable--}}
                            <td>
                                @if(!$post->deleted_at)
                                    <p>فعال</p>
                                @else

                                    <p>حذف شده</p>
                                @endif
                            </td>
                        {{----------------------------------tools--}}
                            <td>
                                @if(!$post->deleted_at)
                                    <div class="d-flex">
                                        <a id="edit-link" href="{{route('admin.post.show',['post'=>$post->id])}}"><i class="far fa-eye tm-eye-icon"></i></a>

                                        <form method="post" action="{{route('admin.post.destroy',['post'=>$post->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn" onclick="return confirm('با زدن تایید پست حذف خواهد شد!')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                        </form>
                                        <a id="edit-link" href="{{route('admin.post.edit',['post'=>$post->id])}}"><i class="fas fa-pen-alt tm-pen-icon"></i></a>
                                    </div>
                                @else
{{--                                    <i class="fas fa-trash-restore tm-restore-icon"></i>--}}
                                    <a id="edit-link" href="{{route('admin.post.restore',['post'=>$post->id])}}"><i class="fas fa-recycle tm-restore-icon"></i></a>
                                @endif
                            </td>
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
                            'search-info' =>request('search-email'),
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
