@extends('layouts.website')

@section('content')
    <!-- Page Content -->
    <div class="content" style="min-height: 650px">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{asset('assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Patient <span>Login</span> <a href="{{route('doctor.getlogin')}}">Login as doctor?</a></h3>
                                </div>
                                @if(Session::has('message'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ Session::get('message') }}</strong>
                                    </span>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="email" name="email" class="form-control floating">
                                        <label class="focus-label">Email</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" name="password" class="form-control floating">
                                        <label class="focus-label">Password</label>
                                    </div>
                                    <div class="text-right">
                                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
