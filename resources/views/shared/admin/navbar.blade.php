<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}/admin" class="nav-link">Admin Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link">Go To Catalog</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fas fa-user"></i>
          <span class="badge badge-warning navbar-badge">!</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
      </li>
    </ul>
</nav>
<!-- /.navbar -->