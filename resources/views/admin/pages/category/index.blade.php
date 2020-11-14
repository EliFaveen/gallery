@extends('admin.layouts.index_layout')
{{--/admin/users/index--}}
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه دسته بندی های سایت @endsection

@section('content')

    {{--           posts           --}}

    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">

            {{--            form begins         --}}
            <form action="">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
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
                        <th scope="col">توضیحات</th>
                        <th scope="col">آخرین به روز رسانی</th>
                        <th scope="col">اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $category)
                        <tr>
                            <td class="table-col-counter">{{$i++}}.</td>
                            <td >#photo</td>
                            <td >{{$category->title}}</td>
                            <td >{{Str::limit($category->description, $limit = 30, $end = '...') }}</td>
                            <td >{{$category->updated_at}}</td>
                            <td class="d-flex">
                                <form method="post" action="{{route('admin.category.destroy' , ['category'=>$category->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('مطمئنی؟ پاکش کنم؟')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                </form>
                                <a href="{{route('admin.category.edit', ['category'=>$category->id])}}"><i class="fas fa-pen-alt tm-pen-icon"></i></a>

                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


            <div class="tm-table-mt tm-table-actions-row">
                {{--       TODO: add soft delete(disable) instead         --}}
                <div class="tm-table-actions-col-left">
                    <a href="{{route('admin.category.create')}}" class="btn btn-outline-primary">ایجاد دسته بندی جدید</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{--                        todo: appends--}}
                        {{$categories->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
