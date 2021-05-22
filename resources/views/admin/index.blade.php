@extends('layouts.admin')
@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Welcome <span class="text-info">{{Auth::user()->name}}!</span></h3>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
                    <div class="dash-count">
                        <h3>{{isset($doctors)&&$doctors->count()>0?$doctors->count():''}}</h3>
                    </div>
                </div>
                <div class="dash-widget-info">
                    <h6 class="text-muted">Doctors</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
                    <div class="dash-count">
                        <h3>{{isset($patients)&&$patients->count()>0?$patients->count():''}}</h3>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h6 class="text-muted">Patients</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
                    <div class="dash-count">
                        <h3>{{isset($appointments)&&$appointments->count()>0?$appointments->count():''}}</h3>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h6 class="text-muted">Appointment</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
                    <div class="dash-count">
                        <h3>{{isset($revenue)?$revenue:'0'}} L.E</h3>
                    </div>
                </div>
                <div class="dash-widget-info">

                    <h6 class="text-muted">Revenue</h6>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning w-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-6">
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex">

        <!-- Recent Orders -->
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h4 class="card-title">Doctors List (Sample)</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Speciality</th>
                            <th>Earned</th>
                            <th>Reviews</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($doctors)&&$doctors->count()>0)
                            @foreach($doctors as $doctor)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{route('website.doctorprofile',$doctor->id)}}" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="{{asset('images/doctors/'.$doctor->image)}}" alt="Doctor Image">
                                    </a>
                                    <a href="{{route('website.doctorprofile',$doctor->id)}}">Dr. {{$doctor->name}}</a>
                                </h2>
                            </td>
                            <td>{{$doctor->speciality->name}}</td>
                            <td>{{$doctor->appointments->count()*$doctor->price}} L.E</td>
                            @if($doctor->reviews->count()>0)<?php $stars=(($doctor->reviews->sum('rate'))/$doctor->reviews->count())?> @else <?php $stars=0?> @endif
                            <td class="rating">
                                <i class="fe fe-star {{$stars>=1?'text-warning':'text-secondary'}}"></i>
                                <i class="fe fe-star {{$stars>=2?'text-warning':'text-secondary'}}"></i>
                                <i class="fe fe-star {{$stars>=3?'text-warning':'text-secondary'}}"></i>
                                <i class="fe fe-star {{$stars>=4?'text-warning':'text-secondary'}}"></i>
                                <i class="fe fe-star {{$stars>=5?'text-warning':'text-secondary'}}"></i>
                                <span class="d-inline-block average-rating">({{$doctor->reviews->count()}})</span>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Recent Orders -->

    </div>
    <div class="col-md-6 d-flex">

        <!-- Feed Activity -->
        <div class="card  card-table flex-fill">
            <div class="card-header">
                <h4 class="card-title">Patients List (Sample)</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Phone</th>
                            <th>Appts</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($patients)&&$patients->count()>0)
                            @foreach($patients as $patient)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{route('website.patientprofile',$patient->id)}}" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$patient->image)}}" alt="User Image">
                                    </a>
                                    <a href="{{route('website.patientprofile',$patient->id)}}">{{$patient->name}} </a>
                                </h2>
                            </td>
                            <td>{{$patient->mobile}}</td>
                            <td>{{$patient->appointments->count()}}</td>
                            <td><span class="badge badge-pill bg-{{$patient->status==0?'danger':'success'}}-light">{{$patient->status==0?'Blocked':'Active'}}</span></td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Feed Activity -->

    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!-- Recent Orders -->
        <div class="card card-table">
            <div class="card-header">
                <h4 class="card-title">Appointment List (Sample)</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Speciality</th>
                            <th>Patient Name</th>
                            <th>Apointment Time</th>
                            <th>Status</th>
                            <th class="text-right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($sampleAppointments)&&$sampleAppointments->count()>0)
                            @foreach($sampleAppointments as $appointment)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="{{asset('images/doctors/'.$appointment->doctor->image)}}" alt="User Image">
                                    </a>
                                    <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}">Dr. {{$appointment->doctor->name}}</a>
                                </h2>
                            </td>
                            <td>{{$appointment->doctor->speciality->name}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{route('website.patientprofile',$appointment->patient->id)}}" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$appointment->patient->image)}}" alt="User Image">
                                    </a>
                                    <a href="{{route('website.patientprofile',$appointment->patient->id)}}">{{$appointment->patient->name}} </a>
                                </h2>
                            </td>
                            <td>{{$appointment->date->format('l , d-m-Y')}}</td>
                            <td><span class="badge badge-pill bg-{{$appointment->status==0?'danger':'success'}}-light">{{$appointment->status==0?'Cancelled':'Confirmed'}}</span></td>
                            <td class="text-right">
                                {{$appointment->doctor->price}} L.E
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Recent Orders -->

    </div>
</div>
@endsection