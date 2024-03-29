<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/panitia/home') }}" class="nav-link {{ Request::segment(1) == "panitia" ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">COMPONENT</li>
        <li class="nav-item">
            <a href="{{ url('profile')}}" class="nav-link {{ Request::segment(1) == "profile" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>
        <li class="nav-item {{ Request::segment(2) == 'pelatih' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Akun
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
                    <a href="{{ url('/informasi/jadwalpertandingan') }}" class="nav-link {{ Request::segment(2) == 'jadwalpertandingan' ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Jadwal Pertandingan</p>
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
            <a href="{{ url('persyaratan') }}" class="nav-link {{ Request::segment(1) == "persyaratan" ? 'active' : '' }} ">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Persyaratan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/Team') }}" class="nav-link {{ Request::segment(1) == "Team" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-restroom"></i>
                <p>
                    Team
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/komentar_event')}}" class="nav-link {{ Request::segment(1) == "komentar_event" ? 'active' : '' }} ">
                <i class="nav-icon far fa-comment"></i>
                <p>
                    Komentar Event
                </p>
            </a>
        </li>
    </ul>
</nav>
