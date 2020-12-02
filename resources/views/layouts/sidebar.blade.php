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
            <li class="{{ Request::route()->getName() == 'admin.information.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.information.index') }}"><i class="fas fa-newspaper"></i> <span>Informasi</span></a></li>
            <li class="{{ Request::route()->getName() == 'admin.report.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.report.index') }}"><i class="fas fa-question-circle"></i> <span>Laporan</span></a></li>
            <li class="{{ Request::route()->getName() == 'admin.discussion.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.discussion.index') }}"><i class="fas fa-comments"></i> <span>Diskusi</span></a></li>
        @elseauth
            <li class="{{ Request::route()->getName() == 'farmer.dashboard.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('farmer.dashboard.index') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::route()->getName() == 'farmer.farmer.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('farmer.farmer.index') }}"><i class="fas fa-user"></i> <span>Petani</span></a></li>
            <li class="{{ Request::route()->getName() == 'farmer.report.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('farmer.report.index') }}"><i class="fas fa-question-circle"></i> <span>Laporan</span></a></li>
            <li class="{{ Request::route()->getName() == 'admin.discussion.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('farmer.discussion.index') }}"><i class="fas fa-comments"></i> <span>Diskusi</span></a></li>
        @endif
    </ul>
</aside>
