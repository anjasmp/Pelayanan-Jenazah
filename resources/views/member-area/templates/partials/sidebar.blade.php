<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <span class="hide-menu">Pelayanan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('pelayanan.home')}}"
                        aria-expanded="false">
                        <i data-feather="phone" class="feather-icon"></i>
                        <span class="hide-menu">Pengaduan Musibah</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('pelayanan.index')}}"
                    aria-expanded="false">
                    <i data-feather="eye" class="feather-icon"></i>
                    <span class="hide-menu">Riwayat Pengaduan</span>
                     </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Paket keanggotaan</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route ('anggota.index')}}"
                    aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i>
                        <span class="hide-menu">Daftar Anggota</span>
                    </a>
                </li>

                

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Akun Saya</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('profilmember.index')}}"
                    aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">Profil</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="/admin"
                    aria-expanded="false">
                    <i data-feather="settings" class="feather-icon"></i>
                    <span class="hide-menu">Data Pribadi</span>
                     </a>
                </li>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>