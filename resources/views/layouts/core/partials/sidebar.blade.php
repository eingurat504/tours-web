<!-- <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">General</li>
            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('home') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Dashboard</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('events.index') }}">
                      <i class="site-menu-icon md-view-week" aria-hidden="true"></i>
                      <span class="site-menu-title">Calender</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('bookings.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Bookings</span>
                </a>
            </li>

			      <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('activities.index') }}">
                      <i class="site-menu-icon md-view-stream" aria-hidden="true"></i>
                      <span class="site-menu-title">Activities</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('payments.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Payments</span>
                </a>
            </li>

            <li class="site-menu-category">Reports</li>
            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('bookings.index') }}">
                      <i class="site-menu-icon md-book" aria-hidden="true"></i>
                      <span class="site-menu-title">Bookings</span>
                </a>
            </li>

			      <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('roles.index') }}">
                      <i class="site-menu-icon md-chart-donut" aria-hidden="true"></i>
                      <span class="site-menu-title">Activities</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('permissions.index') }}">
                      <i class="site-menu-icon md-receipt" aria-hidden="true"></i>
                      <span class="site-menu-title">Payments</span>
                </a>
            </li>

            <li class="site-menu-category">Settings</li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('users.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Users</span>
                </a>
            </li>

			      <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('roles.index') }}">
                      <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
                      <span class="site-menu-title">Roles</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('permissions.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Permissions</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('roles.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Activity Types</span>
                </a>
            </li>

            <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('payment_types.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Payment Types</span>
                </a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>

    <form id="logout-form" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
          data-original-title="Settings">
          <span class="icon md-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
          <span class="icon md-eye-off" aria-hidden="true"></span>
        </a>

		<a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout"
				onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
			<span class="icon md-power" aria-hidden="true"></span>
		</a>
    </div>
</div> -->


  <!-- Sidebar -->
  <div id="sidebar" class="w-64 h-full bg-gray-900 text-white flex flex-col justify-between absolute lg:relative transform lg:translate-x-0 -translate-x-full z-40">
    <!-- Logo Area -->
    <div class="p-6">
      <div class="flex items-center space-x-2">
        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center">
          <i class="fas fa-chart-bar"></i>
        </div>
        <span class="text-2xl font-bold">TailAdmin</span>
      </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-4 space-y-6">
      <div>
        <p class="text-gray-400 uppercase text-xs mb-2">Menu</p>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-th-large"></i>
            <span>Dashboard</span>
          </div>
          <i class="fas fa-chevron-down"></i>
        </a>
        <a href="#" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-gray-700">
          <i class="fas fa-calendar"></i>
          <span>Categories</span>
        </a>
        <a href="#" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-gray-700">
          <i class="fas fa-user"></i>
          <span>Products</span>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-tasks"></i>
            <span>Attachments</span>
          </div>
        </a>
      </div>

      <div>
        <p class="text-gray-400 uppercase text-xs mb-2">Reports</p>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-envelope"></i>
            <span>Sales Report</span>
          </div>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-inbox"></i>
            <span>Product Report</span>
          </div>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-file-invoice"></i>
            <span>Invoice</span>
          </div>
        </a>
      </div>

      <div>
        <p class="text-gray-400 uppercase text-xs mb-2">Settings</p>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-chart-pie"></i>
            <span>Account Settings</span>
          </div>
          <i class="fas fa-chevron-down"></i>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-lock"></i>
            <span>Payment Info</span>
          </div>
          <i class="fas fa-chevron-down"></i>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-cubes"></i>
            <span>Users</span>
          </div>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-cubes"></i>
            <span>Roles</span>
          </div>
        </a>
        <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
          <div class="flex items-center space-x-3">
            <i class="fas fa-cubes"></i>
            <span>Permissions</span>
          </div>
        </a>
      </div>
    </nav>

    <!-- Profile Section -->
    <div class="p-4 border-t border-gray-700">
      <div class="flex items-center space-x-3">
        <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
        <div>
          <p class="font-medium">John Doe</p>
          <a href="#" class="text-sm text-gray-400 hover:text-gray-200">Logout</a>
        </div>
      </div>
    </div>
  </div>