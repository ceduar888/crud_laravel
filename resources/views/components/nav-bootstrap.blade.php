<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{asset('img/nav-logo.png')}}" alt="Logo" style="width: 80px; height: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                       href="{{ route('dashboard') }}" 
                       style="{{ request()->routeIs('dashboard') ? 'border-bottom: 2px solid blue; text-decoration: none;' : '' }}">
                        {{ __('Inicio') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}" 
                       href="{{ route('productos.index') }}" 
                       style="{{ request()->routeIs('productos.index') ? 'border-bottom: 2px solid blue; text-decoration: none;' : '' }}">
                        {{ __('Productos') }}
                    </a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-lg-none">
    <div class="pt-2 pb-3">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            {{ __('Dashboard') }}
        </a>
    </div>

    <!-- Opciones de sesion -->
    <div class="pt-4 pb-1 border-top">
        <div class="px-4">
            <div class="fw-bold">{{ Auth::user()->name }}</div>
            <div class="text-muted">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</div>