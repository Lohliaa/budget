<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-text mx-3"><i class="bi bi-journal-bookmark-fill"></i> SOBAT <span>GULA</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Halaman Utama</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @if (Auth::user()->role === "Admin")

    <div class="sidebar-heading">
        Database
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('master_barang') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Barang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('cost') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Cost Center</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('carline') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Carline</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('kode_budget') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Kode Budget</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('umh') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Nariyuki</span></a>
    </li>
    @endif

        
    <li class="nav-item">
        <a class="nav-link" href="{{ url('proses_nariyuki') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Summary</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @if (Auth::user()->role === "Admin")
    <div class="sidebar-heading">
        Pengguna
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('profile') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Profile</span></a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->