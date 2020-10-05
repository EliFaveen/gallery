
@extends('artist.layouts.artistpages')

@section('content')

    <form class="" method="post" action="{{route('artist.post.store')}}" enctype='multipart/form-data'>
        @csrf
{{--        todo:upload photo--style img--validation error require--crop--}}
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" name="photos[]" id="photos" type="file" multiple>
                <br>
            </div>
        </div>

{{--        todo:post title--}}
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" name="title" id="title" type="text" placeholder="اسم نقاشیت رو چی میزاری؟">
                <br>
            </div>
        </div>

{{--        todo:post description--}}
        <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" name="description" id="description" placeholder="یک کپشن راجبش بنویس"></textarea>
                <br>
            </div>
        </div>



{{--        کافی برای دفعه اول--}}
{{--        --}}{{--todo: categories--foreach--}}
{{--        <div class="form-group">--}}
{{--            <select class="form-control" name="categories" id="categories">--}}
{{--                <option value="">دسته بندی</option>--}}
{{--                <option value="id">1</option>--}}
{{--                <option value="id">2</option>--}}
{{--                <option value="id">3</option>--}}
{{--                <option value="id">4</option>--}}
{{--            </select>--}}
{{--        </div>--}}

<div class="row">
    <div class="col-md-12">
        <ul>
{{--            todo: move DB codes to model--}}
            @foreach(\App\Category::get() as $category)
                <li>

                    <input class="image-ckeckbox" type="checkbox" id="Checkbox{{$category->id}}" name="categories[]" value="{{$category->id}}" />
                    <label for="Checkbox{{$category->id}}">{{$category->title}}</label>
                </li>
            @endforeach
{{--            <li>--}}

{{--                <input type="checkbox" id="myCheckbox2" />--}}
{{--                <label for="myCheckbox2"><img src="http://tech21info.com/admin/wp-content/uploads/2013/03/chrome-logo-200x200.png" /></label>--}}
{{--            </li>--}}
{{--            <li>--}}

{{--                <input type="checkbox" id="myCheckbox3" />--}}
{{--                <label for="myCheckbox3"><img src="http://www.thebusinessofsports.com/wp-content/uploads/2010/10/facebook-icon-200x200.png" /></label>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>


        {{--        --}}{{--todo:hashtag--good hashtags--}}
{{--        <input class="form-control" name="hashtags" id="hashtags" type="text" placeholder="#یک_هشتگ_بنویس">--}}
        {{--user_id auth--}}
        {{--color--}}


        <button class="mt-2 btn btn-success">پست جدید</button>
    </form>
@endsection
