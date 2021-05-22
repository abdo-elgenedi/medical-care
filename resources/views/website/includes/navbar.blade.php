<!-- Page Content -->
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
            <li>
                <a href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a href="{{route('doctor.index')}}">Doctor</a>
            </li>
            <li>
                <a href="{{route('patient.dashboard')}}">Patient</a>
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
        @if(Auth::guard('web')->check())
            <li> <a>{{Auth::user()->name}}</a></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{route('logout')}}" method="post" id="logout-form" style="display: none">
                            @csrf
                        </form>
                    </li>
        @elseif(Auth::guard('doctor')->check())
            <li> <a>{{Auth::guard('doctor')->user()->name}}</a></li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form action="{{route('logout')}}" method="post" id="logout-form" style="display: none">
                    @csrf
                </form>
            </li>
           @else
            <li class="nav-item">
            <a class="nav-link header-login" href="{{route('login')}}">login / Signup </a>
        </li>
            @endif
    </ul>
</nav>