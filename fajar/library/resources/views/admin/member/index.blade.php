@extends('layouts.admin')

@section('header', 'Member')

@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div id="controller">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Create New Member</a>
                </div>

                <div class="col-md-2">
                    <select class="form-control" name="gender">
                        <option value="0">All</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="card-body table-responsive">
            <div class="">
                <table id="datatable" class="table table-bordered table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">Member</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                :value="data.name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="Enter Name"
                                :value="data.gender">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number"
                                required :value="data.phone_number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required
                                :value="data.email">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea3" rows="7"
                                :value="data.address"></textarea>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    // $(function() {
    //     $('#datatable').DataTable();
    // });
</script>
<script type="text/javascript">
    var actionUrl = '{{ url('member') }}';
    var apiUrl = '{{ url('api/member') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'gender', class: 'text-center', orderable: true},
        {data: 'phone_number', class: 'text-center', orderable: true},
        {data: 'address', class: 'text-center', orderable: true},
        {data: 'email', class: 'text-center', orderable: true},
        {data: 'date', class: 'text-center', orderable: true},
        {render: function(index, row, data, meta){
            return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,${meta.row})">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event,${data.id})">
                    <i class="fa fa-trash"></i>
                </a>`;
        },orderable: false, width:"100px", class:"text-center"},
    ];
    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [], 
            data: {},   
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
                    columns: columns
                }).on('xhr', function(){
                    _this.datas = _this.table.ajax.json().data;
                });
            },
            addData() {
                this.data = {};
                this.editStatus= false;
                $('#modal-default').modal();
            },
            editData(event, row) {
                this.data = this.datas[row];
                this.editStatus= true;
                $('#modal-default').modal();
            },
            deleteData(event, id) {
                
                if (confirm("Are You Sure ??")){
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl+'/'+id, {_method: 'Delete'}).then(response =>{
                        alert('Data Has been removed');
                    })
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
            }
        }
    });
</script>
<script type="text/javascript">
    $('select[name=gender]').on('change', function(){
        gender = $('select[name=gender]').val();
        if (gender == 0) {
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?gender='+gender).load();
        }
    });
</script>
@endsection