<!-- Regular Top Navbar (for larger screens) -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-2 flex-column align-items-center d-none d-md-flex">
    <!-- Centered Title -->
    <div class="text-center mb-2">
        <a class="navbar-brand fw-bold fs-3 text-dark h2 fst-italic" href="{{ url('/') }}">
            PLANIT
        </a>
    </div>

    <!-- Nav Links Below Title -->
    <div class="container d-flex justify-content-center">
        <ul class="navbar-nav flex-row gap-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('activities.index') }}">Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('appposts.index') }}">Updates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Bottom Navbar (for smaller screens) -->
<nav class="navbar navbar-light bg-white fixed-bottom d-md-none shadow-md" style="box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <ul class="w-100 d-flex justify-content-between list-unstyled px-3 my-0 pt-1">
            <li class="nav-item">
                <a class="nav-link text-center {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-home fa-2x"></i>
                    <span class="d-block">Home</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-center {{ request()->routeIs('activities.index') ? 'active' : '' }}" href="{{ route('activities.index') }}">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                    <span class="d-block">Activities</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-center {{ request()->routeIs('appposts.index') ? 'active' : '' }}" href="{{ route('appposts.index') }}">
                    <i class="fas fa-newspaper fa-2x"></i>
                    <span class="d-block">News</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-center {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-2x"></i>
                    <span class="d-block">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

