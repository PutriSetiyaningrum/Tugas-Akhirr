<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">COMPONENT</li>
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Event
                </p>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'Berita' ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/Berita/event') }}" class="nav-link {{ Request::segment(2) == 'event' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Tentang Event</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/Berita/kategorievent') }}" class="nav-link {{ Request::segment(2) == 'kategorievent' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>BaganEvent</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/Berita/jeniscabangevent') }}" class="nav-link {{ Request::segment(2) == 'jeniscabangevent' ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Hasil Pertandingan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>
