<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-bs-theme="light" data-topbar="light">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Growvi </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">
    @include('layouts.head-css')
</head>

<body class="bg-gray-100 flex h-screen">

 <!-- Mobile Menu Button -->
    <div class="lg:hidden absolute top-4 left-4 z-50">
        <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
        <i class="fas fa-bars fa-2x"></i>
        </button>
    </div>

    @include('layouts.core.partials.sidebar')

    <div class="flex-1 flex flex-col overflow-auto">

        @include('layouts.core.partials.header')
   
        <div class="p-6">
             @yield('content')
        </div>

    </div>
    @include('layouts.vendor-scripts')
</body>

</html>
