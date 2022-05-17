@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')

@section('css')
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
        <a href="#" @click="addData()" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">Create New Publisher</a>
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
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
     @foreach($publishers as $key => $publisher)
    <tr>
    <td>{{$key+1}}</td>
    <td>{{ $publisher->name }}</td>
    <td>{{ $publisher->email }}</td>
    <td>{{ $publisher->phone_number }}</td>
    <td>{{ $publisher->address }}</td>
    <td>{{ date('H:i:s - d M Y', strtotime($publisher->created_at)) }}</td>
    <td>
        <a href="#" @click="editData({{$publisher}})" class="btn btn-warning btn-sm">Edit</a>
        <a href="#" @click="deleteData({{$publisher->id}})" class="btn btn-danger btn-sm">Delete</a>
        <!-- <form action="{{ url('publishers/delete/'.$publisher->id) }}" method="post">
            <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
            @method('delete')
            @csrf
        </form> -->
    </td>
    @endforeach
    </tr>
    </tbody>
    </table>
    </div>

    </div>

    </div>
    </div>

<!-- Modal Create -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form :action="actionUrl" method="post" autocomplete="off">  
            <div class="modal-header">
              <h4 class="modal-title">Create Publisher</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                 @csrf
                 <input type="hidden" name="_method" value="PUT" v-if="editStatus">
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
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
    $(function () {
    $("#datatables").DataTable({
      // "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })
    // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
<script>
    var controller = new Vue({
        el: '#controller',
        data: {
            data: {},
            actionUrl : '{{ url('publishers') }}',
            editStatus : false

        },
        mounted: function () {
        },
        methods: {
            addData() {

                this.actionUrl = '{{ url('publishers') }}';
                // console.log(' Add Data');
                this.data = {};
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
                if (confirm("Are you sure ?")) {
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                        location.reload();
                    });
                }
            }
        }
    });
</script>
@endsection