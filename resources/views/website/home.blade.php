@extends('layouts.website')

@section('content')

    <!-- Home Banner -->
    <section class="section section-search">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Search Doctor, Make an Appointment</h1>
                    <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
                </div>

                <!-- Search -->
                <div class="search-box">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="form-group search-info">
                            <select class="form-control" name="city">
                                <option value="{{null}}">Select Your Location</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                    </form>
                </div>
                <!-- /Search -->

            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <!-- Clinic and Specialities -->
    <section class="section section-specialities">
        <div class="container-fluid">
            <div class="section-header text-center">
                <h2>Clinic and Specialities</h2>
                <p class="sub-title">We have qualified doctors in many specialties that you need, just locate you and choose from many doctors around you.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <!-- Slider -->
                    <div class="specialities-slider slider">
                    @if(isset($specialities)&&$specialities->count()>0)
                        @foreach($specialities as $speciality)
                        <!-- Slider Item -->
                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{asset('images/specialities/'.$speciality->image)}}" class="img-fluid" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>{{$speciality->name}}</p>
                        </div>
                        <!-- /Slider Item -->
                        @endforeach
                    @endif
                    </div>
                    <!-- /Slider -->

                </div>
            </div>
        </div>
    </section>
    <!-- Clinic and Specialities -->

    <!-- Popular Section -->
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header ">
                        <h2>Book Our Doctor</h2>
                        <p>Our Suggestions </p>
                    </div>
                    <div class="about-content">
                        <p>You can choose from the doctors suggested for you, before anything you can go to the profile to see the comments and comments of other customers.</p>
                        <p>You can also make a reservation and the available appointments for this doctor will appear to you, and you can confirm the reservation at any available date you want, we are pleased to serve you and your contribution to the evaluation of our doctors.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider">

                        @if(isset($doctors)&&$doctors->count()>0)
                            @foreach($doctors as $doctor)
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="{{route('website.doctorprofile',$doctor->id)}}">
                                    <img class="img-fluid" alt="User Image" src="{{asset('images/doctors/'.$doctor->image)}}">
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="{{route('website.doctorprofile',$doctor->id)}}">{{$doctor->name}}</a>
                                    <i class="fas fa-check-circle verified"></i>
                                </h3>
                                <p class="speciality">{{$doctor->speciality->name}}</p>
                                <p class="speciality">{{$doctor->bio}}</p>
                                @if($doctor->reviews->count()>0)<?php $stars=(($doctor->reviews->sum('rate'))/$doctor->reviews->count())?> @else <?php $stars=0?> @endif
                                <div class="rating">
                                    <i class="fas fa-star {{$stars>=1?'filled':''}}"></i>
                                    <i class="fas fa-star {{$stars>=2?'filled':''}}"></i>
                                    <i class="fas fa-star {{$stars>=3?'filled':''}}"></i>
                                    <i class="fas fa-star {{$stars>=4?'filled':''}}"></i>
                                    <i class="fas fa-star {{$stars>=5?'filled':''}}"></i>
                                    <span class="d-inline-block average-rating">({{$doctor->reviews->count()}})</span>
                                </div>
                                <ul class="available-info">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> {{$doctor->location->name}}
                                    </li>
                                    <li>
                                        <i class="far fa-money-bill-alt"></i> {{$doctor->price}} L.E
                                        <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                    </li>
                                </ul>
                                <div class="row row-sm">
                                    <div class="col-6">
                                        <a href="{{route('website.doctorprofile',$doctor->id)}}" class="btn view-btn">View Profile</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('patient.booking',$doctor->id)}}" class="btn book-btn">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctor Widget -->
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Popular Section -->

    <!-- Availabe Features -->
    <section class="section section-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 features-img">
                    <img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
                </div>
                <div class="col-md-7">
                    <div class="section-header">
                        <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                    </div>
                    <div class="features-slider slider">
                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
                            <p>Patient Ward</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
                            <p>Test Room</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
                            <p>ICU</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
                            <p>Laboratory</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
                            <p>Operation</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
                            <p>Medical</p>
                        </div>
                        <!-- /Slider Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>


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
    <!-- Availabe Features -->
    <script>
        window.onload=function () {


            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }

        }
    </script>
    @endsection