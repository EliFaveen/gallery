@extends('artist.layouts.artist')

@section('content')


    {{--    sidenav col nadarad azad hast   --}}
{{--    TODO: add to layout with if this is artist who looking at this page show sidenav--}}
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
    <div class="tm-footer" id="tmFooter" data-desktop-seq-no="5" data-mobile-seq-no="9">
        <img src="img/qr-link-tooplate.png" alt="QR Code" class="tm-img-qr">
        <div>
            <p class="tm-mb-small">Copyright &copy; 2018 Company Name</p>
            <p>Designed by <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>
        </div>
    </div>
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

@endsection
