<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Profile Sidebar -->
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <a class="booking-doc-img">
                                <img src="{{asset('images/patients/'.Auth::user()->image)}}" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3>{{Auth::user()->name}}</h3>
                                <div class="patient-details">
                                    <h5><i class="fas fa-birthday-cake"></i> {{Auth::user()->dob->format('d M Y')}} , {{Auth::user()->dob->diffInYears()}} years old</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('patient')) active @endif">
                                    <a href="{{route('patient.dashboard')}}">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('patient/favourite')) active @endif">
                                    <a href="{{route('patient.favourite')}}">
                                        <i class="fas fa-bookmark"></i>
                                        <span>Favourites</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('patient/dashboard/profile')) active @endif">
                                    <a href="{{route('patient.getprofile')}}">
                                        <i class="fas fa-user-cog"></i>
                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                                <li class="@if(\Illuminate\Support\Facades\Request::is('patient/dashboard/changepassword')) active @endif">
                                    <a href="{{route('patient.getchangepassword')}}">
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
            </div>
            <!-- / Profile Sidebar -->