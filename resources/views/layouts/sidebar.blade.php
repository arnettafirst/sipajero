<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href={{ url('/') }}>{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href={{ url('/') }}></a>
    </div>
    <ul class="sidebar-menu">
        @if(Auth::user()->role == 'admin')
            <li class="{{ Request::route()->getName() == 'admin.dashboard.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::route()->getName() == 'admin.farmer.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.farmer.index') }}"><i class="fas fa-user"></i> <span>Petani</span></a></li>
        @elseauth
            <li class="{{ Request::route()->getName() == 'farmer.dashboard.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('farmer.dashboard.index') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::route()->getName() == 'farmer.farmer.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('farmer.farmer.index') }}"><i class="fas fa-user"></i> <span>Petani</span></a></li>
        @endif
    </ul>
</aside>
