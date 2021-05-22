@extends('layouts.website')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Register">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Patient Register <a href="{{route('doctor.register')}}">Are you a Doctor?</a></h3>
                                </div>

                                <!-- Register Form -->
                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="form-group form-focus @error('name')mb-0 @enderror">
                                        <input type="text" name="name" class="form-control floating @error('name') is-invalid @enderror" value="{{@old('name')}}">
                                        <label class="focus-label">Name</label>
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="form-group form-focus @error('username')mb-0 @enderror">
                                        <input type="text" name="username" class="form-control floating @error('username') is-invalid @enderror" value="{{@old('username')}}">
                                        <label class="focus-label">username</label>
                                    </div>
                                    @error('username')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="form-group form-focus @error('email')mb-0 @enderror">
                                        <input type="text" name="email" class="form-control floating @error('email') is-invalid @enderror" value="{{@old('email')}}">
                                        <label class="focus-label">email</label>
                                    </div>
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror


                                    <div class="form-group form-focus @error('mobile')mb-0 @enderror">
                                        <input type="text" name="mobile" class="form-control floating @error('mobile') is-invalid @enderror" value="{{@old('mobile')}}">
                                        <label class="focus-label">mobile</label>
                                    </div>
                                    @error('mobile')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="form-group form-focus @error('dob')mb-0 @enderror">
                                        <input type="date" name="dob" class="form-control floating @error('dob') is-invalid @enderror" value="{{@old('dob')}}">
                                        <label class="focus-label">Date of birth</label>
                                    </div>
                                    @error('dob')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="form-group form-focus @error('gender')mb-0 @enderror">
                                        <select  name="gender" class="form-control floating @error('gender') is-invalid @enderror">
                                            <option value="{{null}}">Gender</option>
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="form-group form-focus @error('blood')mb-0 @enderror">
                                        <select  name="blood" class="form-control floating @error('blood') is-invalid @enderror">
                                            <option value="{{null}}">Blood Group</option>
                                                <option value="A-">A-</option>
                                                <option value="A+">A+</option>
                                                <option value="B-">B-</option>
                                                <option value="B+">B+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    <?php $cities=\App\Models\City::get(); ?>
                                    <div class="form-group form-focus @error('city')mb-0 @enderror">
                                        <select  name="city" class="form-control floating @error('city') is-invalid @enderror">
                                            <option value="{{null}}">City</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('city')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror


                                    <div class="form-group form-focus @error('password')mb-0 @enderror">
                                        <input type="password" name="password" class="form-control floating @error('password') is-invalid @enderror">
                                        <label class="focus-label">password</label>
                                    </div>
                                    @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="form-group form-focus">
                                        <input type="password" name="password_confirmation" class="form-control floating">
                                        <label class="focus-label">password confirmation</label>
                                    </div>


                                    <div class="text-right">
                                        <a class="forgot-link" href="{{route('login')}}">Already have an account?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->

                </div>
            </div>

        </div>

    </div>
@endsection
