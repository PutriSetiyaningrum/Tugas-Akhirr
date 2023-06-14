<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ url('') }}/assets/user/images/logo/logo-perbasi.png" alt="Perbasi Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PERBASI INDRAMAYU</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/AdminLTE') }}/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        @if (Auth::user()->level == "pengurus")
        @include("pengurus.sidebar")
        @elseif(Auth::user()->level == "panitia")
        @include("panitia.sidebar")
        @elseif(Auth::user()->level == "pelatih")
        @include("pelatih.sidebar")
        @elseif(Auth::user()->level == "pengunjung")
        @include("pengunjung.sidebar")
        @endif
    </div>
</aside>
