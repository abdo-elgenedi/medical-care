<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/dashboard')) active @endif">
                    <a href="{{route('admin.index')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/appointment')) active @endif">
                    <a href="{{route('admin.appointment')}}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/speciality')) active @endif">
                    <a href="{{route('admin.speciality')}}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/doctor')) active @endif">
                    <a href="{{route('admin.doctor')}}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/patient')) active @endif">
                    <a href="{{route('admin.patient')}}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/review')) active @endif">
                    <a href="{{route('admin.review')}}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li class="@if(\Illuminate\Support\Facades\Request::is('admin/dashboard/profile*')) active @endif">
                    <a href="{{route('admin.getprofile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">