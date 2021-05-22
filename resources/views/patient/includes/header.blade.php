<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
            </a>
            <a href="{{route('home')}}" class="navbar-brand logo">
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{route('home')}}" class="menu-logo">
                    <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('patient')) active @endif">
                    <a href="{{route('patient.dashboard')}}">Dashboard</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +20 114 123456</p>
                </div>
            </li>

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('images/patients/'.Auth::user()->image)}}" width="31" alt="{{Auth::user()->name}}">
								</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{asset('images/patients/'.Auth::user()->image)}}" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="text-muted mb-0">Patient</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{route('patient.dashboard')}}">Dashboard</a>
                    <a class="dropdown-item" href="{{route('patient.getprofile')}}">Profile Settings</a>
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                    <form action="{{route('logout')}}" id="logout" method="post" style="display: none;">@csrf</form>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
    </nav>
</header>
<!-- /Header -->