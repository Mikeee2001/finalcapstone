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
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"></ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('employer.dashboard') }}"
                        class="nav-link {{ Route::is('employer.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>

                <!-- Applications -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Applications</p>
                    </a>
                </li>

                <!-- Jobs List -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('employer.job-list') }}"
                        class="nav-link {{ Route::is('employer.job-list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Manage Jobs</p>
                    </a>
                </li>

                <!-- Company Profile -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Company Profile</p>
                    </a>
                </li>

                <!-- Jobs List -->
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
