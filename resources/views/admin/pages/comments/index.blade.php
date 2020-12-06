@extends('admin.layouts.index_layout')
{{--/admin/users/index--}}
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه مدیریت نظرات سایت @endsection

@section('content')

    {{--           posts           --}}

    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">

            {{--            form begins         --}}
            <form action="">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <h2 class="tm-block-title d-inline-block">جدول نظرات</h2>

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
                        <th scope="col">ایمیل کاربر</th>
                        <th scope="col">متن نظر</th>
                        <th scope="col">وضعیت متن</th>
                        <th scope="col">اقدامات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($comments as $comment)
                        <tr>
                            <td class="table-col-counter">{{$i++}}.</td>
                            <td >{{ $comment->user->username }}</td>
                            <td >{{$comment->user->email}}</td>
                            <td >{{$comment->comment}}</td>
                            @if($comment->approved)
                                <td>
                                    <form method="post" action="{{route('admin.comments.update',['comment'=>$comment->id])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button name="approved" type="submit" class="btn btn-success btn-sm btn-small" value="true">
{{--                                            <div class="tooltip">--}}
                                            تایید شده
{{--                                            <span class="tooltiptext">Tooltip text</span>--}}
{{--                                            </div>--}}
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form method="post" action="{{route('admin.comments.update',['comment'=>$comment->id])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button name="approved" type="submit" class="btn btn-danger btn-sm btn-small" value="false">
{{--                                            <div class="tooltip">--}}
                                            تایید نشده
{{--                                            <span class="tooltiptext">Tooltip text</span>--}}
{{--                                            </div>--}}
                                        </button>
                                    </form>
                                </td>
                            @endif
{{--                            <td >{{$comment->role}}</td>--}}
                            <td>
                                <div class="d-flex">
                                    <form method="post" action="{{route('admin.comments.destroy' , ['comment'=>$comment->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('با کلیک بر روی تایید،نظر از سایت حذف میشود!')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                    </form>
{{--                                    <a href="{{route('admin.users.edit', ['user'=>$user->id])}}"><i class="fas fa-pen-alt tm-pen-icon"></i></a>--}}
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


            <div class="tm-table-mt tm-table-actions-row">
                {{--       TODO: add soft delete(disable) instead         --}}
{{--                <div class="tm-table-actions-col-left">--}}
{{--                    <a href="{{route('admin.users.create')}}" class="btn btn-outline-primary">ایجاد کاربر جدید</a>--}}
{{--                </div>--}}
                <div class="row">
                    <div class="col-md-12">
{{--                        todo: appends--}}
                        {{$comments->appends([
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
