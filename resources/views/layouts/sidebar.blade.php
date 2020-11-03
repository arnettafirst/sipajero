<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href={{ url('/') }}>{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href={{ url('/') }}></a>
    </div>
    <ul class="sidebar-menu">
        @if(Auth::check() && auth()->user()->is_admin == 1)
{{--            <li class="{{ Request::route()->getName() == 'dashboard.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>--}}
{{--            <li class="{{ Request::route()->getName() == 'user.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>Penduduk</span></a></li>--}}
{{--            <li class="{{ Request::route()->getName() == 'letter.index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('letter.index') }}"><i class="fa fa-envelope"></i> <span>Surat</span></a></li>--}}
        @elseauth
{{--            <li class="{{ Request::route()->getName() == 'letter' ? ' active' : '' }}"><a class="nav-link" href="{{ route('letter') }}"><i class="fa fa-envelope"></i> <span>Surat</span></a></li>--}}
{{--            <li class="{{ Request::route()->getName() == 'location' ? ' active' : '' }}"><a class="nav-link" href="{{ route('location') }}"><i class="fa fa-map-marker"></i> <span>Riwayat Lokasi</span></a></li>--}}
        @endif
    </ul>
</aside>
