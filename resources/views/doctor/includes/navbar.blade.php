<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <div href="#" class="booking-doc-img">
                                <img src="{{asset('images/doctors/'.Auth::user()->image)}}" alt="Doctor Image">
                            </div>
                            <div class="profile-det-info">
                                <h3>Dr. {{Auth::user()->name}}</h3>

                                <div class="patient-details">
                                    <h5 class="mb-0">{{Auth::user()->bio}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('doctor')) active @endif">
                                    <a href="{{route('doctor.index')}}">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('doctor/dashboard/mypatient*')) active @endif">
                                    <a href="{{route('doctor.mypatient')}}">
                                        <i class="fas fa-user-injured"></i>
                                        <span>My Patients</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('doctor/schedule*')) active @endif">
                                    <a href="{{route('doctor.schedule')}}">
                                        <i class="fas fa-hourglass-start"></i>
                                        <span>Schedule Timings</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('doctor/dashboard/review*')) active @endif">
                                    <a href="{{route('doctor.review')}}">
                                        <i class="fas fa-star"></i>
                                        <span>Reviews</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('doctor/dashboard/profile*')) active @endif">
                                    <a href="{{route('doctor.getprofile')}}">
                                        <i class="fas fa-user-cog"></i>
                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('doctor/dashboard/changepassword*')) active @endif">
                                    <a href="{{route('doctor.changepassword')}}">
                                        <i class="fas fa-lock"></i>
                                        <span>Change Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="{ event.preventDefault();
                                    document.getElementById('logout').submit();
                                            }">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                        <form action="{{route('logout')}}" method="post" style="display: none;">@csrf</form>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Profile Sidebar -->

            </div>