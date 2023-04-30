<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Session::get('user')->photo_profile }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Session::get('user')->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link @if ($menu == 'Dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-posyandu" class="nav-link @if ($menu == 'Data Posyandu') active @endif">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Data Posyandu
                        </p>
                    </a>
                </li>
                @if (Session::get('user')->fl_admin == 'Y')
                    <li class="nav-header">SETTINGS</li>
                    <li class="nav-item @if ($menu == 'Master Data') menu-open @endif">
                        <a href="#" class="nav-link @if ($menu == 'Master Data') active @endif">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/master-data/users"
                                    class="nav-link @if ($sub_menu == 'Users') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/master-data/category"
                                    class="nav-link @if ($sub_menu == 'Kategori') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/master-data/kelurahan"
                                    class="nav-link @if ($sub_menu == 'Kelurahan') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelurahan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/master-data/kecamatan"
                                    class="nav-link @if ($sub_menu == 'Kecamatan') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kecamatan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/master-data/kota"
                                    class="nav-link @if ($sub_menu == 'Kota') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kabupaten/Kota</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/master-data/puskesmas"
                                    class="nav-link @if ($sub_menu == 'Puskesmas') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Puskesmas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/master-data/usia"
                                    class="nav-link @if ($sub_menu == 'Usia') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Usia</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if ($menu == 'Setup') menu-open @endif">
                        <a href="#" class="nav-link @if ($menu == 'Setup') active @endif">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Setup
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/setup/generate-number"
                                    class="nav-link @if ($sub_menu == 'Generate Number') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Generate Number</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
