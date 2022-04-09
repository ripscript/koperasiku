<div class="brand-logo">
    <a href="index.html">
        <img src="{{ asset('themes/deskapp2/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
        <img src="{{ asset('themes/deskapp2/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
    </div>
</div>
<div class="menu-block customscroll">
    <div class="sidebar-menu">
        <ul id="accordion-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-user"></span><span class="mtext">Admin</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.daftar-admin') }}">Daftar Admin</a></li>
                    <li><a href="{{ route('admin.tambah-admin') }}">Tambah Admin</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-user"></span><span class="mtext">Anggota</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('anggota.daftar-anggota') }}">Daftar Anggota</a></li>
                    <li><a href="{{ route('anggota.tambah-anggota') }}">Tambah Anggota</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>