<div id="sidebar" class="w-64 h-full bg-gray-900 text-white flex flex-col justify-between absolute lg:relative transform lg:translate-x-0 -translate-x-full z-40">
  <!-- Logo Area -->
  <div class="p-6">
    <div class="flex items-center space-x-2">
      <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center">
        <i class="fas fa-chart-bar"></i>
      </div>
      <span class="text-2xl font-bold">TOURS WEB</span>
    </div>
  </div>

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

      @can('viewAny', \App\Models\Activity::class)   

      <a href="{{ route('activities.index') }}" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-user"></i>
        <span>Activities</span>
      </a>
      @endcan
      
      @can('viewAny', \App\Models\Booking::class)   
      <a href="{{ route('bookings.index') }}" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-tasks"></i>
          <span>Bookings</span>
        </div>
      </a>
      @endcan
      @can('viewAny', \App\Models\Payment::class)  
      <a href="{{ route('payments.index') }}" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-calendar"></i>
        <span>Payments</span>
      </a>
      @endcan
    </div>

    <div>
      <p class="text-gray-400 uppercase text-xs mb-2">Reports</p>
      @can('viewAny', \App\Models\Booking::class)  
      <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-envelope"></i>
          <span>Booking Report</span>
        </div>
      </a>
      @endcan
      @can('viewAny', \App\Models\Payment::class)  
      <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-inbox"></i>
          <span>Payments Report</span>
        </div>
      </a>
      @endcan
      @can('viewAny', \App\Models\Activity::class) 
      <a href="#" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-file-invoice"></i>
          <span>Activities Report</span>
        </div>
      </a>
      @endcan
    </div>

    <div>
      <p class="text-gray-400 uppercase text-xs mb-2">Settings</p>
      @can('viewAny', \App\Models\User::class) 
      <a href="{{ route('users.index') }}" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-cubes"></i>
          <span>Users</span>
        </div>
      </a>
      @endcan
      @can('viewAny', \App\Models\Role::class) 
      <a href="{{ route('roles.index') }}" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-cubes"></i>
          <span>Roles</span>
        </div>
      </a>
      @endcan
      @can('viewAny', \App\Models\Permission::class) 
      <a href="{{ route('permissions.index') }}" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-cubes"></i>
          <span>Permissions</span>
        </div>
      </a>
      @endcan
    </div>
  </nav>

  <!-- Profile Section -->
  <div class="p-4 border-t border-gray-700">
    <div class="flex items-center space-x-3">
      <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
      <div>
        <p class="font-medium">{{ Auth::user()->name }}</p>
        <a href="{{ route('logout') }}" class="text-sm text-gray-400 hover:text-gray-200" 
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
      </div>
    </div>
  </div>
</div>