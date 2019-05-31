<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-left justify-content-left" href="#">
        <div class="sidebar-brand-text">SIMDES</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{active('dashboard')}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{is_active(['religion.*','hamlet.*','civil.*']) ? '':'collapsed'}}" href="#" data-toggle="collapse" data-target="#master_data" aria-expanded="true" aria-controls="master_data">
            <i class="fas fa-fw fa-book"></i>
            <span>Master Data</span>
        </a>
        <div id="master_data" class="collapse {{is_active(['religion.*','hamlet.*','civil.*'])  ? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{active('religion.*')}}" href="{{route('religion.index')}}">Agama</a>
            <a class="collapse-item {{active('hamlet.*')}}" href="{{route('hamlet.index')}}">Dukuh / Dusun</a>
            <a class="collapse-item {{active('civil.*')}}" href="{{route('civil.index')}}">Penduduk</a>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{active('religion.index')}}">
        <a class="nav-link" href="{{route('religion.index')}}">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Agama</span>
        </a>
    </li>
    <li class="nav-item {{active('hamlet.index')}}">
        <a class="nav-link" href="{{route('hamlet.index')}}">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Dukuh</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item {{active('civil.index')}}">
        <a class="nav-link" href="{{route('civil.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Penduduk</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link {{is_active('transaction.*') ? '':'collapsed'}}" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
            <i class="fas fa-fw fa-book"></i>
            <span>Kejadian</span>
        </a>
        <div id="transaksi" class="collapse {{is_active(['mortality.*'])  ? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{active('mortality.*')}}" href="{{route('mortality.index')}}">Kematian</a>
            <a class="collapse-item {{active('transaction.index')}}" href="{{route('transaction.index')}}">List Transaksi</a>
            <a class="collapse-item {{active('transaction.history')}}" href="{{route('transaction.history')}}">Riwayat Transaksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{active('setting.index')}}">
        <a class="nav-link" href="{{route('setting.index')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
        </a>
    </li>
    @if (auth()->user()->role->name == 'super-admin')

    <li class="nav-item">
        <a class="nav-link {{is_active('user.index') || is_active('role.index') ? '':'collapsed'}}" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="user">
            <i class="fas fa-fw fa-user"></i>
            <span>Manajemen Pengguna</span>
        </a>
        <div id="user" class="collapse {{is_active('user.index') || is_active('role.index')  ? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{active('user.index')}}" href="{{route('user.index')}}">Pengguna</a>
            <a class="collapse-item {{active('role.index')}}" href="{{route('role.index')}}">Hak Akses</a>
            </div>
        </div>
    </li>
    @endif
    {{-- <li class="nav-item {{active('user.index')}}">
        <a class="nav-link" href="{{route('user.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span>
        </a>
    </li>
    <li class="nav-item {{active('role.index')}}">
        <a class="nav-link" href="{{route('role.index')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Hak Akses</span>
        </a>
    </li> --}}

</ul>
<!-- End of Sidebar -->
