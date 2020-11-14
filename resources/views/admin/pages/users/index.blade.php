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

            {{--            form begins         --}}
            <form action="">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <h2 class="tm-block-title d-inline-block">جدول کاربران</h2>

                    </div>
                    {{--       search bar         --}}
                    <div class="col-md-9 col-sm-12 search-align">
                        <div class="search-parent">
                            {{--                            <input class="search-input" type="text" name="search" placeholder=" جستجو کنید" value="{{request('search')}}">--}}
                            <input class="search-input" type="text" name="search-username" placeholder="نام کاربری را جستجو کنید" value="{{request('search-username')}}">
                            <input class="search-input" type="text" name="search-email" placeholder="ایمیل را جستجو کنید" value="{{request('search-email')}}">
                            <input class="search-input" type="text" name="search-phone" placeholder="شماره تلفن را جستجو کنید" value="{{request('search-phone')}}">
                            <select class="email-state" id="email-state" name="email_verified_at">
                                <option value="">وضعیت ایمیل</option>
                                <option value="1" {{request('email_verified_at') == 1 ? 'selected':""}}>فعال</option>
                                <option value="2" {{request('email_verified_at') == 2 ? 'selected':""}}>غیر فعال</option>
                            </select>
                            <select class="select-role" id="select-role" name="role">
                                <option value="">نقش</option>
                                <option value="admin" {{request('role') == "admin" ? 'selected':""}}>admin</option>
                                <option value="artist" {{request('role') == "artist" ? 'selected':""}}>artist</option>
                                <option value="user" {{request('role') == "user" ? 'selected':""}}>user</option>
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
                            <td>
                                <div class="d-flex">
                                    <form method="post" action="{{route('admin.users.destroy' , ['user'=>$user->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('مطمئنی؟ پاکش کنم؟')"><i class="fas fa-trash-alt tm-trash-icon"></i></button>
                                    </form>
                                    <a href="{{route('admin.users.edit', ['user'=>$user->id])}}"><i class="fas fa-pen-alt tm-pen-icon"></i></a>
                                </div>
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
{{--                        todo: appends--}}
                        {{$users->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>


{{--    script   --}}
{{--    <script type="text/javascript">--}}
{{--        // if(){--}}
{{--            document.getElementById('email-state').value = "<?php echo $_GET['email_verified_at'];?>";--}}
{{--        // }--}}
{{--    </script>--}}
{{--    <script type="text/javascript">--}}
{{--        // if(){--}}
{{--        document.getElementById('select-role').value = "<?php echo $_GET['role'];?>";--}}
{{--        // }--}}
{{--    </script>--}}

{{--        <script type="text/javascript">--}}

{{--            // $(document).ready(function(){--}}
{{--            //     $('#select-role').change(function(){--}}
{{--            //         window.location.href = window.location.href + '&role=' + $(this).val();--}}
{{--            //         this.form.submit()--}}
{{--            //     });--}}
{{--            // });--}}
{{--            // function myfunction(){--}}
{{--            //     // document.getElementById("select-role").change(function(){--}}
{{--            //         var newURLString = window.location.href +--}}
{{--            //             "&role=" + 'user';--}}
{{--            //--}}
{{--            //         window.location.href = newURLString;    // The page will redirect instantly--}}
{{--            //                                                 // after this assignment--}}
{{--            //         this.form.submit()--}}
{{--            //--}}
{{--            //     // });--}}
{{--            // }--}}

{{--        </script>--}}

@endsection
