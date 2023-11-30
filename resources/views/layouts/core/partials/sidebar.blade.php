<div class="site-menubar">
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

            <!-- <li class="site-menu-item">
              	<a class="animsition-link" href="{{ route('roles.index') }}">
                      <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                      <span class="site-menu-title">Activity Types</span>
                </a>
            </li> -->

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
</div>