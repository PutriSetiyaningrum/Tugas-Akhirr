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
            <a href="{{ url('profile')}}" class="nav-link {{ Request::segment(1) == "profile" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/event')}}" class="nav-link {{ Request::segment(1) == "event" ? 'active' : '' }} ">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Event
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/atlet')}}" class="nav-link {{ Request::segment(1) == "atlet" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-restroom"></i>
                <p>
                    Atlet
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/team')}}" class="nav-link {{ Request::segment(1) == "team" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                    Team
                </p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ url('/riwayat-atlet')}}" class="nav-link {{ Request::segment(1) == "riwayat-atlet" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    Riwayat Atlet
                </p>
            </a>
        </li> --}}
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
