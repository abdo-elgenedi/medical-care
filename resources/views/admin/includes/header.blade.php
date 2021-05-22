

<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{route('admin.index')}}" class="logo">
            <img src="{{asset('admin/assets/img/logo.png')}}" alt="Logo">
        </a>
        <a href="{{route('admin.index')}}" class="logo logo-small">
            <img src="{{asset('admin/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="{{asset('images/admins/'.Auth::user()->image)}}" width="31" alt="admin"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{asset('images/admins/'.Auth::user()->image)}}" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{Auth::user()->name}}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->