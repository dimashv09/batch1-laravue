@extends('layouts.admin')
@section('header', 'Member');

@section('css')
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@endsection
@section('content')
    <div id="controller">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-tools">
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-left">Create New
                                Member</a>
                        </div>

                        <div class="col-md-2">
                            <select class="form-control" name="sex">
                                <option value="0">All Gender</option>
                                <option value="L">Female</option>
                                <option value="P">Male</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">

                            <h4 class="modal-title">Member</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                            <div class="from-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" :value="data.name"
                                    required="">
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option :selected="data.gender" value="">--Choose Gender--</option>
                                    <option :selected="data.gender" value="L">Male</option>
                                    <option :selected="data.gender" value="P">Female</option>
                                </select>
                            </div>

                            <div class="from-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_Number" :value="data.phone_Number"
                                    required="">
                            </div>

                            <div class="from-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" :value="data.address"
                                    required="">
                            </div>

                            <div class="from-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" :value="data.email"
                                    required="">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script type="text/javascript">
        var actionUrl = '{{ url('members') }}';
        var apiUrl = '{{ url('api/members') }}';

        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'name',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'gender',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'email',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'phone_Number',
                class: 'text-center',
                orderable: false
            },
            {
                data: 'address',
                class: 'text-center',
                orderable: false
            },
            {
                render: function(index, row, data, meta) {
                    return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                  Delete
                </a>`;
                },
                orderable: false,
                width: '120px',
                class: 'txt-center'
            },
        ];
    </script>
    <!-- CRUD VueJs -->
    <script src="{{ asset('js/data.js') }}"></script>
    <!-- Gender Filter  -->
    <script type="text/javascript">
        $('select[name=sex]').on('change', function() {
            sex = $('select[name=sex]').val();
            if (sex == 0) {
                controller.table.ajax.url(apiUrl).load();
            } else {
                controller.table.ajax.url(apiUrl + '?sex=' + sex).load();
            }
        });
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection
