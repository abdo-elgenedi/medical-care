@extends('layouts.admin')

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="messageid" class="modal-body text-center ">
                    <h4 id="message"></h4>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn " data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Appointments</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col-md-12">

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-center mb-0">
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
                            @if(isset($appointments)&&$appointments->count()>0)
                                @foreach($appointments as $appointment)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{route('website.doctorprofile',$appointment->doctor->id)}}" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{asset('images/doctors/'.$appointment->doctor->image)}}" alt="Doctor Image">
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
                                <td>
                                    <div class="status-toggle">
                                        <input type="checkbox" id="{{$appointment->id}}" class="status check" {{$appointment->status==1?'checked':''}}>
                                        <label for="{{$appointment->id}}" class="checktoggle">checkbox</label>
                                    </div>
                                </td>
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
    <script>
        window.onload=function () {
            $(document).ready(function() {
                $('#example').DataTable();
            } );


            $(document).on('click','.status',function (e) {
                e.preventDefault();
                    $.ajax({

                        type: 'post',
                        url: '{{route('admin.appointment.status')}}',
                        data: {
                            'id': $(this).attr('id'),
                            '_token':'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if (data.status == true) {
                                $('#'+data.id).prop('checked',data.value);
                                $("#message").css("color", data.color);
                                $('#message').text(data.message);

                                $('#exampleModal').modal('show');
                            }
                        },
                        error: function (reject) {

                        }
                    })
            });
        }
    </script>

@endsection