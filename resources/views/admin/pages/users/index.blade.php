@extends('admin.layouts.index_layout')
{{--/admin/users/index--}}
@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
@endsection

@section('title') صفحه کاربران سایت @endsection

@section('content')

    {{--           posts           --}}

    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <h2 class="tm-block-title d-inline-block">جدول کاربران</h2>

                </div>
                {{--       TODO: add search instead         --}}
                <div class="col-md-4 col-sm-12 text-right">
                    <a href="add-product.html" class="btn btn-small btn-primary">جستجو کاربر</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">
                        <td class="table-col-counter"> </td>
                        <th scope="col">نام کاربری</th>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">وضعیت ایمیل</th>
                        <th scope="col">نقش</th>
                        <th scope="col">اقدامات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $user)
                        <tr>
                            <td class="table-col-counter">{{$i++}}.</td>
                            <td >{{ $user->username }}</td>
                            <td >{{$user->phone}}</td>
                            <td >{{$user->email}}</td>
                            @if($user->email_verified_at)
                                <td><span class="badge badge-success">فعال</span></td>
                            @else
                                <td><span class="badge badge-danger">غیر فعال</span></td>
                            @endif
                            <td >{{$user->role}}</td>
                            <td class="d-flex">
                                <form method="post" action="{{route('admin.users.destroy' , ['user'=>$user->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('مطمئنی؟ پاکش کنم؟')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                </form>
                                <a href="{{route('admin.users.edit', ['user'=>$user->id])}}"><i class="fas fa-pen-alt tm-pen-icon"></i></a>

                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="tm-table-mt tm-table-actions-row">
                {{--       TODO: add soft delete(disable) instead         --}}
                <div class="tm-table-actions-col-left">
                    <a href="{{route('admin.users.create')}}" class="btn btn-outline-primary">ایجاد کاربر جدید</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{$users->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
