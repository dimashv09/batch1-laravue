@extends('layouts.admin');
@section('header','Publisher')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-primary">Create New Publisher</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table id="datatable" class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Created_at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $key => $publisher)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center">{{ $publisher->name }}</td>
                                <td class="text-center">{{ $publisher->email }}</td>
                                <td class="text-center">{{ $publisher->phone_number }}</td>
                                <td class="text-center">{{ $publisher->address }}</td>
                                <td class="text-center">{{ count($publisher->books) }}</td>
                                <td class="text-center">{{ date('d M Y', strtotime($publisher->created_at)) }}</td>
                                <td class="text-center d-flex align-items-center justify-content-center">
                                    <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-md mr-2">Edit</a>
                                    <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger btn-md mr-2">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form :action="actionUrl" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" :value="data.name" name="name" placeholder="Enter name" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" :value="data.email" name="email" placeholder="Enter email" required="">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" :value="data.phone_number" name="phone_number" placeholder="Enter phone number" required="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" :value="data.address" row="4" cols="5" placeholder="Enter address" required=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
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
  $(document).ready(function () {
    $("#datatable").DataTable();
  });
</script>
<script type="text/javascript">
    var controller = new Vue({
        el: '#controller'
        data:  { 
                data: {},
                actionUrl: '{{ url(' publishers ') }}',
                editStatus: false
            },
        methods: {
            addData() {
                this.data = {};
                this.actionUrl = '{{ url('publishers ') }}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(data) {
                this.data = data;
                this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();

            },
            deleteData(id) {
                this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                if(confirm('Are you sure ?')){
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                        location.reload();
                    });
                }
            }
        },
    });
   
</script>
@endsection
