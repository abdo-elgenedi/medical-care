@extends('layouts.doctor')
@section('title') Profile Settings @endsection
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
        <form action="{{route('doctor.updateprofile')}}" method="post" enctype="multipart/form-data">
            @csrf
        <!-- Basic Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{asset('images/doctors/'.Auth::user()->image)}}" alt="User Image">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" name="image" class="upload">
                                    </div>
                                    <small class="form-text text-muted">Allowed Images Only.</small>
                                    @error('image')
                                    <span class="form-text text-muted">{{$message}}.</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" value="{{Auth::user()->username}}" class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" id="mobile" value="{{Auth::user()->mobile}}" class="form-control @error('mobile') is-invalid @enderror">
                            @error('mobile')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob">Birth Date <span class="text-danger">*</span></label>
                            <input type="date" name="dob" id="dob" value="{{Auth::user()->dob->format('Y-m-d')}}" class="form-control @error('dob') is-invalid @enderror">
                            @error('dob')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control select @error('gender') is-invalid @enderror">
                                <option>Select</option>
                                <option value="1" {{Auth::user()->gender==1?'selected':''}}>Male</option>
                                <option value="0" {{Auth::user()->gender==0?'selected':''}}>Female</option>
                            </select>
                            @error('gender')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Basic Information -->

        <!-- About Me -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Me</h4>
                <div class="form-group mb-0">
                    <label for="bio">Biography</label>
                    <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="5">{{Auth::user()->bio}}</textarea>
                    @error('bio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    <div class="form-group mt-2">
                        <label for="speciality_id">Speciality</label>
                        <select id="speciality_id" name="speciality_id" class="form-control select @error('speciality_id') is-invalid @enderror">
                            <option>Select</option>
                            @if(isset($specialities)&&$specialities->count()>0)
                                @foreach($specialities as $speciality)
                                    <option value="{{$speciality->id}}" {{Auth::user()->specialty_id==$speciality->id?'selected':''}}>{{$speciality->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('speciality_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="price" id="price" value="{{Auth::user()->price}}" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
        </div>
        <!-- /About Me -->
        <!-- About Me -->
        <div class="card">
            <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="city">Location</label>
                        <select id="city" name="city" class="form-control select @error('city') is-invalid @enderror">
                            <option>Select</option>
                            @if(isset($cities)&&$cities->count()>0)
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{Auth::user()->city==$city->id?'selected':''}}>{{$city->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('city')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
        </div>
        <!-- /About Me -->

        <div class="submit-section submit-btn-bottom">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div>
        </form>
    </div>
@endsection