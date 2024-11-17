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
      <a href="{{ route('activities.index') }}" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-user"></i>
        <span>Activities</span>
      </a>
      <a href="{{ route('bookings.index') }}" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
        <div class="flex items-center space-x-3">
          <i class="fas fa-tasks"></i>
          <span>Bookings</span>
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
      <a href="{{ route('users.index') }}" class="flex items-center justify-between py-2 px-4 rounded hover:bg-gray-700">
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
        <p class="font-medium">{{ Auth::user()->first_name }}</p>
        <a href="{{ route('logout') }}" class="text-sm text-gray-400 hover:text-gray-200">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
      </div>
    </div>
  </div>
</div>