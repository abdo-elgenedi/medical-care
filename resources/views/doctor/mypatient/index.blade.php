@extends('layouts.doctor')
@section('title') My Patients @endsection
@section('header')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">My Patients</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">

        <div class="row row-grid">
            @if(isset($patients)&&$patients->count()>0)
                @foreach($patients as $patient)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="{{route('website.patientprofile',$patient->patient->id)}}" class="booking-doc-img">
                                    <img src="{{asset('images/patients/'.$patient->patient->image)}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="{{route('website.patientprofile',$patient->patient->id)}}">{{$patient->patient->name}}</a></h3>

                                    <div class="patient-details">
                                        <h5><b>Patient ID :</b> P00{{$patient->patient->id}}</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{\App\Models\City::find($patient->patient->city)->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Phone <span>{{$patient->patient->mobile}}</span></li>
                                <li>Age <span>{{$patient->patient->dob->diffInYears()}} Years, {{$patient->patient->gender==1?'male':'female'}}</span></li>
                                <li>Blood Group <span>{{$patient->patient->blood}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection