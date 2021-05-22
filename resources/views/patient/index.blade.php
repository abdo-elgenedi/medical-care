@extends('layouts.patient')
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
    <style>

    </style>
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body pt-0">

                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Upcoming Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Past Appointments</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->

                <!-- Tab Content -->
                <div class="tab-content pt-0">

                    <!-- Appointment Tab -->
                    <div id="pat_appointments" class="tab-pane fade show active">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                    <table id="example" class="table table-hover table-center " >
                                        <thead>
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Appt Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($upcomingAppointments as $appointment)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{asset('images/doctors/'.$appointment->doctor->image)}}" alt="Doctor Image">
                                                    </a>
                                                    <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}">Dr. {{$appointment->doctor->name}} <span>{{$appointment->doctor->speciality->name}}</span></a>
                                                </h2>
                                            </td>
                                            <td><span class="text-info">{{$appointment->date->format('l')}} : </span>{{$appointment->date->format('d-m-Y')}} <span class="d-block text-info">
                                                    @foreach($appointment->doctor->schedule as $day) {{$day->day==$appointment->date->dayName?$day->time:''}} @endforeach</span></td>
                                            <td>{{$appointment->doctor->price??'0'}} L.E</td>
                                            <td><span class="badge badge-pill bg-{{$appointment->status==0?'danger':'success'}}-light">{{$appointment->status==0?'cancelled':'confirmed'}}</span></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Appointment Tab -->

                    <!-- Prescription Tab -->
                    <div class="tab-pane fade" id="pat_prescriptions">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <table id="example1" class="table table-hover table-center " >
                                    <thead>
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Appt Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pastAppointments as $appointment)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="{{asset('images/doctors/'.$appointment->doctor->image)}}" alt="Doctor Image">
                                                    </a>
                                                    <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}">Dr. {{$appointment->doctor->name}} <span>{{$appointment->doctor->speciality->name}}</span></a>
                                                </h2>
                                            </td>
                                            <td><span class="text-info">{{$appointment->date->format('l')}} : </span>{{$appointment->date->format('d-m-Y')}} <span class="d-block text-info">
                                                    @foreach($appointment->doctor->schedule as $day) {{$day->day==$appointment->date->dayName?$day->time:''}} @endforeach</span></td>
                                            <td>{{$appointment->doctor->price??'0'}} L.E</td>
                                            <td><span class="badge badge-pill bg-{{$appointment->status==0?'danger':'success'}}-light">{{$appointment->status==0?'cancelled':'confirmed'}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Prescription Tab -->

                </div>
                <!-- Tab Content -->

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
        }
    </script>
    @endsection