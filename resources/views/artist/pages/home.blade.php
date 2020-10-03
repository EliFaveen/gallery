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

{{--    sidenav col nadarad azad hast   --}}
    <div class="sidenav">
        <a href="{{route('artist.post.create')}}" class="all-sidenav plus"><i class="fas fa-plus"></i></a>
        <a href="#" class="all-sidenav heart"><i class="fas fa-heart"></i></a>
        <a href="#" class="all-sidenav home"><i class="fas fa-home"></i></a>
        <a href="#" class="all-sidenav search"><i class="fas fa-search"></i></a>
        <a href="#" class="all-sidenav crown"><i class="fas fa-crown"></i></a>

    </div>

    <!-- items of char -->
    <div class="item tm-bg-white tm-block tm-block-left" data-desktop-seq-no="1" data-mobile-seq-no="1">
        <p class="tm-hero-text">&ldquo;Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
            himenaeos. Maecenas vel lacinia ipsum, nec fermentum diam. Nulla nec gravida odio, eget vestibulum urna.&rdquo;</p>
        <header class="tm-block-brand">
            <div class="tm-bg-primary-dark tm-text-white tm-block-brand-inner">
                <i class="fas fa-braille fa-3x"></i>
                <h1 class="tm-brand-name">Character</h1>
            </div>
        </header>
    </div>
    <div class="item" data-desktop-seq-no="2" data-mobile-seq-no="4">
        <img src="{{url('assets/artist/img/posts/image-01.jpg')}}" alt="Image" class="tm-img-left">
    </div>
    <div class="item tm-bg-secondary tm-text-white tm-block tm-block-wider tm-block-pad tm-block-left-2" data-desktop-seq-no="3"
         data-mobile-seq-no="5">
        <i class="fas fa-award fa-4x tm-block-icon"></i>
        <p>Maecenas scelerisque ex neque, vel ultrices purus pharetra sit amet. Donec consectetur ipsum in elit eleifend
            porta. Morbi bibendum porttitor dui. Proin molestie purus non nisi blandit rutrum.</p>
        <div class="tm-text-right">
            <a href="#" class="tm-btn tm-btn-small tm-btn-primary tm-mt">Read More</a>
        </div>
    </div>
    <div class="item" data-desktop-seq-no="4" data-mobile-seq-no="8">
        <img src="{{url('assets/artist/img/posts/image-04.jpg')}}" alt="Image" class="tm-img-left">
    </div>
{{--    todo: replace this div with footer--}}
{{--    <div class="tm-footer" id="tmFooter" data-desktop-seq-no="5" data-mobile-seq-no="9">--}}
{{--        <img src="img/qr-link-tooplate.png" alt="QR Code" class="tm-img-qr">--}}
{{--        <div>--}}
{{--            <p class="tm-mb-small">Copyright &copy; 2018 Company Name</p>--}}
{{--            <p>Designed by <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="item" data-desktop-seq-no="6" data-mobile-seq-no="2">
        <img src="{{url('assets/artist/img/posts/image-02.jpg')}}" alt="Image">
    </div>
    <div class="item tm-block-right" data-desktop-seq-no="7" data-mobile-seq-no="3">
        <div class="tm-block-right-inner tm-bg-primary-light tm-text-white tm-block tm-block-wider tm-block-pad">
            <header>
                <h2 class="tm-text-uppercase">
                    Proin Molestie Purus Non
                </h2>
            </header>
            <p>You can freely use this Character HTML Template for your site. Please <a href="https://www.facebook.com/tooplate">follow us</a> on Facebook page for updates. Don't forget to tell your friends about Tooplate. Thank you. :)</p>
            <p class="tm-mt tm-mb-small">Aenean gravida augue luctus, egestas massa ac, hendrerit ipsum. Vestibulum et
                ex sollicitudin, commodo liqula suscipit, laoreet lacus.
            </p>
            <!-- -->
        </div>
    </div>

    <div class="item" data-desktop-seq-no="8" data-mobile-seq-no="6">
        <img src="{{url('assets/artist/img/posts/image-03.jpg')}}" alt="Image">
    </div>

    <div class="item tm-bg-white tm-block tm-form-section" data-desktop-seq-no="9" data-mobile-seq-no="7">
        <div class="tm-form-container tm-block-pad tm-pb-0">
            <header>
                <h2 class="tm-text-uppercase tm-text-gray-light tm-mb">
                    Contact Us
                </h2>
            </header>
            <form action="index.html" class="tm-contact-form" method="POST">
                <div class="tm-form-group">
                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name" required/>
                </div>
                <div class="tm-form-group">
                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email" required/>
                </div>
                <div class="tm-form-group">
                    <textarea rows="5" id="contact_message" name="contact_message" class="form-control" placeholder="Message" required></textarea>
                </div>
                <div class="tm-text-right">
                    <button type="submit" class="tm-btn tm-btn-secondary tm-btn-pad-big">Send</button>
                </div>
            </form>
        </div>

        <div class="tm-form-section-tag">
            <div class="tm-bg-secondary tm-text-white tm-block-pad tm-form-section-tag-inner">
                <header>
                    <h2>Proin imperdiet commodo nisi</h2>
                </header>
                <p>Mauris sodales vulputate ante a dapibus Donec vitae maximus dolor, pharetra imperdiet lectus. Praesent
                    pharetra elit ac est congue volutpat.</p>
            </div>
        </div>
    </div>

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
