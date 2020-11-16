<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <a class="navbar-brand" href="">
                <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                <h1 class="tm-site-title mb-0">Dashboard</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">صفحه اصلی
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            مدیریت صفحات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('admin.users.index')}}">صفحه کاربران</a>
                            <a class="dropdown-item" href="{{route('admin.post.index')}}">صفحه پست ها</a>
                            <a class="dropdown-item" href="{{route('admin.category.index')}}">صفحه دسته بندی ها</a>
                        </div>
                    </li>

                    <li class="nav-item disabled">
                        <a class="nav-link" href="">فعالیت ها</a>
                    </li>
                    <li class="nav-item disabled">
                    {{-- todo:restore from soft deletes --}}
                        <a class="nav-link" href="">بازگردانی داده ها</a>
                    </li>
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                           aria-expanded="false">--}}
{{--                            Settings--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="#">Profile</a>--}}
{{--                            <a class="dropdown-item" href="#">Billing</a>--}}
{{--                            <a class="dropdown-item" href="#">Customize</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="{{route('login')}}">
                            <i class="far fa-user mr-2 tm-logout-icon"></i>
                            <span>خروج از حساب</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
