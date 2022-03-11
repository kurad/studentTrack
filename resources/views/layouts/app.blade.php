<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GGAST</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('assets/1/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/1/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/1/css/vertical-layout-light/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/1/css/bootstrap.min.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/1/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/1/images/logo.jpg')}}" alt="logo"/></a>

          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>

    </nav>
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">

      <div class="navbar-menu-wrapper d-flex">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-3">
            <h6 class="mb-0">{{Auth::user()->email}}</h6>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @if(Auth::user()->role_id==3)
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('student_dashboard')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('projects')}}">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Projects</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">My Stories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
        </ul>
      </nav>
      @endif
      @if(Auth::user()->role_id==1)
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/projects">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Projects</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Judging</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users')}}">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
        </ul>
      </nav>
      @endif
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          @yield('content')

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a href="http://www.ggast.org/" class="text-muted" target="_blank">Gashora Girls Academy of Science and Technology</a>. All rights reserved.</span>
                    </div>
                </div>    
            </div>        
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
@include('layouts.js')
</body>

</html>

