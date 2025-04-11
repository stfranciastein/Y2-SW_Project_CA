<!-- Top Navbar (Desktop) -->
<nav class="navbar navbar-expand-lg bg-white border-bottom py-3 px-4 d-none d-md-flex flex-column align-items-center shadow-sm">
    <a class="navbar-brand text-center mb-2 d-flex align-items-center gap-2 fs-2 text-dark fw-bold h1" href="{{ url('/') }}">
        <img src="{{ asset('images/assets/logo_blue.png') }}" alt="Logo" style="height: 35px; width: 35px; object-fit: contain;">
        PLANIT
    </a>

    <div class="d-flex justify-content-center gap-4">
        <a class="nav-link fw-semibold {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-dark' }}" href="{{ route('dashboard') }}">
            Dashboard
        </a>
        <a class="nav-link fw-semibold {{ request()->routeIs('activities.index') ? 'text-primary' : 'text-dark' }}" href="{{ route('activities.index') }}">
            Activities
        </a>
        <a class="nav-link fw-semibold {{ request()->routeIs('appposts.index') ? 'text-primary' : 'text-dark' }}" href="{{ route('appposts.index') }}">
            Updates
        </a>
        <a class="nav-link fw-semibold {{ request()->routeIs('profile.edit') ? 'text-primary' : 'text-dark' }}" href="{{ route('profile.edit') }}">
            Profile
        </a>
    </div>
</nav>

<!-- Bottom Navbar (Mobile) -->
<nav class="navbar bg-white fixed-bottom border-top d-md-none shadow-sm">
    <div class="container-fluid px-4 fw-bold">
        <ul class="d-flex gap-3 justify-content-between align-items-center w-100 list-unstyled my-2">
            <li class="text-center flex-fill">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-muted' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-home fa-2x"></i>
                    <div class="small">Home</div>
                </a>
            </li>
            <li class="text-center flex-fill">
                <a class="nav-link {{ request()->routeIs('activities.index') ? 'text-primary' : 'text-muted' }}" href="{{ route('activities.index') }}">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                    <div class="small">Activities</div>
                </a>
            </li>
            <li class="text-center flex-fill">
                <a class="nav-link {{ request()->routeIs('appposts.index') ? 'text-primary' : 'text-muted' }}" href="{{ route('appposts.index') }}">
                    <i class="fas fa-newspaper fa-2x"></i>
                    <div class="small">News</div>
                </a>
            </li>
            <li class="text-center flex-fill">
                <a class="nav-link {{ request()->routeIs('profile.edit') ? 'text-primary' : 'text-muted' }}" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-2x"></i>
                    <div class="small">Profile</div>
                </a>
            </li>
        </ul>
    </div>
</nav>
