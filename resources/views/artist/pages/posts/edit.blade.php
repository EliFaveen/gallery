
@extends('artist.layouts.artist')

@section('custom-css')
    <link rel="stylesheet" href="{{url('assets/artist/css/edit_style.css')}}">
    <link rel="stylesheet" href="{{url('assets/artist/css/create_style.css')}}">
    {{--croppie head links--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--croppie head links--}}
    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.carousel.min.css')}}"><!--owl.carousel.min.css-->
    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.theme.default.min.css')}}"><!--owl.theme.default.min.css-->
@endsection

@section('title') صفحه ویرایش کردن پست @endsection

@section('content')



@endsection

@section('custom-js')
    <script src="{{url('assets/artist/js/edit_script.js')}}"></script><!--custom-->
    <script src="{{url('assets/artist/js/owl_carousel/jquery.min.js')}}"></script><!--jquery.min-->
    <script src="{{url('assets/artist/js/owl_carousel/owl.carousel.min.js')}}"></script><!--owl.carousel.min-->

    <script src="{{url('assets/artist/js/create_script.js')}}"></script><!--custom-->

@endsection
