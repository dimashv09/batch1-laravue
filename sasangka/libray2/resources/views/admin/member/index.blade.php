@extends('layouts.admin')

@section('header', 'Member')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
    <!-- Data Table -->
    <div class="row">
        <div class="col-12">
            <!-- Displaying The Success Message of Modifying DataBase -->
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Displaying The Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <h4 class="py-3">Oops, There's something wrong!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            <a href="#" @click="addData()" class="btn btn-primary">Add new Member</a>
                        </div>
                        <div class="col-2">
                            <select class="form-control" name="sex">
                                <option value="0">--Filter--</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-body p-3">
                    <table id="dataTable" class="table table-striped table-bordered text-center w-100">
                        <thead>
                            <tr>
                                <th class="align-middle" style="width: 10px;">#</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Gender</th>
                                <th class="align-middle">Phone Number</th>
                                <th class="align-middle">Address</th>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">Join Date</th>
                                <th class="align-middle" style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form :action="actionUrl" method="post" @submit.prevent="submittedForm($event, data.id)">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="method" value="PUT" v-if="status">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter Member's name" name="name" required :value="data.name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option :selected="data.gender == 'M'" value="M">Male</option>
                                <option :selected="data.gender == 'F'" value="F">Female</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone" placeholder="Enter member's phone" name="phone_number" required
                                :value="data.phone_number">
                            @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                placeholder="Enter member's address" name="address" required :value="data.address">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Enter Member's email" name="email" required :value="data.email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
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

<!-- Page specific script -->
<script>
    $(function () {
        $("#dataTable").DataTable();
    });
</script>

<script>
      var actionUrl= `{{ ('members'); }}`
      var apiUrl  = `{{ url('api/members'); }}`

        var columns = [
        {data: 'DT_RowIndex', orderable: true},
        {data: 'name', orderable: false},
        {data: 'gender', orderable: false},
        {data: 'phone_number', orderable: false},
        {data: 'address', orderable: false},
        {data: 'email', orderable: false},
        {data: 'created_at', orderable: false},
        {render: function(index, row, data, meta) {
        /* html */
        return `
        <a href="#" class="badge bg-warning p-2 mb-2" onclick="controller.editData(event, ${meta.row})">
            Edit</a>
        <a href="#" class="badge bg-danger p-2 mb-2" onclick="controller.deleteData(event, ${data.id})">
            Delete</a>`
        }, width: '100px', orderable: false}
        ]
</script>
<script src="{{ asset("js/dataku.js") }}"></script>
<!-- Gender Filter  -->
<script type="text/javascript">
    $('select[name=sex]').on('change', function() {
        sex = $('select[name=sex]').val();

        if (sex == 0 ) {
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?sex='+sex).load();
        }
    });
</script>

@endsection
