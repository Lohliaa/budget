<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3"><i class="bi bi-journal-bookmark-fill"></i> SOBAT <span>GULA</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Halaman Utama</span></a>
    </li>
    @auth
    <!-- Nav Item - Dashboard -->
    @if (Auth::user()->role === "Admin")

    @endif


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}
    {{--
    @if (Auth::user()->role === "Admin" || Auth::user()->role === "Kasir")
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Profile : </h6>
                <a class="collapse-item" href="{{ url('profile/') }}">Profile</a>
                <a class="collapse-item" href="{{ url('profile/show/') }}">Ubah Profile</a>
            </div>
        </div>
    </li>
    @endif --}}

    {{-- @if (Auth::user()->role === "Admin")
    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span></a>
    </li>
    @endif --}}

    <!-- Divider -->
    <hr class="sidebar-divider">
    {{--  @if (Auth::user()->role == "Admin" || Auth::user()->role == "Staff")  --}}
    <!-- Heading -->
    <div class="sidebar-heading">
        Database
    </div>
    @endif
    {{--  @if (Auth::user()->role == "Admin" || Auth::user()->role == "Staff")  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('master_barang') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Barang</span></a>
    </li>
    {{--  @endif  --}}

    {{--  @if (Auth::user()->role == "Admin" || Auth::user()->role == "Staff")  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('cost') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Cost Center</span></a>
    </li>
    {{--  @endif  --}}
    {{--  @if (Auth::user()->role == "Admin" || Auth::user()->role == "Staff")  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('carline') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Carline</span></a>
    </li>
    {{--  @endif  --}}
    {{--  @if (Auth::user()->role == "Admin" || Auth::user()->role == "Staff")  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('kode_budget') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Kode Budget</span></a>
    </li>
    {{--  @endif  --}}
    {{--  @if (Auth::user()->role == "Admin" || Auth::user()->role == "Staff")  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('umh') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>UMH</span></a>
    </li>
    {{--  @endif  --}}
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
    {{--  @endauth  --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->