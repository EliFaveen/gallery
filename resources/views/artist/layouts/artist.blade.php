{{--todo:upload photo--tyle img--validation error require--crop--}}
{{--todo:post title--}}
{{--todo:post description--}}
{{--todo: categories--foreach--}}
{{--todo:hashtag--good hashtags--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سایت گالری هنری</title>
    <link rel="stylesheet" href="{{url('assets/artist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/artist/css/fontawesom.css')}}">
    <link rel="stylesheet" href="{{url('assets/artist/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.carousel.min.css')}}"><!--owl.carousel.min.css-->
    <link rel="stylesheet" href="{{url('assets/artist/css/owl_carousel/owl.theme.default.min.css')}}"><!--owl.theme.default.min.css-->
    <link rel="stylesheet" href="{{url('assets/artist/css/for_char_temp/all.min.css')}}"><!--for_char_temp-->
    <link rel="stylesheet" href="{{url('assets/artist/css/for_char_temp/tooplate-style.css')}}"><!--for_char_temp-->
</head>

<body class="tm-bg-dark">
<main class="tm-container masonry">

{{--    TODO: add errors to messages layout--}}

{{--    @if(session('success'))--}}
{{--        <div class="row mb-2">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    {{session('success')}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')

    @yield('content')


</main>

<!-- ------------------------------------------my scripts---------------------------------------------- -->
<script src="{{url('assets/artist/js/jquery.js')}}"></script>
<script src="{{url('assets/artist/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/artist/js/owl_carousel/jquery.min.js')}}"></script><!--jquery.min-->
<script src="{{url('assets/artist/js/owl_carousel/owl.carousel.min.js')}}"></script><!--owl.carousel.min-->
<script src="{{url('assets/artist/js/fontawesom.js')}}"></script>
<script src="{{url('assets/artist/js/script.js')}}"></script>
<!-- -------------------------------------------temp script---------------------------------------------------- -->
<script src="{{url('assets/artist/js/for_char_temp/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script>

    let callAdjustLayout;
    let currentLayout = "desktop",
        nextLayout = "desktop";

    /**
     * detect IE
     * returns version of IE or false, if browser is not Internet Explorer
     */
    function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf('rv:');
            return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
            // Edge (IE 12+) => return version number
            return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        // other browser
        return false;
    }

    // Adjust layout based on the browser width
    function adjustLayout() {
        let block1, block2, block3, block4, block5, block6, block7, block8, block9;

        if (window.innerWidth <= 1199) {
            // Mobile layout
            nextLayout = "mobile";
            block1 = $("div[data-mobile-seq-no='1']");
            block2 = $("div[data-mobile-seq-no='2']");
            block3 = $("div[data-mobile-seq-no='3']");
            block4 = $("div[data-mobile-seq-no='4']");
            block5 = $("div[data-mobile-seq-no='5']");
            block6 = $("div[data-mobile-seq-no='6']");
            block7 = $("div[data-mobile-seq-no='7']");
            block8 = $("div[data-mobile-seq-no='8']");
            block9 = $("div[data-mobile-seq-no='9']");
        } else {
            // Desktop layout
            nextLayout = "desktop";
            block1 = $("div[data-desktop-seq-no='1']");
            block2 = $("div[data-desktop-seq-no='2']");
            block3 = $("div[data-desktop-seq-no='3']");
            block4 = $("div[data-desktop-seq-no='4']");
            block5 = $("div[data-desktop-seq-no='5']");
            block6 = $("div[data-desktop-seq-no='6']");
            block7 = $("div[data-desktop-seq-no='7']");
            block8 = $("div[data-desktop-seq-no='8']");
            block9 = $("div[data-desktop-seq-no='9']");
        }

        if (nextLayout !== currentLayout) {
            // Reorder blocks based on their seq no
            block1.after(block2.detach());
            block2.after(block3.detach());
            block3.after(block4.detach());
            block4.after(block5.detach());
            block5.after(block6.detach());
            block6.after(block7.detach());
            block7.after(block8.detach());
            block8.after(block9.detach());
            currentLayout = nextLayout;
        }
    }

    // Adjust layout upon window resize
    window.onresize = function () {
        clearTimeout(callAdjustLayout);
        callAdjustLayout = setTimeout(adjustLayout, 100);
    }

    // DOM is ready
    $(function () {
        if (detectIE()) {
            alert('Please use the latest version of Chrome or Firefox for best browsing experience.');
        }

        adjustLayout();
    })
</script>
</body>
</html>
