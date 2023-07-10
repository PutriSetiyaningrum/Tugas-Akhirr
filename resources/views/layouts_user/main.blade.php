<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>PERBASIIMY | LandingPage</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/../../assets/user/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="/../../assets/user/css/responsive.css">

    <!-- Swiper slide -->
    <link rel="stylesheet" type="text/css" href="/../../assets/user/css/swiper-bundle.min.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/../../assets/icon/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/../../assets/user/icon/Favicon.png">
    <!-- [if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="header-fixed counter-scroll">
        @include('layouts_user.navbar')

        <div>
            @yield('container')
        </div>

        {{-- @include('layouts_user.footer') --}}

        <script src="{{ url('') }}/assets/user/js/jquery.min.js"></script>
        <script src="{{ url('') }}/assets/user/js/countto.js"></script>
        <script src="{{ url('') }}/assets/user/js/wow.min.js"></script>
        <script src="{{ url('') }}/assets/user/js/main.js"></script>
        <script src="{{ url('') }}/assets/user/js/shortcodes.js"></script>
        <script src="{{ url('') }}/assets/user/js/jquery.easing.js"></script>
        <script src="{{ url('') }}/assets/user/js/jquery.fancybox.js"></script>
        <script src="{{ url('') }}/assets/user/js/plugin.js"></script>

        <!-- Swiper slide -->
        <script src="{{ url('') }}/assets/user/js/swiper-bundle.min.js"></script>
        <script src="{{ url('') }}/assets/user/js/swiper.js"></script>

        @yield("javascript")

    </body>
    </html>
