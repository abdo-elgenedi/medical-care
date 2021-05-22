@extends('layouts.website')

@section('content')


    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
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
                                <p class="doc-department"><img src="{{asset('images/specialities/'.$doctor->speciality->image)}}" class="img-fluid" alt="Speciality">Dentist</p>
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
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-comment"></i> {{$doctor->reviews->count()}} Feedback</li>
                                    <li><i class="fas fa-map-marker-alt"></i> {{$doctor->location->name}}</li>
                                    <li><i class="far fa-money-bill-alt"></i> {{$doctor->price==null?'free':$doctor->price.' L.E'}}</li>
                                </ul>
                            </div>
                            <div class="doctor-action">
                                @auth('web')
                                    <?php ($fav=\App\Models\Favourite::where('p_id',Auth::user()->id)->where('d_id',$doctor->id)->count()); ?>
                                    <a href="{{route('patient.favourite.add',$doctor->id)}}" class="btn btn-{{$fav>0?'danger':'white'}} fav-btn">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                @endauth
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{route('patient.booking',$doctor->id)}}">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">

                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade show active">

                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">

                                    @if(isset($doctor->reviews) && $doctor->reviews->count()>0)
                                        @foreach($doctor->reviews as $review)
                                    <!-- Comment List -->
                                    <li>
                                        <div class="comment">
                                            <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('images/patients/'.$review->patient->image)}}">
                                            <div class="comment-body row" style="width: 100%">
                                                <div class="col-md-7">
                                                <div class="meta-data">
                                                    <span class="comment-author">{{$review->patient->name}}</span>
                                                    <span class="comment-date">{{$review->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p class="comment-content">
                                                    {{$review->message}}
                                                </p>
                                                </div>
                                                <div class="review-count rating col-md-5">
                                                    <i class="fas fa-star {{$review->rate>=1?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$review->rate>=2?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$review->rate>=3?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$review->rate>=4?'filled':''}}"></i>
                                                    <i class="fas fa-star {{$review->rate>=5?'filled':''}}"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @auth()
                                        @if($review->patient->id==Auth::user()->id)
                                            <div class="text-right">
                                                <a href="#edit-review" data-toggle="modal" data-d_id="{{$doctor->id}}" data-message="{{$review->message}}" class="edit-review btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="#delete-review" data-toggle="modal" data-d_id="{{$doctor->id}}" class="delete-review btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                            @endif
                                        @endauth()
                                    </li>
                                    <!-- /Comment List -->
                                        @endforeach
                                        @endif

                                </ul>

                            </div>
                            <!-- /Review Listing -->

                            <!-- Write Review -->
                            <div class="write-review">
                                @auth('web')
                                    <?php $review=\App\Models\Review::where('p_id',Auth::user()->id)->where('d_id',$doctor->id)->count(); ?>
                                @if($review<=0)
                                <h4>Write a review for <strong>Dr. {{$doctor->name}}</strong></h4>

                                <!-- Write Review Form -->
                                   <form action="{{route('patient.review.add')}}" method="post">
                                        @csrf
                                       <input type="hidden" name="d_id" value="{{$doctor->id}}">
                                    <div class="form-group row pl-3">
                                        <label class="font-weight-bold text-danger mr-3 mt-1">Rating :</label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="rating" value="5">
                                            <label for="star-5" title="5 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-4" type="radio" name="rating" value="4">
                                            <label for="star-4" title="4 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-3" type="radio" name="rating" value="3">
                                            <label for="star-3" title="3 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-2" type="radio" name="rating" value="2">
                                            <label for="star-2" title="2 stars">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                            <input id="star-1" type="radio" name="rating" value="1">
                                            <label for="star-1" title="1 star">
                                                <i class="active fa fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Your review</label>
                                        <textarea id="review_desc" maxlength="100" name="message" class="form-control"></textarea>

                                        <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                                    </div>
                                    <hr>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                    </div>
                                </form>
                                <!-- /Write Review Form -->
                                    @else
                                            <div>You are reviewed this doctor</div>
                                    @endif
                                    @else
                                    <div>Please login to review this doctor</div>
                                    @endauth
                            </div>
                            <!-- /Write Review -->

                        </div>
                        <!-- /Reviews Content -->

                        <!-- Business Hours Content -->
                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <!-- Business Hours Widget -->
                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            @if(isset($doctor->schedule)&& $doctor->schedule->count()>0)
                                                @foreach($doctor->schedule as $schedule)
                                            <div class="listing-hours">
                                                <div class="listing-day">
                                                    <div class="day">@if($schedule->day==1) Saturday @elseif($schedule->day==2) Sunday @elseif($schedule->day==3) Monday @elseif($schedule->day==4) Tuesday
                                                        @elseif($schedule->day==5) Wednesday @elseif($schedule->day==6) Thursday @elseif($schedule->day==7) Friday @endif</div>
                                                    <div class="time-items">
                                                        @if($schedule->status==1)
                                                            <span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
                                                        @else
                                                            <span class="closed-status"><span class="badge bg-danger-light">Closed</span></span>
                                                        @endif
                                                        <span class="time">{{$schedule->time}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                                    <hr>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /Business Hours Widget -->

                                </div>
                            </div>
                        </div>
                        <!-- /Business Hours Content -->

                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->

        </div>
    </div>
    <!-- /Page Content -->


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


    <div class="modal fade custom-modal" id="edit-review">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('patient.review.edit')}}" method="post">
                        @csrf
                        <input type="hidden" id="d_id" name="d_id">
                        <div class="form-group row pl-3">
                            <label class="font-weight-bold text-danger mr-3 mt-1">Rating :</label>
                            <div id="rate" class="star-rating">
                                <input id="star-5" type="radio" name="rating" value="5">
                                <label for="star-5" title="5 stars">
                                    <i class="active fa fa-star "></i>
                                </label>
                                <input id="star-4" type="radio" name="rating" value="4">
                                <label for="star-4" title="4 stars">
                                    <i class="active fa fa-star"></i>
                                </label>
                                <input id="star-3" type="radio" name="rating" value="3">
                                <label for="star-3" title="3 stars">
                                    <i class="active fa fa-star"></i>
                                </label>
                                <input id="star-2" type="radio" name="rating" value="2">
                                <label for="star-2" title="2 stars">
                                    <i class="active fa fa-star"></i>
                                </label>
                                <input id="star-1" type="radio" name="rating" value="1">
                                <label for="star-1" title="1 star">
                                    <i class="active fa fa-star"></i>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Your review</label>
                            <textarea id="message" maxlength="100" name="message" class="form-control"></textarea>

                            <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                        </div>
                        <hr>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Update Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade custom-modal" id="delete-review">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-danger text-center">Are you sure to delete this review ?</h5>
                    <form action="{{route('patient.review.delete')}}" method="post" class="p-5">
                        @csrf
                        <input type="hidden" id="d_id" name="d_id">
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger mt-3 mr-3">Delete</button>
                            <button data-dismiss="modal" class="btn btn-primary mt-3 ml-3">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload=function () {

            $('.edit-review').on('click', function(e) {
                  var message=$(this).data('message');
                  var d_id=$(this).data('d_id');

                $("#edit-review #message").text(message);
                $("#edit-review #d_id").val(d_id);
            });

            $('.delete-review').on('click', function(e) {
                var d_id=$(this).data('d_id');
                $("#delete-review #d_id").val(d_id);
            });

            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }
        }
    </script>

    @endsection