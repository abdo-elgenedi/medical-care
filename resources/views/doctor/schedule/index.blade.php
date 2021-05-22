@extends('layouts.doctor')
@section('title') Schedule @endsection
@section('header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Schedule Timings</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Schedule Timings</h4>
                        <div class="profile-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card schedule-widget mb-0">

                                        <!-- Schedule Header -->
                                        <div class="schedule-header">

                                            <!-- Schedule Nav -->
                                            <div class="schedule-nav">
                                                <ul class="nav nav-tabs nav-justified">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#slot_saturday">Saturday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slot_sunday">Sunday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slot_monday">Monday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slot_tuesday">Tuesday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slot_wednesday">Wednesday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slot_thursday">Thursday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- /Schedule Nav -->

                                        </div>
                                        <!-- /Schedule Header -->

                                        <!-- Schedule Content -->
                                        <div class="tab-content schedule-cont">

                                            <!-- Saturday Slot -->
                                            <div id="slot_saturday" class="tab-pane fade show active">
                                                @if(isset($schedule1)&&$schedule1->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule1->id}}" data-capacity="{{$schedule1->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                <div class="row">
                                                    <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule1->time}}</div></div></div>
                                                    <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule1->capacity}} Patients</div></div></div>
                                                    <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule1->id)}}" class="doc-slot-list">{{$schedule1->status==1?'Active':'Not active'}}</a></div></div>
                                                </div>
                                                    @else
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="add-link" data-day="1" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                </h4>
                                                <p class="text-muted mb-0">Not Available</p>
                                                    @endif
                                            </div>
                                            <!-- /Saturday Slot -->

                                            <!-- Sunday Slot -->
                                            <div id="slot_sunday" class="tab-pane fade">
                                                @if(isset($schedule2)&&$schedule2->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule2->id}}" data-capacity="{{$schedule2->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                    <div class="row">
                                                        <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule2->time}}</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule2->capacity}} Patients</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule2->id)}}" class="doc-slot-list">{{$schedule2->status==1?'Active':'Not active'}}</a></div></div>
                                                    </div>
                                                @else
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="add-link" data-day="2" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                    </h4>
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @endif
                                            </div>
                                            <!-- /Sunday Slot -->

                                            <!-- Monday Slot -->
                                            <div id="slot_monday" class="tab-pane fade">
                                                @if(isset($schedule3)&&$schedule3->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule3->id}}" data-capacity="{{$schedule3->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                    <div class="row">
                                                        <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule3->time}}</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule3->capacity}} Patients</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule3->id)}}" class="doc-slot-list">{{$schedule3->status==1?'Active':'Not active'}}</a></div></div>
                                                    </div>
                                                @else
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="add-link" data-day="3" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                    </h4>
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @endif

                                            </div>
                                            <!-- /Monday Slot -->

                                            <!-- Tuesday Slot -->
                                            <div id="slot_tuesday" class="tab-pane fade">
                                                @if(isset($schedule4)&&$schedule4->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule4->id}}" data-capacity="{{$schedule4->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                    <div class="row">
                                                        <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule4->time}}</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule4->capacity}} Patients</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule4->id)}}" class="doc-slot-list">{{$schedule4->status==1?'Active':'Not active'}}</a></div></div>
                                                    </div>
                                                @else
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="add-link" data-day="4" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                    </h4>
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @endif
                                            </div>
                                            <!-- /Tuesday Slot -->

                                            <!-- Wednesday Slot -->
                                            <div id="slot_wednesday" class="tab-pane fade">
                                                @if(isset($schedule5)&&$schedule5->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule5->id}}" data-capacity="{{$schedule5->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                    <div class="row">
                                                        <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule5->time}}</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule5->capacity}} Patients</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule5->id)}}" class="doc-slot-list">{{$schedule5->status==1?'Active':'Not active'}}</a></div></div>
                                                    </div>
                                                @else
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="add-link" data-day="5" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                    </h4>
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @endif
                                            </div>
                                            <!-- /Wednesday Slot -->

                                            <!-- Thursday Slot -->
                                            <div id="slot_thursday" class="tab-pane fade">
                                                @if(isset($schedule6)&&$schedule6->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule6->id}}" data-capacity="{{$schedule6->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                    <div class="row">
                                                        <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule6->time}}</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule6->capacity}} Patients</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule6->id)}}" class="doc-slot-list">{{$schedule6->status==1?'Active':'Not active'}}</a></div></div>
                                                    </div>
                                                @else
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="add-link" data-day="6" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                    </h4>
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @endif
                                            </div>
                                            <!-- /Thursday Slot -->

                                            <!-- Friday Slot -->
                                            <div id="slot_friday" class="tab-pane fade">
                                                @if(isset($schedule7)&&$schedule7->count()>0)
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="edit-link" data-id="{{$schedule7->id}}" data-capacity="{{$schedule7->capacity}}" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h4>
                                                    <!-- Slot List -->
                                                    <div class="row">
                                                        <div class="col-md-4"><h5 class="mt-3">Time</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule7->time}}</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Capacity</h5><div class="doc-times"><div class="doc-slot-list">{{$schedule7->capacity}} Patients</div></div></div>
                                                        <div class="col-md-4"><h5 class="mt-3">Status</h5><div class="doc-times"><a href="{{route('doctor.schedule.status',$schedule7->id)}}" class="doc-slot-list">{{$schedule7->status==1?'Active':'Not active'}}</a></div></div>
                                                    </div>
                                                @else
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span>
                                                        <a class="add-link" data-day="7" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Time</a>
                                                    </h4>
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @endif
                                            </div>
                                            <!-- /Friday Slot -->

                                        </div>
                                        <!-- /Schedule Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Add Time Slot Modal -->
    <div class="modal fade custom-modal" id="add_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('doctor.schedule.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="day" id="day">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label><br>
                                                <input class="form-control" type="time" name="times">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label><br>
                                                <input class="form-control" type="time" name="timee">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-more mb-3">
                            <label for="">Capacity</label>
                            <input class="form-control" type="number" name="capacity" step="1">
                        </div>
                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Time Slot Modal -->

    <!-- Edit Time Slot Modal -->
    <div class="modal fade custom-modal" id="edit_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Time Slots</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('doctor.schedule.edit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label><br>
                                                <input class="form-control" type="time" name="times">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label><br>
                                                <input class="form-control" type="time" name="timee">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-more mb-3">
                            <label for="">Capacity</label>
                            <input class="form-control" type="number" name="capacity" step="1" id="capacity">
                        </div>
                        <div class="submit-section text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Time Slot Modal -->
    <script>
        window.onload=function () {

            $('.add-link').on('click', function(e) {
                var day=$(this).data('day');

                $("#add_time_slot #day").val(day);
            });

            $('.edit-link').on('click', function(e) {
                var id=$(this).data('id');
                var capacity=$(this).data('capacity');

                $("#edit_time_slot #id").val(id);
                $("#edit_time_slot #capacity").val(capacity);
            });

            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }
        }
    </script>
    @endsection