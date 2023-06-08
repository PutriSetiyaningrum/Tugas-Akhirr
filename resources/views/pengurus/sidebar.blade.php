<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link {{ Request::segment(1) == "pengurus" ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">COMPONENT</li>
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
                        <p>Tentang PERBASI</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon far fa-regular fa-comments"></i>
                <p>
                    Forum
                </p>
            </a>
        </li>
    </ul>
</nav>
