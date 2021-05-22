@extends('layouts.doctor')
@section('title') Dashboard @endsection
@section('header')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">

        <div class="row">
            <div class="col-md-12">
                <div class="card dash-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar1">
                                        <div class="circle-graph1" data-percent="75">
                                            <img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Total Patient</h6>
                                        <h3>{{isset($patients)?$patients->count():'0'}}</h3>
                                        <p class="text-muted">Till Today</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar2">
                                        <div class="circle-graph2" data-percent="65">
                                            <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Today Appointments</h6>
                                        <h3>{{isset($todayAppointments)?$todayAppointments->count():'0'}}</h3>
                                        <p class="text-muted">{{\Illuminate\Support\Carbon::today()->format('D , d-m-Y')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget">
                                    <div class="circle-bar circle-bar3">
                                        <div class="circle-graph3" data-percent="50">
                                            <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Appoinments</h6>
                                        <h3>{{isset($pastAppointments)&&isset($upcomingAppointments)?$pastAppointments->count()+$upcomingAppointments->count():'0'}}</h3>
                                        <p class="text-muted">{{\Illuminate\Support\Carbon::today()->addWeeks(2)->format('D , d-m-Y')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Patient Appointments</h4>
                <div class="appointment-tab">

                    <!-- Appointment Tab -->
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                        <li class="nav-item">
                            <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#past-appointments" data-toggle="tab">Past</a>
                        </li>
                    </ul>
                    <!-- /Appointment Tab -->

                    <div class="tab-content">

                        <!-- Upcoming Appointment Tab -->
                        <div class="tab-pane show active" id="upcoming-appointments">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    @if(isset($upcomingAppointments)&&$upcomingAppointments->count()>0)
                                    <div class="p-3">
                                        <table id="example" class="table table-hover table-center mb-0">
                                            <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Appt Date</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($upcomingAppointments as $appointment)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{route('website.patientprofile',$appointment->patient->id)}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$appointment->patient->image)}}" alt="User Image"></a>
                                                        <a href="{{route('website.patientprofile',$appointment->patient->id)}}">{{$appointment->patient->name}}<span>{{$appointment->id}}</span></a>
                                                    </h2>
                                                </td>
                                                <td>{{$appointment->date->format('D , d-m-Y')}}</td>
                                                <td><span class="badge badge-pill bg-{{$appointment->status==0?'danger':'success'}}-light">{{$appointment->status==0?'cancelled':'confirmed'}}</span></td>
                                                <td>{{Auth::user()->price??'0'}} L.E</td>
                                                <td class="">
                                                    <div class="table-action">
                                                        @if($appointment->status==0)
                                                        <a href="{{route('doctor.appointment.status',$appointment->id)}}" class="btn btn-sm bg-success-light">
                                                            <i class="fas fa-check"></i> Accept
                                                        </a>
                                                        @else
                                                        <a href="{{route('doctor.appointment.status',$appointment->id)}}" class="btn btn-sm bg-danger-light">
                                                            <i class="fas fa-times"></i> Cancel
                                                        </a>
                                                            @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Upcoming Appointment Tab -->

                        <!-- Today Appointment Tab -->
                        <div class="tab-pane" id="today-appointments">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    @if(isset($todayAppointments)&&$todayAppointments->count()>0)
                                        <div class="p-3">
                                            <table id="example1" class="table table-hover table-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Appt Date</th>
                                                    <th>Status</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($todayAppointments as $appointment)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="{{route('website.patientprofile',$appointment->patient->id)}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$appointment->patient->image)}}" alt="User Image"></a>
                                                                <a href="{{route('website.patientprofile',$appointment->patient->id)}}">{{$appointment->patient->name}}<span>{{$appointment->id}}</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>{{$appointment->date->format('D , d-m-Y')}}</td>
                                                        <td><span class="badge badge-pill bg-{{$appointment->status==0?'danger':'success'}}-light">{{$appointment->status==0?'cancelled':'confirmed'}}</span></td>
                                                        <td>{{Auth::user()->price??'0'}} L.E</td>
                                                        <td class="">
                                                            <div class="table-action">
                                                                @if($appointment->status==0)
                                                                    <a href="{{route('doctor.appointment.status',$appointment->id)}}" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                @else
                                                                    <a href="{{route('doctor.appointment.status',$appointment->id)}}" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Today Appointment Tab -->

                        <div class="tab-pane" id="past-appointments">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    @if(isset($pastAppointments)&&$pastAppointments->count()>0)
                                        <div class="p-3">
                                            <table id="example2" class="table table-hover table-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Appt Date</th>
                                                    <th>Status</th>
                                                    <th>Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($pastAppointments as $appointment)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="{{route('website.patientprofile',$appointment->patient->id)}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$appointment->patient->image)}}" alt="User Image"></a>
                                                                <a href="{{route('website.patientprofile',$appointment->patient->id)}}">{{$appointment->patient->name}}<span>{{$appointment->id}}</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>{{$appointment->date->format('D , d-m-Y')}}</td>
                                                        <td><span class="badge badge-pill bg-{{$appointment->status==0?'danger':'success'}}-light">{{$appointment->status==0?'cancelled':'confirmed'}}</span></td>
                                                        <td>{{Auth::user()->price??'0'}} L.E</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Today Appointment Tab -->

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('modals')
    @if(Session::has('message'))
        <div class="modal fade" id="redirect" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2 text-center">
                            <h5 class="mb-4" style="color: {{Session::get('color')}};">{{Session::get('message')}}</h5>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.onload=function () {


            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }

            $(document).ready(function() {
                $('#example').DataTable();
            } );
            $(document).ready(function() {
                $('#example1').DataTable();
            } );
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        }
    </script>
@endsection