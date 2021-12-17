@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    
@endsection
@section('content')
    <div id="controller">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New
                                Member</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th>Nomor</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Total Transaction</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
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
                            {{-- name --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput"
                                    placeholder=" Input your name" :value="data.name">
                                    @error('name')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            {{-- email --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" id="floatingInput"
                                    placeholder="Input Gender Hanya P/L" v-bind:value="data.gender">
                                    @error('gender')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            {{-- phone number --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="floatingInput"
                                    placeholder="Input phone number" :value="data.phone_number">
                                    @error('phone_number')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            {{-- address --}}
                            <div class="form-floating mb-3">
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="floatingInput"
                                    placeholder="Input address" :value="data.address">
                                    @error('address')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                    placeholder="Input email example@email.com" :value="data.email">
                                    @error('email')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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

    <script>
        $(function() {
            $("#datatable").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    "bDestroy": true
                })
                .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>

    <script type="text/javascript">
        var actionUrl = '{{ url('members') }}';
        var apiUrl = '{{ url('api/members') }}';

        var columns = [
        {
            data: 'DT_RowIndex',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'name',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'gender',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'phone_number',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'address',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'email',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'transactions.length',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'created_at',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return `
                <a href = '#' class = "btn btn-warning btn-sm" onclick = "controller.editData(event, ${meta.row})"> Edit </a> 
                <a class = "btn btn-danger btn-sm" onclick = "controller.deleteData(event, ${data.id})"> Delete </a>`;
            },
            orderable: false,
            width: '200px',
            class: 'text-center'
        },
    
];
 </script>

 <script src="{{ asset('js/data.js') }}"></script>
@endsection
