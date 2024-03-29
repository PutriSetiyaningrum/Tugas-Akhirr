<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link {{ Request::segment(1) == "home" ? 'active' : '' }}">
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
        <li class="nav-item {{ Request::segment(1) == 'akun' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Akun
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/akun/panitia') }}" class="nav-link {{ Request::segment(2) == 'panitia' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>Panitia</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/akun/pelatih') }}" class="nav-link {{ Request::segment(2) == 'pelatih' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>Pelatih</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/akun/pengunjung') }}" class="nav-link {{ Request::segment(2) == 'pengunjung' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>Pengunjung</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'master' ? 'menu-open' : '' }} ">
            <a href="" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    Master
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/master/tentangperbasi') }}" class="nav-link {{ Request::segment(2) == 'tentangperbasi' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Tentang Perbasi</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ url('/komentar_event')}}" class="nav-link {{ Request::segment(1) == "komentar_event" ? 'active' : '' }} ">
                <i class="nav-icon far fa-comment"></i>
                <p>
                    Komentar Event
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('histori')}}" class="nav-link {{ Request::segment(1) == "histori" ? 'active' : '' }}">
                <i class="nav-icon fa fa-history"></i>
                <p>
                    Histori
                </p>
            </a>
        </li>
    </ul>
</nav>
