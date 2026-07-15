    <!-- Sidebar -->
    <!--
      Sidebar Mini Mode - Display Helper classes

      Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

      Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
      Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="bg-header-dark">
        <div class="content-header bg-white-5">
          <!-- Logo -->
          <a class="fw-semibold text-white tracking-wide" href="{{ route('dashboard') }}">
            <span class="smini-visible">
              D<span class="opacity-75">x</span>
            </span>
            <span class="smini-hidden">
              Dash<span class="opacity-75">mix</span>
            </span>
          </a>
          <!-- END Logo -->

          <!-- Options -->
          <div class="d-flex align-items-center gap-1">
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <div class="dropdown">
              <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end smini-hide border-0" aria-labelledby="sidebar-dark-mode-dropdown">
                <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                  <i class="far fa-sun fa-fw opacity-50"></i>
                  <span class="fs-sm fw-medium">Light</span>
                </button>
                <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                  <i class="far fa-moon fa-fw opacity-50"></i>
                  <span class="fs-sm fw-medium">Dark</span>
                </button>
                <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                  <i class="fa fa-desktop fa-fw opacity-50"></i>
                  <span class="fs-sm fw-medium">System</span>
                </button>
              </div>
            </div>
            <!-- END Dark Mode -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
              <i class="fa fa-times-circle"></i>
            </button>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Options -->
        </div>
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                <i class="nav-main-link-icon fa fa-location-arrow"></i>
                <span class="nav-main-link-name">Dashboard</span>
                <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>
              </a>
            </li>
            <li class="nav-main-heading">Various</li>
            <li class="nav-main-item{{ request()->is('pages/*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon fa fa-lightbulb"></i>
                <span class="nav-main-link-name">Examples</span>
              </a>
              <ul class="nav-main-submenu">
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('pages/datatables') ? ' active' : '' }}" href="/pages/datatables">
                    <span class="nav-main-link-name">DataTables</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('pages/slick') ? ' active' : '' }}" href="/pages/slick">
                    <span class="nav-main-link-name">Slick Slider</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="/pages/blank">
                    <span class="nav-main-link-name">Blank</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-main-heading">More</li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{ route('home') }}">
                <i class="nav-main-link-icon fa fa-globe"></i>
                <span class="nav-main-link-name">Home</span>
              </a>
            </li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{ route('users.index') }}">
                <i class="nav-main-link-icon fa fa-users"></i>
                <span class="nav-main-link-name">Usuários</span>
              </a>
            </li>

          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->