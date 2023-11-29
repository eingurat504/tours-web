<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="app-url" content="{{ config('app.url') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico') }}"/>
    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    
    <link rel="stylesheet" href="{{ asset('base/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('base/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('base/css/site.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('base/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/chartist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('base/vendor/chartist/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('base/skins/green.css') }}"> 
    <link rel="stylesheet" href="{{ asset('base/skins/custom_styles.css') }}">    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('base/fonts/weather-icons/weather-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('base/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('base/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <script src="{{ asset('base/vendor/breakpoints/breakpoints.js') }}"></script>

    <style>
       
    </style>

    {{-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES --}}
    @stack('extra-css')
    {{-- END PAGE LEVEL PLUGINS/CUSTOM STYLES --}}

    
</head>
<script>
  Breakpoints();
  </script>
<body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="{{ asset('base/images/logo.png') }}" title="{{ config('app.name', 'M-Omulimisa') }}">
          <span class="navbar-brand-text hidden-xs-down"> {{ config('app.name', 'M-Omulimisa') }}</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon md-search" aria-hidden="true"></i>
        </button>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
            <li class="nav-item hidden-float">
              <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                role="button">
                <span class="sr-only">Toggle Search</span>
              </a>
            </li>
            
          </ul>
          <!-- End Navbar Toolbar -->
    
         
        </div>
        <!-- End Navbar Collapse -->
    
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon md-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav> 
    <!-- side menu -->
    @include('layouts.core.partials.sidebar')


    {{-- BEGIN MAIN CONTAINER --}}
       <!-- Page -->
       <div class="page">
        <div class="page-header">
          @yield('breadcrumb')
          <!-- sample breadcrumb to use -->

       <!--   <h1 class="page-title">DataTables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          <div class="page-header-actions">
            <a class="btn btn-sm btn-primary btn-round" href="http://datatables.net" target="_blank">
              <i class="icon md-link" aria-hidden="true"></i>
              <span class="hidden-sm-down">Official Website</span>
            </a>
          </div>
        -->

          <!-- end sample -->
        </div>
  
        <div class="page-content">

          {{-- CONTENT AREA --}}
          @yield('content')
          {{-- CONTENT AREA --}}

        </div>

       </div>

    {{-- END MAIN CONTAINER --}}

    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    {{--
    <script src="assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="bootstrap/js/popper.min.js') }}"></script>
    <script src="bootstrap/js/bootstrap.min.js') }}"></script>
    --}}
       <!-- Core  -->
    <script src="{{ asset('base/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('base/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('base/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('base/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('base/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('base/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('base/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('base/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    <script src="{{ asset('base/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
    <script src="{{ asset('base/vendor/waves/waves.js') }}"></script>
    
    <!-- Plugins -->
    <script src="{{ asset('base/vendor/switchery/switchery.js') }}"></script>
    <script src="{{ asset('base/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ asset('base/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ asset('base/vendor/slidepanel/jquery-slidePanel.js') }}"></script>

    <script type="text/javascript" src="{{ asset('base/vendor/datatables-net/JSZip-2.5.0/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/DataTables-1.10.24/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/DataTables-1.10.24/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Buttons-1.7.0/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Buttons-1.7.0/js/buttons.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Buttons-1.7.0/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Buttons-1.7.0/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Buttons-1.7.0/js/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Responsive-2.2.7/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Responsive-2.2.7/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Scroller-2.0.3/js/dataTables.scroller.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/datatables-net/Select-1.3.3/js/dataTables.select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('base/vendor/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('base/vendor/chartist/chartist.js') }}"></script>
      
        <script src="{{ asset('base/vendor/asrange/jquery-asRange.min.js') }}"></script>

          
        <script src="{{ asset('base/vendor/bootbox/bootbox.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('base/js/Component.js') }}"></script>
    <script src="{{ asset('base/js/Plugin.js') }}"></script>
    <script src="{{ asset('base/js/Base.js') }}"></script>
    <script src="{{ asset('base/js/Config.js') }}"></script>
    
    <script src="{{ asset('base/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('base/js/Section/GridMenu.js') }}"></script>
    <script src="{{ asset('base/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('base/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('base/js/Plugin/menu.js') }}"></script>
    
    <script src="{{ asset('base/js/config/colors.js') }}"></script>
    <script src="{{ asset('base/js/config/tour.js') }}"></script>
    <script>Config.set('assets', 'base');</script>
    
    <!-- Page -->
    <script src="{{ asset('base/js/Site.js') }}"></script>
    <script src="{{ asset('base/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ asset('base/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ asset('base/js/Plugin/switchery.js') }}"></script>
    <script src="{{ asset('base/js/Plugin/datatables.js') }}"></script>
    
    


  
    <script>
      (function(document, window, $) {
  'use strict';

  var Site = window.Site;

  $(document).ready(function() {
    Site.run();
  });
})(document, window, jQuery);
        (function() {
            $('div.alert').not('.alert-danger, .alert-important').delay(5000).fadeOut(500);

            // ...

            window.$.ajaxSetup({
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ...

            $('.modal').on('shown.bs.modal', function () {
                $(this).find('[autofocus]').focus();
            });

            $('.modal').on('hidden.bs.modal', function () {
                // Source: https://stackoverflow.com/a/35079811
                // $(this).find('form').trigger('reset');
                $(this).find('form')[0].reset();
            });
        })();
    </script>
    
    @stack('extra-js')
    
</body>
</html>