@extends('layouts.admin')
@section('header', 'Catalog')
@section('content')
@section('css')
        <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
<div id="controller">
            <div class="row">
            <div class="col-12">
            <div class="card">

            <div class="card-header">
                  <!-- ngga bisa detail -->
                <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Catalog</a>
               <!-- <a href="{{ url('/create') }}" class="btn btn-primary pull-right">Create New Catalog</a> -->
            <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
            <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
            </button>
            </div>
            </div>
            </div>
            </div>
            <div class="card-body">
             <table id="datatables" class="table table-striped table-bordered">
            <thead>
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Actions</th>
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
                <form :action="actionUrl" method="post" autocomplete="off">
                <div class="modal-header">
                  <h4 class="modal-title">Default Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" :value="data.name" class="form-control" placeholder="Input Name" required="">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" :value="data.email" class="form-control" placeholder="Input Email" required="">
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone_number" :value="data.phone_number" class="form-control" placeholder="Input Phone Number" required="">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" :value="data.address" class="form-control" placeholder="Input Address" required="">
                      </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
  </div>
</div>
</div>
@endsection
@section('js')

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    
    var actionUrl = '{{ url('authors') }}';
    var apiUrl = '{{ url('api/authors') }}';

    var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderable: true},
    {data: 'name', class: 'text-center', orderable: true},
    {data: 'email', class: 'text-center', orderable: true},
    {data: 'phone_number', class: 'text-center', orderable: true},
    {data: 'address', class: 'text-center', orderable: true},
    {render: function(index, row, data, meta) {
        return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData("event, ${meta.row})">
            Edit
            </a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
            Delete</a>
    `}, orderable: false, width: '200px', class='text-center'},
    ];

    console.log(apiUrl);

    var controller = new Vue({
        el: '#controller',
        data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus : false,
            

            },
            mounted: function () {
                this.datatable();
            },
            methods: {
                datatable() {

                    const _this = this;
                    _this.table = $('#datatables').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET',

                        },
                        columns: columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                   // console.log(apiUrl);
                },
             }      
    });
</script>
@endsection
