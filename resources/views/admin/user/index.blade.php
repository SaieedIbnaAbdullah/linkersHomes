@extends('layouts.app')

@section('site_title', 'User')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>User List</h1>
        </div>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-plus-circle"></i>Create User</a>
    </div>
@stop

@section('page_content')

    <div class="tile card" style="margin: 0; padding: 0">
        <div class="card-header">
            User List
            @if(auth()->user()->type == 0)
                <button data-toggle="modal" data-target="#filterModal" class="btn btn-primary icon-btn text-white pull-right"><i class="fa fa-search"></i>Filter</button>
                <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        {!! Form::open(['url' => url('admin/user'),'method' => 'get']) !!}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter User List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="display: block;" for="geo_division_id">Division</label>
                                            <select id="geo_division_id" name="geo_division_id" class="form-control">
                                                <option value="">Select Division</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="display: block;" for="geo_district_id">District</label>
                                            <select id="geo_district_id" name="geo_district_id" class="form-control">
                                                <option value="">Select District</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="display: block;" for="geo_upazila_id">Upazila</label>
                                            <select id="geo_upazila_id" name="geo_upazila_id" class="form-control">
                                                <option value="">Select Upazila</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="display: block;" for="geo_union_id">Union</label>
                                            <select id="geo_union_id" name="geo_union_id" class="form-control">
                                                <option value="">Select Union</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="display: block;" for="user_type">User Type</label>
                                            <select id="user_type" name="user_type" class="form-control">
                                                <option value="">Select Any</option>
                                                <option value="2">Accountant</option>
                                                <option value="3">Field Admin</option>
                                                <option value="4">Data Entry</option>
                                                <option value="5">Selector</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary icon-btn text-white">
                                    <i class="fa fa-search"></i> Filter Data
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif
        </div>
        <div class="tile-body" style="padding: 40px; z-index: 1">

            {!! $dataTable->table(['class' => 'table table-hover table-bordered', 'style' => 'width: 100%;']) !!}

        </div>
    </div>

@stop

@section('script')

    <!-- datatable scripts -->
    <script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}

    <!-- axion -->
    <script src="{{ asset('admin/plugins/axios/0.18.0/axios.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/registration.js') }}"></script>

    <!-- Base url for ajax endpoint -->
    <script type="text/javascript">
        var ajax_url = `{{ env("APP_URL") }}/ajax/`;
    </script>

    <!-- delete users -->
    <script>

        $('#dataTableBuilder tbody').on('click', '.delete', function (e) {

            // axios service
            let service = axios.create({
                baseURL: ajax_url,
                responseType: "json"
            });

            // user id
            let id = parseInt(this.dataset.did);

            // confirmation alert
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {

                // checking if confirmed
                if (isConfirm) {

                    // deleting user
                    deleteUser(id);

                }

            });

            // delete user
            function deleteUser(id) {
                service.delete(`user/${id}`)
                    .then(function (response) {

                        // response
                        let res = response.data;

                        // reloading datatable
                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();

                        // success notification
                        toastr.success(res.message);

                    })
                    .catch(function (error) {

                        // error message
                        let message = error.response.data.message;

                        // error notification
                        toastr.error(message);

                    });
            }

        });

    </script>
@stop
