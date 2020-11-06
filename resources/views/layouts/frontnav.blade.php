<nav class="navbar navbar-expand-lg main-navbar">
    <a href="" class="navbar-brand sidebar-gone-hide">{{ env('APP_NAME') }}</a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-bars" style="font-size: 24px;"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link">Beranda</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Peramalan</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Informasi</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Diskusi</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Laporan</a></li>
        </ul>
    </div>
    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" value="{{ Request::get('query') }}" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            @guest
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-sm-none d-lg-inline-block">Hi, Guest</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item has-icon text-primary" data-toggle="modal" data-target="#loginModal">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </div>
            @endguest
            @auth
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ Auth::user()->photo }}" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.show') }}" class="dropdown-item has-icon">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item has-icon">
                            <i class="fas fa-columns"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('farmer.dashboard.index') }}" class="dropdown-item has-icon">
                            <i class="fas fa-columns"></i> Dashboard
                        </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            @endauth
        </li>
    </ul>
</nav>
