<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/pengunjung/home') }}" class="nav-link {{ Request::segment(1) == "pengunjung" ? 'active' : '' }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon far fa-file-alt"></i>
                <p>
                    Tentang Event
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon far fa-file-alt"></i>
                <p>
                    Bagan Event
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/dashboard.html" class="nav-link">
                <i class="nav-icon far fa-clone"></i>
                <p>
                    Hasil Pertandingan
                </p>
            </a>
        </li>
    </ul>
</nav>
