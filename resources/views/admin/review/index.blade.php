@extends('layouts.admin')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Reviews</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Ratings</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($reviews)&&$reviews->count()>0)
                                @foreach($reviews as $review)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{route('website.patientprofile',$review->patient->id)}}" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{asset('images/patients/'.$review->patient->image)}}" alt="User Image">
                                        </a>
                                        <a href="{{route('website.patientprofile',$review->patient->id)}}">{{$review->patient->name}} </a>
                                    </h2>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="{{route('website.patientprofile',$review->doctor->id)}}" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{asset('images/doctors/'.$review->doctor->image)}}" alt="User Image">
                                        </a>
                                        <a href="{{route('website.patientprofile',$review->doctor->id)}}">Dr. {{$review->doctor->name}}</a>
                                    </h2>
                                </td>

                                <td>
                                    <i class="fe fe-star text-{{$review->rate&&$review->rate>0?'warning':'secondary'}}"></i>
                                    <i class="fe fe-star text-{{$review->rate&&$review->rate>1?'warning':'secondary'}}"></i>
                                    <i class="fe fe-star text-{{$review->rate&&$review->rate>2?'warning':'secondary'}}"></i>
                                    <i class="fe fe-star text-{{$review->rate&&$review->rate>3?'warning':'secondary'}}"></i>
                                    <i class="fe fe-star text-{{$review->rate&&$review->rate>4?'warning':'secondary'}}"></i>
                                </td>

                                <td>
                                    {{$review->message}}
                                </td>
                                <td>{{$review->created_at->format('l d-M-Y')}} <br><small>{{$review->created_at->format('g:i A')}}</small></td>
                                <td class="text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm bg-danger-light delete" data-id="{{$review->id}}" data-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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


    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <!--	<div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>-->
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <form action="{{route('admin.review.delete')}}" method="post" id="delete-form">
                            @csrf
                            <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
    <script>
        window.onload=function () {
            $(document).ready(function() {
                $('#example').DataTable();
            } );

            $('.delete').on('click', function(e) {
                var id=$(this).data('id');

                $("#delete-form #id").val(id);
            });

            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }
        }
    </script>

@endsection