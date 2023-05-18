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
        <li class="nav-item {{ Request::segment(2) == 'pelatih' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Manajement Pelatih
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/akun/pelatih') }}" class="nav-link {{ Request::segment(2) == 'pelatih' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>Pelatih</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'master' ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Master
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/master/event') }}" class="nav-link {{ Request::segment(2) == 'event' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Event</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/master/kategorievent') }}" class="nav-link {{ Request::segment(2) == 'kategorievent' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>kategori Event</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/master/jeniscabangevent') }}" class="nav-link {{ Request::segment(2) == 'jeniscabangevent' ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Jenis Cabang Event</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{ Request::segment(1) == 'informasi' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Informasi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/informasi/tentangevent') }}" class="nav-link {{ Request::segment(2) == 'tentangevent' ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Tentang Event</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/informasi/baganevent') }}" class="nav-link {{ Request::segment(2) == 'baganevent' ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Bagan Event</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/informasi/hasilpertandingan') }}" class="nav-link {{ Request::segment(2) == 'hasilpertandingan' ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Hasil Pertandingan</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Persyaratan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>
