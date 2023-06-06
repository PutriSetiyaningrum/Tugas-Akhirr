<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/pelatih/home') }}" class="nav-link {{ Request::segment(1) == "pelatih" ? 'active' : '' }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">COMPONENT</li>
        <li class="nav-item">
            <a href="{{ url('/event')}}" class="nav-link {{ Request::segment(1) == "event" ? 'active' : '' }} ">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Event
                </p>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'berita' ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/berita/tentangevent') }}" class="nav-link {{ Request::segment(2) == 'tentangevent' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Tentang Event</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/berita/baganevent') }}" class="nav-link {{ Request::segment(2) == 'baganevent' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>BaganEvent</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/berita/hasilpertandingan') }}" class="nav-link {{ Request::segment(2) == 'hasilpertandingan' ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Hasil Pertandingan</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
