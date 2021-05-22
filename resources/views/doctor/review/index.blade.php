@extends('layouts.doctor')
@section('title') Reviews @endsection
@section('header')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Reviews</h2>
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
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <img src="{{asset('images/doctors/'.$doctor->image)}}" class="img-fluid" alt="Doctor Image">
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">Dr. {{$doctor->name}}</h4>
                            <p class="doc-speciality">{{$doctor->bio}}</p>
                            <p class="doc-department"><img src="{{asset('images/specialities/'.$doctor->speciality->image)}}" class="img-fluid" alt="Speciality">{{$doctor->speciality->name}}</p>
                            @if($doctor->reviews->count()>0)<?php $stars=(($doctor->reviews->sum('rate'))/$doctor->reviews->count())?> @else <?php $stars=0?> @endif
                            <div class="rating">
                                <i class="fas fa-star {{$stars>=1?'filled':''}}"></i>
                                <i class="fas fa-star {{$stars>=2?'filled':''}}"></i>
                                <i class="fas fa-star {{$stars>=3?'filled':''}}"></i>
                                <i class="fas fa-star {{$stars>=4?'filled':''}}"></i>
                                <i class="fas fa-star {{$stars>=5?'filled':''}}"></i>
                                <span class="d-inline-block average-rating">({{$doctor->reviews->count()}})</span>
                            </div>
                            <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->location->name}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="doc-review review-listing">

            <!-- Review Listing -->
            <ul class="comments-list">

                <!-- Comment List -->
                @if(isset($reviews)&&$reviews->count()>0)
                    @foreach($reviews as $review)
                <li>
                    <div class="comment row">
                        <a href="{{route('website.patientprofile',$review->patient->id)}}"><img class="avatar rounded-circle" alt="User Image" src="{{asset('images/patients/'.$review->patient->image)}}"></a>
                        <div class="comment-body col-md-6">
                            <div class="meta-data">
                                <span class="comment-author"><a href="{{route('website.patientprofile',$review->patient->id)}}">{{$review->patient->name}}</a></span>
                                <span class="comment-date">{{$review->patient->created_at->diffForHumans()}}</span>
                            </div>
                            @if($review->rate>2)
                            <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
                            @endif
                            <p class="comment-content">
                               {{$review->message}}
                            </p>
                        </div>

                    <div class="col-md-5">
                        <div class="review-count rating">
                            <i class="fas fa-star {{$review->rate>0?'filled':''}}"></i>
                            <i class="fas fa-star {{$review->rate>1?'filled':''}}"></i>
                            <i class="fas fa-star {{$review->rate>2?'filled':''}}"></i>
                            <i class="fas fa-star {{$review->rate>3?'filled':''}}"></i>
                            <i class="fas fa-star {{$review->rate>4?'filled':''}}"></i>
                        </div>
                    </div>
                    </div>
                </li>
                    @endforeach
                @endif
                <!-- /Comment List -->
            </ul>
            <!-- /Comment List -->

        </div>
    </div>
@endsection