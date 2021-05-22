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
                    <a href="index-2.html">Home</a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('patient/dashboard')) active @endif">
                    <a href="{{route('patient.dashboard')}}">Dashboard</a>
                </li>
                <li>
                    <a href="index-2.html">favourites</a>
                </li>
                <li>
                    <a href="admin/index.html"></a>
                </li>
                <li class="login-link">
                    <a href="login.html">Login / Signup</a>
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
                    <p class="contact-info-header"> +1 315 369 5943</p>
                </div>
            </li>

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
								</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>Richard Wilson</h6>
                            <p class="text-muted mb-0">Patient</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="patient-dashboard.html">Dashboard</a>
                    <a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
    </nav>
</header>
<!-- /Header -->