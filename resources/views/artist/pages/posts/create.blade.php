
@extends('artist.layouts.artist')

@section('content')
    <form class="" method="post" action="{{route('artist.post.store')}}" enctype='multipart/form-data'>
        @csrf
        {{--todo:upload photo--tyle img--validation error require--crop--}}
        <input class="form-control" name="photos[]" id="photos" type="file" multiple>
        {{--todo:post title--}}
        <input class="form-control" name="title" id="title" type="text" placeholder="اسم نقاشیت رو چی میزاری؟">
        {{--todo:post description--}}
        <textarea class="form-control" name="description" id="description" placeholder="یک کپشن راجبش بنویس"></textarea>


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


{{--        --}}{{--todo:hashtag--good hashtags--}}
{{--        <input class="form-control" name="hashtags" id="hashtags" type="text" placeholder="#یک_هشتگ_بنویس">--}}
        {{--user_id auth--}}
        {{--color--}}


        <button class="mt-2 btn btn-success">پست جدید</button>
    </form>
@endsection
