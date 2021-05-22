@extends('layouts.patient')
@section('title') Profile @endsection
@section('header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Profile Settings</h2>
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

                <!-- Profile Settings Form -->
                <form action="{{route('patient.updateprofile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">
                                        <img src="{{asset('images/patients/'.Auth::user()->image)}}" alt="User Image">
                                    </div>
                                    <div class="upload-img">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" name="image" class="upload">
                                        </div>
                                        <small class="form-text text-muted">Allowed images only</small>
                                        @error('image')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{Auth::user()->username}}">
                                @error('username')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <div>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{Auth::user()->dob->format('Y-m-d')}}">
                                    @error('dob')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Blood Group</label>
                                <select class="form-control select @error('blood') is-invalid @enderror" name="blood">
                                    <option value="A-" @if(Auth::user()->blood=="A-") selected @endif>A-</option>
                                    <option value="A+" @if(Auth::user()->blood=="A+") selected @endif>A+</option>
                                    <option value="B-" @if(Auth::user()->blood=="B-") selected @endif>B-</option>
                                    <option value="B+" @if(Auth::user()->blood=="B+") selected @endif>B+</option>
                                    <option value="AB-" @if(Auth::user()->blood=="AB-") selected @endif>AB-</option>
                                    <option value="AB+" @if(Auth::user()->blood=="AB+") selected @endif>AB+</option>
                                    <option value="O-" @if(Auth::user()->blood=="O-") selected @endif>O-</option>
                                    <option value="O+" @if(Auth::user()->blood=="O+") selected @endif>O+</option>
                                </select>
                                @error('blood')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control select @error('gender') is-invalid @enderror" name="gender">
                                    <option value="1" @if(Auth::user()->gender==1) selected @endif>Male</option>
                                    <option value="0" @if(Auth::user()->gender==0) selected @endif>Female</option>
                                </select>
                                @error('gender')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Email ID</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" value="{{Auth::user()->mobile}}" class="form-control @error('mobile') is-invalid @enderror">
                                @error('mobile')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
                <!-- /Profile Settings Form -->

            </div>
        </div>
    </div>

@endsection