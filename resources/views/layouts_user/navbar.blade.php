<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">
        <div id="site-header-wrap">
            <!-- Header Wrap -->
            <div id="top-bar" class="home3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="inner">
                                <div class="top-bar-left">
                                    <span class="content-left"> Jl. Tridaya Timur, Karanganyar, Sport Center Indramayu </span>
                                </div>
                                <div class="top-bar-right ">
                                    <div class="icon-top icon-header style">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <header id="site-header" class="header-style3">
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-3 col-sm-9">
                            <div id="site-logo" class="clearfix logo-home2">
                                <div id="site-log-inner">
                                    <a href="index.html" rel="home" class="main-logo">
                                        <img src="/../../assets/user/images/logo/logo-perbasi.png" alt="bixos" width="55" height="20" data-retina="/../../assets/user/images/logo/logo-header@2x.png" data-width="96" data-height="26">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /.mobile-button -->
                        <!-- /#site-logo -->
                        <div class=" col-lg-9 col-sm-3">
                            <div class="mobile-button home2 home3">
                                <span></span>
                            </div>
                            <div id="site-header-inner" class="style-2">
                                <div class="wrap-inner clearfix">
                                    <nav id="main-nav" class="main-nav ">
                                        <ul id="menu-primary-menu" class="menu">
                                            <li class="menu-item {{ Request::is("/") ? 'current-menu-item' : '' }}">
                                                <a href="/">Beranda</a>
                                            </li>
                                            <li class="menu-item {{ Request::is("tentang-perbasi") ? 'current-menu-item' : '' }}">
                                                <a href="{{ url('/tentang-perbasi') }}">Tentang PERBASI IMY</a>
                                            </li>
                                            <li class="menu-item {{ Request::is("syarat&panduan") ? 'current-menu-item' : '' }}">
                                                <a href="{{ url('/syarat&panduan')}}">Syarat & Panduan</a>
                                            </li>
                                            <li class="menu-item {{Request::segment(1) == "informasi" ? 'current-menu-item' : ''}}">
                                                <a>Informasi</a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item {{ Request::segment(2) == 'tentang-event' ? 'current-item' : '' }}"><a href="{{ url('/informasi/tentang-event') }}">Tentang Event</a></li>
                                                    <li class="menu-item {{ Request::segment(2) == 'jadwal-pertandingan' ? 'current-item' : '' }}"><a href="{{ url('/informasi/jadwal-pertandingan') }}">Jadwal Pertandingan</a></li>
                                                    <li class="menu-item {{ Request::segment(2) == 'hasil-pertandingan' ? 'current-item' : '' }}"><a href="{{ url('/informasi/hasil-pertandingan') }}">Hasil Pertandingan</a></li>
                                                </ul>
                                            </li>
                                            @if (empty(Auth::user()))
                                            <li class="menu-item">
                                                <a href="{{ url('login')}}">Masuk</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ url('register')}}">Daftar</a>
                                            </li>
                                            @else
                                            <li class="menu-item">
                                                <a href="{{ url('/logout') }}">
                                                    Logout
                                                </a>
                                            </li>
                                            @if (Auth::user()->level == "pengunjung")
                                            <li class="menu-item">
                                                <a href="{{ url('/profil') }}">
                                                    Profil
                                                </a>
                                            </li>
                                            @else

                                            @endif
                                            @if (Auth::user()->level != "pengunjung")
                                            <li class="menu-item">
                                                @if (Auth::user()->level == "pengurus")

                                                <a href="{{ url('/home') }}">

                                                @elseif(Auth::user()->level == "panitia")

                                                <a href="{{ url('/panitia/home') }}">

                                                @elseif(Auth::user()->level == "pelatih")

                                                <a href="{{ url('/pelatih/home') }}">

                                                @endif
                                                    Dashboard
                                                </a>
                                            </li>
                                            @else

                                            @endif
                                            @endif
                                        </ul>
                                    </nav>
                                    <!-- /#main-nav -->
                                </div>
                                <!-- /.wrap-inner -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#site-header-inner -->
            </header>
            <!-- /#site-header -->
        </div>
        <!-- #site-header-wrap -->

