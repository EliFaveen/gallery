@if(auth()->check())
    @if(auth()->user()->role === 'artist')
{{--        <a href="{{route('admin.post.index')}}" class="btn btn-success ">Admin</a>--}}
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-danger logout">خروج از حساب</button>
        </form>
    @endif
@else

    <a href="{{route('login')}}" class="btn btn-info">ورود</a>

@endif
