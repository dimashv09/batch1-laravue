@extends('layouts.admin')
@section('header', 'Transaction' )

@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="status">
                        <select value="0">Belum Ada</select>
                        <select value="1">Sudah Ada</select>
                    </select>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 30px">No.</th>
                                <th class="text-center">Date Start</th>
                                <th class="text-center">Date End</th>
                                <th class="text-center">Name Member</th>
                                <th class="text-center">Date Long</th>
                                <th class="text-center">Total Qty</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                    <div class=" modal-header">

                        <h4 class="modal-title">Transaction</h4>
                        <button type="button" class="close" data-dissmiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" :value="data.name" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" :value="data.email" required="">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" :value="data.address" required="">
                        </div>
                        <div class="form-group">
                            <label>Created at</label>
                            <input type="text" class="form-control" name="created_at" :value="data.created_at" required="">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dissmiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
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
    $('select[name=status]').on('change', function() {
        status = $('select[name=status]').val();

        if (status == 0) {
            controller.table.ajax.url(actionUrl.load());
        } else {
            controller.table.ajax.url(actionUrl + '?status=' + sex).load();
        }
    });

    var actionUrl = "{{ url('transactions') }}";
    var apiUrl = "{{ url('api/transactions') }}";


    var columns = [{
            data: 'DT_RowIndex',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'date_start',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'date_end',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'member.name',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'duration',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'total',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'purchase',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'status',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return ` 
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})"> 
                Edit 
                </a> 
                <a class = "btn btn-primary btn-sm" onclick = "controller.deleteData(event, ${data.id})" >
                Delete 
                </a>`;
            },
            orderable: false,
            width: '200px',
            class: 'text-center'
        },

    ];


    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [],
            data: {},
            search: '',
            actionUrl,
            apiUrl,
            editStatus: false,
        },
        mounted: function() {
            this.datatable();
        },
        methods: {
            datatable() {
                const _this = this;
                _this.table = $('#datatable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET',
                    },
                    columns
                }).on('xhr', function() {
                    _this.datas = _this.table.ajax.json().data;
                });
            },
            addData() {
                this.data = {};
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(event, row) {
                this.data = this.datas[row];
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(event, id) {
                if (confirm("Are you sure ?")) {
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl + '/' + id, {
                        _method: 'DELETE'
                    }).then(response => {
                        alert('Data has been removed');
                    });
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
            },
        },


    });
</script>

@endsection