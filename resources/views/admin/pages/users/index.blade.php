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
                <div class="col-md-9 col-sm-12 search-align">
                    <form action="">
                        <div class="search-parent">
                            <input class="search-input" type="text" name="search" placeholder="جستجو کنید" value="{{request('search')}}">
                            <button type="submit" class="search-btn"><i class="fas fa-search tm-search-icon"></i></button>
                        </div>
                    </form>
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
                        <th scope="col">
                            <form action="">
                                <select class="email-state" id="email-state" name="email_verified_at" onchange="this.form.submit()">
                                    <option value="">وضعیت ایمیل</option>
                                    <option value="1">فعال</option>
                                    <option value="2">غیر فعال</option>
                                </select>
                            </form>
                        </th>
                        <th scope="col">
                            <form action="">
{{--                                    <select class="select-role" id="select-role" name="role" onchange="myfunction()">--}}
                                    <select class="select-role" id="select-role" name="role" onchange="this.form.submit()">
                                        <option value="">نقش</option>
                                        <option value="admin">admin</option>
                                        <option value="artist">artist</option>
                                        <option value="user">user</option>
                                    </select>
                            </form>
                        </th>
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

            // $(document).ready(function(){
            //     $('#select-role').change(function(){
            //         window.location.href = window.location.href + '&role=' + $(this).val();
            //         this.form.submit()
            //     });
            // });
            // function myfunction(){
            //     // document.getElementById("select-role").change(function(){
            //         var newURLString = window.location.href +
            //             "&role=" + 'user';
            //
            //         window.location.href = newURLString;    // The page will redirect instantly
            //                                                 // after this assignment
            //         this.form.submit()
            //
            //     // });
            // }

{{--        </script>--}}

@endsection
