@extends('admin.layouts.index_layout')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/admin/css/admin_indexes_style.css')}}">
    <style>
        /*-----------------------------------for hashtags-----------------------------------*/
        @import url('https://fonts.googleapis.com/css?family=Work+Sans:300,400');

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            /*height: 100vh;*/
            /*overflow: hidden;*/
            font-family: 'Work Sans', sans-serif;
            /*background-color: #1a284f;*/
            /*color: white;*/
        }

        .wrapper {
            padding: 20px 28px;
            /*margin: 0;*/
            margin: 48px 263px 42px 0px !important;
            width: 580px;
            background-color:#869791;
            color: #fef4e1;
            border-radius: 30px;
            display: flex;
            align-items: center;
            flex-flow: row wrap;
            border: solid 2px white;
        }

        h3 {
            margin: 10px 14px 10px 0;
            font-weight: 300;
            font-size: 36px;
        }

        p {
            margin: 10px 10px;
            font-weight: 300;
            font-size: 14px;
            opacity: 0.8;
            letter-spacing: 1px;
        }

        input {
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            margin: 8px;
            width: 100%;
            color: #666;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            outline: none;
        }

        .tag-container {
            display: flex;
            flex-flow: row wrap;
        }

        .tag{
            pointer-events: none;
            background-color: #505d58;
            color: white;
            padding: 6px;
            margin: 5px;
        }

        .tag::before {
            pointer-events: all;
            display: inline-block;
            content: 'x';
            height: 20px;
            width: 20px;
            margin-right: 6px;
            text-align: center;
            color: #ccc;
            background-color: #505d58;
            cursor: pointer;
        }

    </style>
@endsection

@section('title') صفحه ویرایش هشتگ پست @endsection


@section('content')

    <div class="col-10 mx-auto">
        <div class="bg-white tm-block">
            <form action="{{route('admin.post.updateHashtag',['post'=>$post->id])}}" method="post">
                @csrf
                @method('PATCH')
                {{---------------------------------------------------------------------------------------------hashtags row--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <h3>هشتگ های تو</h3>
                            <p class="info">مثل نمونه زیر یک هشتگ بنویس و اینتر بزن</p>
                            <input class="" name="" type="text" id="hashtags" autocomplete="off"  placeholder="#یک_هشتگ_بنویس" >
                            <div class="tag-container">
                                @php($i=0)
                                @if($post->hashtags)
                                    @foreach($post->hashtags as $hashtag)
                                        <input class="hashtag_input" type="hidden" name="hashtags[]" id="tags_{{$i}}" value="{{$hashtag->hashtag}}">
                                        <p class="tag" id="tags{{$i++}}">{{$hashtag->hashtag}}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group mt-3">
                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">ویرایش</button>
                </div>
            </form>
            <div class="input-group mt-3">
                <a href="{{route('admin.post.index')}}" type="button" class="btn btn-primary d-inline-block mx-auto">بازگشت</a>
            </div>
        </div>
    </div>

@endsection
@section('custom-js')
    <script>
        // create.blade.php-----------------------------------------------------------------for hashtags this intrupt my like system
        let input, hashtagArray, container, t={{$i}};

        input = document.querySelector('#hashtags');
        container = document.querySelector('.tag-container');
        hashtagArray = [];

        input.addEventListener('keyup', () => {
            if (event.which == 13 && input.value.length > 0) {
                var text = document.createTextNode(input.value);
                var myinput = document.createElement('input');
                //var mydiv = document.createElement('div');
                var p = document.createElement('p');

                //container.appendChild(mydiv);
                // mydiv.appendChild(myinput);
                container.appendChild(myinput);
                myinput.appendChild(text);
                myinput.classList.add('hashtag_input');

                container.appendChild(p);
                p.appendChild(text);
                p.classList.add('tag');

                p.setAttribute("id", 'tags' + t);

                myinput.setAttribute("type", "hidden");
                myinput.setAttribute('name', 'hashtags[]');
                myinput.setAttribute('id', 'tags_' + t);

                $('#tags_' + t).val(input.value);
                t++;

                input.value = '';


                //for p tags
                let deleteTags = document.querySelectorAll('.tag');
                let deleteInput = document.querySelectorAll('.hashtag_input');


                for(let i = 0; i < deleteTags.length; i++) {
                    deleteTags[i].addEventListener('click', () => {
                        container.removeChild(deleteTags[i]);
                        container.removeChild(deleteInput[i]);


                    });

                }
            }
        });
        //create.blade.php-------------------------------------------------------------------except enter for texterea
        $(document).on("keydown", ":input:not(textarea)", function(event) {
            return event.key != "Enter";
        });
    </script>
@endsection
