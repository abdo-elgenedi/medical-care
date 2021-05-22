@extends('layouts.admin')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">Specialities</h3>
            </div>
            <div class="col-sm-5 col">
                <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
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
                                <th>#</th>
                                <th>Specialities</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($specs as $index=>$spec)
                            <tr>
                                <td>#{{++$index}}</td>
                                <td><h2 class="table-avatar ">
                                            <img class="avatar avatar-sm mr-2 avatar-img" src="{{asset('images/specialities/'.$spec->image)}}" alt="speciality">
                                        <a>{{$spec->name}}</a>
                                    </h2>
                                </td>

                                <td class="text-right">
                                    <a class="edit btn btn-sm bg-success-light" href="#edit" data-toggle="modal" data-id="{{$spec->id}}" data-name="{{$spec->name}}"><i class="fe fe-pencil"></i> Edit</a>
                                    <a class="delete btn btn-sm bg-danger-light" data-toggle="modal" href="#delete" data-id="{{$spec->id}}"><i class="fe fe-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Specialities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.speciality.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Specialities</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->

    <!-- Edit Details Modal -->
    <div class="modal fade" id="edit" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Specialities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.speciality.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="name">Specialities</label>
                                    <input id="name" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form-content p-2 text-center" action="{{route('admin.speciality.delete')}}" method="post" enctype="multipart/form-data">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-primary">Delete </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->

    <!-- Delete Modal -->
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
    <!-- /Delete Modal -->
    <script>
        window.onload=function () {
            $(document).ready(function() {
                $('#example').DataTable();
            } );

            $('.edit').on('click', function(e) {
              var name=$(this).data('name');
              var id=$(this).data('id');

               $("#edit #name").val(name);
               $("#edit #id").val(id);
            });
            $('.delete').on('click', function(e) {
              var id=$(this).data('id');
               $("#delete #id").val(id);
            });

            if('{{Session::has('message')?'true':'false'}}'){
                $('#redirect').modal('show');
            }
        }
    </script>

@endsection