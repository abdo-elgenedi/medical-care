@extends('layouts.patient')
@section('title') Booking @endsection
@section('header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Booking</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    @endsection

@section('content')

    <!-- Page Content -->
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body pt-0">

                <!-- Page Content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="booking-doc-info">
                                            <a href="{{route('website.doctorprofile',$doctor->id)}}" class="booking-doc-img">
                                                <img src="{{asset('images/doctors/'.$doctor->image)}}" alt="doctor Image">
                                            </a>
                                            <div class="booking-info">
                                                <h4><a href="{{route('website.doctorprofile',$doctor->id)}}">Dr. {{$doctor->name}}</a></h4>
                                                @if($doctor->reviews->count()>0)<?php $stars=(($doctor->reviews->sum('rate'))/$doctor->reviews->count())?> @else <?php $stars=0?> @endif
                                                <div class="rating">
                                                    <i class="fas fa-star {{$stars>=1?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$stars>=2?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$stars>=3?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$stars>=4?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$stars>=5?'filled':''}}"></i>
                                                    <span class="d-inline-block average-rating">({{$doctor->reviews->count()}})</span>
                                                </div>
                                                <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$doctor->location->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schedule Widget -->
                                <div class="card booking-schedule schedule-widget" style="align-items: center">
                                    <h3 class="card p-3 m-3" style="background-color: #15558d; color: whitesmoke">Choose From The Available Days</h3>
                                   <div class="card m-3 p-5" style="max-height: 400px; overflow-y: scroll;width: 600px; border: solid 1px">
                                        @foreach($calender as $cal)
                                            <div class=" card m-2" @if($cal['availability']==0) style="opacity: .5" @endif>
                                                <div class="text-center">
                                                   <p class=" text-center" style="font-weight: bold"> <span class="text-info">{{$cal['date']->format('l')}}</span>: {{$cal['date']->format('d-m-Y')}}</p>
                                                    @if($cal['availability']==0)
                                                        <p class=" text-center "> Not Available</p>
                                                    @else
                                                        <p class="text-center text-info" style="font-weight: bold">Time : {{$cal['time']}}</p>
                                                        <a data-toggle="modal" data-did="{{$doctor->id}}" data-date="{{$cal['date']}}" data-dateformat="{{$cal['date']->format('l d-m-Y')}}"
                                                          data-time="{{$cal['time']}}" href="#booking_confirmation" class="btn text-center mb-3 book" style="background-color: green; color: #fafafa;">Book Now</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                   </div>
                                </div>
                                <!-- /Schedule Widget -->

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Page Content -->

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


    <div class="modal fade custom-modal" id="booking_confirmation">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('patient.booking.confirm')}}" method="post">
                        @csrf
                        <input type="hidden" name="d_id" id="d_id">
                        <input type="hidden" name="date" id="date">
                        <p><span class="text-info col-md-8" style="font-weight: bold">Date : </span><span id="date_format"></span></p>
                        <p><span class="text-info col-md-4" style="font-weight: bold">Time : </span><span id="time"></span></p>
                        <h4 class="text-danger p-3">Confirm Your Appointment</h4>
                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload=function () {

            $('.book').on('click', function(e) {
                var did=$(this).data('did'),
                 time=$(this).data('time'),
                dateformat=$(this).data('dateformat'),
                date=$(this).data('date');

                $("#booking_confirmation #d_id").val(did);
                $("#booking_confirmation #date").val(date);
                $("#booking_confirmation #time").text(time);
                $("#booking_confirmation #date_format").text(dateformat);
            });

            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }
        }
    </script>
    @endsection