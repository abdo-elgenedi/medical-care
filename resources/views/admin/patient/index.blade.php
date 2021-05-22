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


    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">List of Patient</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Last Visit</th>
                                    <th>status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($patients)&&$patients->count()>0)
                                    @foreach($patients as $patient)
                                <tr>
                                    <td>#{{$patient->id}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{route('website.patientprofile',$patient->id)}}" class="avatar avatar-sm mr-2">
                                                <img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$patient->image)}}" alt="User Image">
                                            </a>
                                            <a href="{{route('website.patientprofile',$patient->id)}}">{{$patient->name}}</a>
                                        </h2>
                                    </td>
                                    <td>{{$patient->dob->diffInYears()}} old</td>
                                    <td>{{$patient->location->name}}</td>
                                    <td>{{$patient->mobile}}</td>
                                    <td>{{$patient->appointments[0]->date->format('l d-M-Y')}}</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="{{$patient->id}}" class="status check" {{$patient->status==1?'checked':''}}>
                                            <label for="{{$patient->id}}" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                    url: '{{route('admin.patient.status')}}',
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