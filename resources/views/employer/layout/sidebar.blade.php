<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; top: 0; height: 100vh; overflow-y: auto;">
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="{{route('employer.dashboard')}}" class="d-block">Employer Dashboard</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{ route('employer.dashboard') }}" class="nav-link {{ Route::is('employer.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Home</p>
          </a>
        </li>

     <!-- Logout -->
        <li class="nav-item menu-open" style="margin-bottom: 10px;">
            <a href="{{ route('employer.logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>LOGOUT</p>
            </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
