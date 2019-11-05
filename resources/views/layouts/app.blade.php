<?php
$Permissions = App\Module_permission::getPermissions(Auth::user()->user_role);
$roles = array();
foreach ($Permissions as $p) {
    $roles[] = $p->module_slug;
}
?>
<?php
$user_role = DB::table('user_roles')
    ->where('id', Auth::user()->user_role )
    ->first();
//$t = DB::table("locations")->get();
//echo "<pre>"; print_r($t); exit;
//dd($user_role);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title> Point of Sale @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('')}}assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('')}}assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/site.css" rel="stylesheet">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('')}}global_assets/js/main/jquery.min.js"></script>
    <script src="{{asset('')}}global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('')}}global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="{{asset('')}}global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="{{asset('')}}assets/js/app.js"></script>
    <script src="{{asset('')}}global_assets/js/demo_pages/dashboard.js"></script>
    <!-- /theme JS files -->

    <style type="text/css">
      .hide {
	      display: none;
      }
    </style>
    </head>

  <body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark navbar-static" style="background-color: #263238;">
    <div class="navbar-brand"> <img src="" alt=""> </div>
    <div class="d-md-none">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile"> <i class="icon-tree5"></i> </button>
      <button class="navbar-toggler sidebar-mobile-main-toggle" type="button"> <i class="icon-paragraph-justify3"></i> </button>
    </div>
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block"> <i class="icon-paragraph-justify3"></i> </a> </li>
        </ul>
        <ul class="navbar-nav ml-md-auto">
          <li class="nav-item"> <span class="navbar-text ml-md-3"> <span class=""></span> </span> </li>
          <li class="nav-item"> </li>
          <li class="nav-item dropdown dropdown-user"> <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown"> <span>{{ Auth::user()->first_name. " ".Auth::user()->last_name }}</span> </a>
            <div class="dropdown-menu dropdown-menu-right">
              <p class="dropdown-item">You are login as {{ $user_role->description }}</p>
              <div class="dropdown-divider"></div>
              <?php if (Auth::user()->user_role != 4) { ?>
              <a href="{{url('profile/settings/'.Auth::user()->id)}}" class="dropdown-item"><i class="icon-cog5"></i> Settings</a>
              <?php } ?>
              <a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
              <!--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>-->
            </div>
          </li>
        </ul>
      </div>
    </div>
<!-- /main navbar --> 

<!-- Page content -->
<div class="page-content">
      
      @section('sidebar') 
      <!-- Main sidebar -->
      <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md"> 
    
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center"> <a href="#" class="sidebar-mobile-main-toggle"> <i class="icon-arrow-left8"></i> </a> <span class="font-weight-semibold">Navigation</span> <a href="#" class="sidebar-mobile-expand"> <i class="icon-screen-full"></i> <i class="icon-screen-normal"></i> </a> </div>
    <!-- /sidebar mobile toggler --> 
    
    <!-- Sidebar content -->
    <div class="sidebar-content"> 
          <!-- Main navigation -->
          <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
              <!-- Main -->
              <li class="nav-item nav-item-submenu <?php if (!in_array('users', $roles)) {echo 'hide';} ?>"> <a href="#" class="nav-link"><i  
                class="icon-users"></i> <span>Users</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Users">
                  <li class="nav-item"><a href="{{ url('users') }}" class="nav-link active">View All Users</a></li>
                  <li class="nav-item"><a href="{{ url('user/add') }}" class="nav-link">Add New</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?php if (!in_array('sale_form', $roles)) {echo 'hide';} ?>"> <a href="#" class="nav-link"><i   class="icon-copy"></i> <span>Sale Form</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Customers">
                  <li class="nav-item"><a href="{{ url('accounts') }}" class="nav-link active">View All Sales</a></li>
                  <li class="nav-item"><a href="{{ url('account/add') }}" class="nav-link">Add New</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?php if (!in_array('users', $roles)) {echo 'hide';} ?>"> <a href="#" class="nav-link"><i class="icon-location4"></i> <span>Purchase</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Location">
                  <li class="nav-item"><a href="{{ url('location') }}" class="nav-link active">View All</a></li>
                  <li class="nav-item"><a href="{{ url('location/add') }}" class="nav-link">Add New</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?php if(!in_array('inventory', $roles)){echo 'hide';} ?>"> <a href="#" class="nav-link"><i class="icon-location4"></i> <span>Inventory</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Location">
                  <li class="nav-item"><a href="{{ url('inventory') }}" class="nav-link active">View All</a></li>
                  <li class="nav-item"><a href="{{ url('inventory/add') }}" class="nav-link">Add New</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /main navigation --> 
        </div>
    <!-- /sidebar content --> 
  </div>
      <!-- /main sidebar --> 
      @show
      
      
      <!-- Main content -->
      <div class="content-wrapper"> 
    
    <!-- Page header -->
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex"> </div>
      </div>
        </div>
    <!-- /page header --> 
    
    <!-- Content area -->
    <div class="content"> @include('flash_message')
          @yield('content') </div>
    <!-- /content area --> 
    
  </div>
      <!-- /main content --> 
      
    </div>
<!-- /page content --> 
<!-- Footer --><!-- 
<div class="text-center custom-footer">©Copyright 2019</div> -->
<!-- /footer -->
</body>
</html>