@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="">{{env('APP_NAME')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="">{{env('APP_NAME')}}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->role == 'superadmin')
            <li class="{{ Request::is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}"><i class="fas fa-user"></i> <span>Daftar Pemohon</span></a>
            </li>
            @endif
            <li class="{{ Request::is('permohonan', 'permohonan/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('permohonan') }}"><i class="fas fa-plus"></i> <span>Daftar Permohonan</span></a>
            </li>
            <li class="{{ Request::is('permohonan-selesai*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('permohonan-selesai') }}"><i class="fas fa-check"></i> <span>Permohonan Selesai</span></a>
            </li>
            @if (Auth::user()->role == 'superadmin')
            <li class="menu-header">Hak Akses</li>
            <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Hak Akses</span></a>
            </li>
            @endif
        </ul>
    </aside>
</div>
@endauth
