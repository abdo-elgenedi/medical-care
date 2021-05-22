@extends('layouts.admin')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="Admin Image" src="{{asset('images/admins/'.Auth::user()->image)}}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{Auth::user()->name}}</h4>
                        <hr>
                        <h6 class="text-muted">{{Auth::user()->email}}</h6>
                        <hr>
                        <div class="about-text">An administrator at doccure's company website .</div>
                    </div>
                    <div class="col-auto profile-btn">

                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" id="password-tab" href="#password_tab">Password</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">

                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">

                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span>
                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                        <p class="col-sm-10">{{Auth::user()->name}}</p>
                                    </div>
                                   <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Username</p>
                                        <p class="col-sm-10">{{Auth::user()->username}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                        <p class="col-sm-10">{{Auth::user()->email}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                        <p class="col-sm-10">{{Auth::user()->mobile}}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Details Modal -->
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Personal Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.updateprofile')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row form-row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{Auth::user()->name}}">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{Auth::user()->username}}">
                                                            @error('username')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}">
                                                            @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="mobile">Mobile</label>
                                                            <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{Auth::user()->mobile}}">
                                                            @error('mobile')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="form-title"><span>Profile Image</span></h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose image</label>
                                                            <small class="form-text text-muted">Allowed Images Only.</small>
                                                            @error('image')
                                                            <span class="text-danger">{{$message}}.</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Edit Details Modal -->

                        </div>


                    </div>
                    <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form action="{{route('admin.updatepassword')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="old-password">Old Password</label>
                                            <input name="oldpassword" id="old-password" type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Change Password Tab -->

            </div>
        </div>
    </div>
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
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            if('{{!Session::has('passworderror')&&$errors->count()>0?true:false}}'){
                $('#edit_personal_details').modal('show');
            }

            if('{{Session::has('passworderror')?true:false}}'){
                $('#password-tab').click();
            }

            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }

        }
    </script>

@endsection