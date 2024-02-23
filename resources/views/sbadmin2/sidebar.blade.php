<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-2" style="font-size: 90%">Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active-dashboard')">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Set
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('active-kategori') @yield('active-penerbit') @yield('active-rak') @yield('active-buku') @yield('active-user')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-target="#collapseTwo"
            aria-expanded="false" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @yield('active-kategori')" href="/DataCategory">Data Category</a>
                <a class="collapse-item @yield('active-penerbit')" href="/DataPenerbit">Data Penerbit</a>
                <a class="collapse-item @yield('active-rak')" href="/DataRak">Data Rak</a>
                <a class="collapse-item @yield('active-buku')" href="/DataBuku">Data Buku</a>
                <a class="collapse-item @yield('active-user')" href="/DataUser">Data User</a>
            </div>
        </div>
    </li>

    <li class="nav-item @yield('active-peminjaman') @yield('active-pengembalian') ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-folder-open "></i>
            <span>Perpus Master</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @yield('active-peminjaman')" href="/DataPeminjaman">Data Peminjaman</a>
                <a class="collapse-item @yield('active-pengembalian')" href="/DataPengembalian">Data Pengembalian</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/laporan">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/DataUlasan">
            <i class="fas fa-fw fa-comments"></i>
            <span>Ulasan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
