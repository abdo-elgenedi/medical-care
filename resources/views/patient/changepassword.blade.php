@extends('layouts.patient')
@section('title') Change Password @endsection
@section('header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Change Password</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    @endsection
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <!-- Change Password Form -->
                        <form action="{{route('patient.updatepassword')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                        <!-- /Change Password Form -->

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
        }
    </script>
@endsection
