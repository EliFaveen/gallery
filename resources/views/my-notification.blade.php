<!DOCTYPE html>
<html>
<head>
    <title>Laravel Sweet Alert Notification</title>
{{--    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">--}}
    <link rel="stylesheet" href="{{url('assets/all_pages/css/bootstrap.min.css')}}"><!--this is important dont comment it-->
{{--    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>--}}
    <script src="{{url('assets/all_pages/js/jquery.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</head>
<body>


<h1 class="text-center">Laravel Sweet Alert Notification</h1>
@include('sweet::alert')


</body>
</html>
