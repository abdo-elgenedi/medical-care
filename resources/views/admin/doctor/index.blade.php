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
                <h3 class="page-title">List of Doctors</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class=" table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Speciality</th>
                                <th>Member Since</th>
                                <th>Earned</th>
                                <th>Account Status</th>

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

                                <td>{{$doctor->created_at->format('l d-M-Y')}} <br><small>{{$doctor->created_at->format('g:i A')}}</small></td>

                                <td>{{$doctor->appointments->count()*$doctor->price}} L.E</td>

                                <td>
                                    <div class="status-toggle">
                                        <input type="checkbox" id="{{$doctor->id}}" class="status check" {{$doctor->status==1?'checked':''}}>
                                        <label for="{{$doctor->id}}" class="checktoggle">checkbox</label>
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
    <!-- /Delete Modal -->
    <script>
        window.onload=function () {
            $(document).ready(function() {
                $('#example').DataTable();
            } );


            $(document).on('click','.status',function (e) {
                e.preventDefault();
                $.ajax({

                    type: 'post',
                    url: '{{route('admin.doctor.status')}}',
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