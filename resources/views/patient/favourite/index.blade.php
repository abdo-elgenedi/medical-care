@extends('layouts.patient')
@section('title') Favourites @endsection
@section('header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Favourites</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    @endsection

@section('content')
    <!-- Page Content -->
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="row row-grid">
                        @if(isset($favourites)&& $favourites->count()>0)
                            @foreach($favourites as $favourite)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="profile-widget">
                                <div class="doc-img" style="width: 120px">
                                    <a href="{{route('website.doctorprofile',$favourite->doctor->id)}}">
                                        <img class="img-fluid" alt="User Image" src="{{asset('images/doctors/'.$favourite->doctor->image)}}">
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="{{route('website.doctorprofile',$favourite->doctor->id)}}">Dr. {{$favourite->doctor->name}}</a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>
                                    <p class="speciality">{{$favourite->doctor->speciality->name}}</p>
                                    @if($favourite->doctor->reviews->count()>0)<?php $stars=(($favourite->doctor->reviews->sum('rate'))/$favourite->doctor->reviews->count())?> @else <?php $stars=0?> @endif
                                    <div class="rating">
                                        <i class="fas fa-star {{$stars>=1?'filled':''}}"></i>
                                        <i class="fas fa-star {{$stars>=2?'filled':''}}"></i>
                                        <i class="fas fa-star {{$stars>=3?'filled':''}}"></i>
                                        <i class="fas fa-star {{$stars>=4?'filled':''}}"></i>
                                        <i class="fas fa-star {{$stars>=5?'filled':''}}"></i>
                                        <span class="d-inline-block average-rating">({{$favourite->doctor->reviews->count()}})</span>
                                    </div>
                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> {{$favourite->doctor->location->name}}
                                        </li>
                                        <li>
                                            <i class="far fa-money-bill-alt"></i> {{$favourite->doctor->price??'0'}} $ <i class="fas fa-info-circle" data-toggle="tooltip" title="price"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="{{route('website.doctorprofile',$favourite->doctor->id)}}" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('patient.booking',$favourite->doctor->id)}}" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            @else
                            <div class="text-center" style="width: 100%">
                            <h4 class="card p-5">You don't have any doctor in favourites</h4>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->

@endsection