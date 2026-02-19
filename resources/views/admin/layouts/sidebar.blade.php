<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block">Admin Dashboard</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{--  <li class="nav-header" style="font-size: 1.2em; color: yellow;">FOR ACTIVATION</li> --}}

                <!-- Dashboard -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- User List -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('admin.user-list') }}"
                        class="nav-link {{ Route::is('admin.user-list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                {{-- <!-- Company List -->
        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{ route('admin.company-list') }}" class="nav-link {{ Route::is('admin.company-list') ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                  Company
              </p>
          </a>
        </li>
              </p>
          </a>
        </li>
              <!-- Jobs List -->
        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{ route('admin.job-list') }}" class="nav-link {{ Route::is('admin.job-list') ? 'active' : '' }}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                  Jobs
              </p>
          </a>
        </li> --}}

                <!-- Jobs List -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('admin.events-calendar') }}"
                        class="nav-link {{ Route::is('admin.events.calendar') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('admin.settings') }}"
                        class="nav-link {{ Route::is('admin.settings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item menu-open" style="margin-bottom: 10px;">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
