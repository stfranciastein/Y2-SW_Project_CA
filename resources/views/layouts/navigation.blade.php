<!-- Regular Top Navbar (for larger screens) -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-none d-md-block sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            {{ __('PLANIT') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bottom Navbar (for smaller screens) -->
<nav class="navbar navbar-light bg-white shadow-sm fixed-bottom d-md-none">
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

