<!-- Main Sidebar Container -->
<link rel="stylesheet" href="{{ asset('css/admin-sidebar.css') }}">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">

        <!-- ✅ Logo Section -->
        <div class="sidebar-logo text-center mt-3 mb-3">
            <a>
                <img src="{{ asset('images/oip.png') }}" alt="PESO Logo" class="peso-logo">
            </a>
        </div>

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block">Admin Dashboard</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('admin.user-list') }}"
                        class="nav-link {{ Route::is('admin.user-list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('admin.events-calendar') }}"
                        class="nav-link {{ Route::is('admin.events.calendar') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Events Calendar</p>
                    </a>
                </li>
                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('admin.settings') }}"
                        class="nav-link {{ Route::is('admin.settings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
