@extends('layouts.website')

@section('content')


    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Patient Profile</h2>
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
                            <div class="mr-5" style="width: 250px;">
                                <img src="{{asset('images/patients/'.$patient->image)}}" class="img-fluid" alt="Doctor Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$patient->name}}</h4>
                                <p class="doc-speciality">Email : {{$patient->email}}</p>
                                <p class="doc-speciality">Mobile : {{$patient->mobile}}</p>
                                <p class="doc-speciality">Blood Group : {{$patient->blood}}</p>
                                <p class="doc-speciality">Gender : {{$patient->gender==1?'Male':'Female'}}</p>
                                <p class="doc-speciality">Age : {{$patient->dob->diffInYears()}} Years</p>
                                <div class="clinic-details">
                                    <p class="doc-location">Location : <i class="fas fa-map-marker-alt"></i> {{$patient->location->name}} </p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <!-- Doctor Details Tab -->
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