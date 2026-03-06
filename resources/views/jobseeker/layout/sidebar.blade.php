<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3">
            <div class="info">
                <a href="{{ route('jobseeker.dashboard') }}" class="d-block">Jobseeker Dashboard</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('jobseeker.dashboard') }}"
                        class="nav-link {{ Route::is('jobseeker.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('jobseeker.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- Main Sidebar Container -->
