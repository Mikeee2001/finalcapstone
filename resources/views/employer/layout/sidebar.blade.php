<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3">
            <div class="info">
                <a href="{{ route('employer.dashboard') }}" class="d-block">Employer Dashboard</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('employer.dashboard') }}"
                        class="nav-link {{ Route::is('employer.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>

                <!-- Applications -->
                <li class="nav-item menu-open mb-2">
                    <a href="#" class="nav-link">
                        <i class="fas fa-inbox me-2"></i>
                        <span>Applications</span>
                    </a>
                </li>

                <!-- Jobs List -->
                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('employer.job-list') }}"
                        class="nav-link {{ Route::is('employer.job-list') ? 'active' : '' }}">
                        <i class="fas fa-briefcase me-2"></i>
                        <span>Manage Jobs</span>
                    </a>
                </li>

                <!-- Company Profile -->
                <li class="nav-item menu-open mb-2">
                    <a href="#" class="nav-link">
                        <i class="fas fa-building me-2"></i>
                        <span>Company Profile</span>
                    </a>
                </li>


                <!-- Settings -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>


                <!-- Logout -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('employer.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
