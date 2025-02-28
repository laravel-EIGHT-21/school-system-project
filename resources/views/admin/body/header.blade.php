
<nav class="main-header navbar navbar-expand navbar-light">

    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    
    </ul>
    
    <ul class="navbar-nav ml-auto">
    
    
     
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#"><b>
    <i class="far fa-address-book"></i></b>
    </a>
    
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-item dropdown-header"><b>User Account</b></span>
    
    <div class="dropdown-divider"></div>
    <a href="{{route('profile.view')}}" class="dropdown-item">
    <i class="fas fa-user"></i> User Profile
    </a>
    
    <div class="dropdown-divider"></div>
    <a href="{{route('admin.password.view')}}" class="dropdown-item">
    <i class="fas fa-lock"></i> Change Password
    </a>
    
    
    <div class="dropdown-divider"></div>
    <a href="{{ route('admin.logout') }}" class="dropdown-item dropdown-footer">
    <i class="fas fa-power-off"></i> LogOut
    </a>
    
    
    <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
    <i class="fas fa-expand-arrows-alt"></i>
    </a>
    </li>
    
    </ul>
    </nav>
    