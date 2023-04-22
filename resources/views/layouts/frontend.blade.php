<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="The World Cove">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">


</head>
<body>


    
        @include('frontend.header-navbar')

        <main class="py-4">
            @yield('content')
        </main>


    <!--====== BINDUZ FOOTER PART START ======-->
    @include('frontend.footer')

    <!--====== BINDUZ FOOTER PART ENDS ======-->

    <!--====== BINDUZ BACK TO TOP PART START ======-->

    <div class="binduz-er-back-to-top">
        <p>BACK TO TOP <i class="fal fa-long-arrow-right"></i></p>
    </div>

    <!--====== BINDUZ BACK TO TOP PART ENDS ======-->

    <!--====== jquery js ======-->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>


    <script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>

    <!--====== nice select js ======-->
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>

    <!--====== Isotope js ======-->
    <script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    @yield('script')

</body>
</html>
