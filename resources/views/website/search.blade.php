@extends('layouts.website')

@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

                <div class="col-md-12">
                    @if(isset($doctors)&&$doctors->count()>0)
                        @foreach($doctors as $doctor)
                    <!-- Doctor Widget -->
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left">
                                    <div class="doctor-img">
                                        <a href="{{route('website.doctorprofile',$doctor->id)}}">
                                            <img src="{{asset('images/doctors/'.$doctor->image)}}" class="img-fluid" alt="doctor Image">
                                        </a>
                                    </div>
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name"><a href="{{route('website.doctorprofile',$doctor->id)}}">Dr. {{$doctor->name}}</a></h4>
                                        <p class="doc-speciality">{{$doctor->bio}}</p>
                                        <h5 class="doc-department"><img src="{{asset('images/specialities/'.$doctor->speciality->image)}}" class="img-fluid" alt="Speciality">{{$doctor->speciality->name}}</h5>
                                        @if($doctor->reviews->count()>0)<?php $stars=(($doctor->reviews->sum('rate'))/$doctor->reviews->count())?> @else <?php $stars=0?> @endif
                                        <div class="rating">
                                            <i class="fas fa-star {{$stars>=1?'filled':''}}"></i>
                                            <i class="fas fa-star {{$stars>=2?'filled':''}}"></i>
                                            <i class="fas fa-star {{$stars>=3?'filled':''}}"></i>
                                            <i class="fas fa-star {{$stars>=4?'filled':''}}"></i>
                                            <i class="fas fa-star {{$stars>=5   ?'filled':''}}"></i>
                                            <span class="d-inline-block average-rating">({{$doctor->reviews->count()}})</span>
                                        </div>
                                        <div class="clinic-details">
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->location->name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-comment"></i> {{$doctor->reviews->count()}} Feedback</li>
                                            <li><i class="fas fa-map-marker-alt"></i> {{$doctor->location->name}}</li>
                                            <li><i class="far fa-money-bill-alt"></i> {{$doctor->price==null?'free':$doctor->price.' L.E'}}</li>
                                        </ul>
                                    </div>
                                    <div class="clinic-booking">
                                        <a class="view-pro-btn" href="{{route('website.doctorprofile',$doctor->id)}}">View Profile</a>
                                        <a class="apt-btn" href="{{route('patient.booking',$doctor->id)}}">Book Appointment</a>
                                    </div>
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
    <!-- /Page Content -->


@endsection