@extends('layouts.admin')

@section('header', 'Transaction')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* For Input Field */
    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-selection--multiple {
        border-color: #6c757d;
        background-color: #343a40;
    }

    /* For Buttons */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        border-color: #343a40;
        background-color: #3f6791;
    }

</style>
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
                        <div class="col-6">
                            <a href="#" @click="addData()" class="btn btn-primary">Add new Transaction</a>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="filter">
                                <option value="">--Status Filter--</option>
                                <option value="M">Has Returned</option>
                                <option value="F">Not Returned</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="filter">
                                <option value="">--Date Filter--</option>
                                <option value="M">Active</option>
                                <option value="F">Expired</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <table id="dataTable" class="table table-striped table-bordered text-center w-100">
                        <thead>
                            <tr>
                                <th class="align-middle" style="width: 10px;">#</th>
                                <th class="align-middle">Translation Starts</th>
                                <th class="align-middle">Translation Ends</th>
                                <th class="align-middle">Member's Name</th>
                                <th class="align-middle">Days Left</th>
                                <th class="align-middle">Total of Books</th>
                                <th class="align-middle">Total of Purchases</th>
                                <th class="align-middle">Translation Status</th>
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
                    <h4 class="modal-title">Translation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form :action="actionUrl" method="post" @submit.prevent="submittedForm($event, data.id)">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="status" />

                        <div class="form-group">
                            <label for="name">Member's Name</label>
                            <select name="author_id" id="author" class="form-control form-control-sm">
                                @foreach ($members as $member)
                                <option :selected="data.member_id == {{ $member->id }}" value="{{ $member->id }}">
                                    {{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_start">Translation Starts</label>
                                    <input type="date" class="form-control" id="date_start" name="date_start" required
                                        :value="data.date_start">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_end">Translation Ends</label>
                                    <input type="date" class="form-control" id="date_end" name="date_end" required
                                        :value="data.date_end">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Books</label>
                            <select class="select2 select2-danger" multiple="multiple" data-placeholder="Select a Book"
                                style="width: 100%;">
                                @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" v-if="status">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="0">Not Returned yet</option>
                                <option value="1">Has Returned</option>
                            </select>
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
    const actionUrl = `{{ url('transactions'); }}`
    const apiUrl = `{{ url('api/transactions'); }}`

    let columns = [
        {data: 'DT_RowIndex', orderable: true},
        {data: 'date_start', orderable: false},
        {data: 'date_end', orderable: false},
        {data: 'name', orderable: false},
        {data: 'date_left', orderable: false},
        {data: 'total_books', orderable: false},
        {data: 'total_price', orderable: false},
        {data: 'status', orderable: false},
        {render: function(index, row, data, meta) {
            return `
            <a href="#" class="badge bg-info py-2 px-3 mb-2" onclick="controller.showData(event, ${data.id})">
                <i class="fas fa-eye"></i>
            </a>
            <a href="#" class="badge bg-warning py-2 px-3 mb-2" onclick="controller.editData(event, ${meta.row})">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#" class="badge bg-danger py-2 px-3 mb-2" onclick="controller.deleteData(event, ${data.id})">
                <i class="fas fa-trash-alt"></i>
            </a>`
        }, width: '150px', orderable: false}
    ]
</script>

<!-- CRUD VueJs -->
<script src="{{ asset('js/data.js') }}"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.select2').select2();
</script>
@endsection
