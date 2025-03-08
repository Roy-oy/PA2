<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="/Admin" role="button">
        {{-- <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Admin Logo"
        class="brand-image img-fluid" style="width: 35px; height: auto;"> --}}
        <span class="sidebar-brand-text mx-2">Admin Puskesmas</span>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/Admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Beranda</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Admin.HeroSection.index') }}">Hero section</a>
                <a class="collapse-item" href="#">Footer</a>
                <a class="collapse-item" href="#">Tentang</a>
                <a class="collapse-item" href="#">Galeri</a>
                <a class="collapse-item" href="#">Footer</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerita"
            aria-expanded="true" aria-controls="collapseBerita">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Berita</span>
        </a>
        <div id="collapseBerita" class="collapse" aria-labelledby="headingBerita"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Berita</a>
                <a class="collapse-item" href="#">Kategori berita</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInformasi"
            aria-expanded="true" aria-controls="collapseInformasi">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Informasi</span>
        </a>
        <div id="collapseInformasi" class="collapse" aria-labelledby="headingInformasi"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Informasi</a>
                <a class="collapse-item" href="#">Kategori informasi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayanan"
            aria-expanded="true" aria-controls="collapseLayanan">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Layanan(ILP)</span>
        </a>
        <div id="collapseLayanan" class="collapse" aria-labelledby="headingLayanan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Klaster 1</a>
                <a class="collapse-item" href="#">Klaster 2</a>
                <a class="collapse-item" href="#">Klaster 3</a>
                <a class="collapse-item" href="#">Klaster 4</a>
                <a class="collapse-item" href="#">Klaster 5</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dokter</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Pasien</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Resep Pasien</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kontak</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Pegawai</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Pendaftar</span></a>
    </li>
</ul>