@extends('layouts.admin')
@section('header', 'Author')

@section('css')
<!-- Datatables -->
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
          <h3 class="card-title">Data Author</h3>
          <div class="card-tools">
            <a href="#" @click="addData()"  class="btn btn-sm btn-primary pull-left">Create New Author</a>
</div>
  </div>
    </div>
      </div>
        </div>
        <div class="card-body p-0">
        <table id="example1" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Phone Number</th>
              <th class="text-center">Address</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>

          <tbody>

            @foreach($authors as $key => $author)

            <tr>
              <td class="text-center">{{ $key+1 }}</td>
              <td class="text-center">{{ $author->name }}</td>
              <td class="text-center">{{ $author->email }}</td>
              <td class="text-center">{{ $author->phone_number }}</td>
              <td class="text-center">{{ $author->address }}</td>
              <td class="text-center">
                <a href="#" @click="editData({{ $author }})" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" @click="deleteData({{ $author->id }})"class="btn btn-danger btn-sm">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off">
                <div class="modal-header">

                  <h4 class="modal-title">Author</h4>
                  
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
                      <input type="text" class="form-control" name="email" :value="data.email" placeholder="Input Email" required="">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" :value="data.phone_number"  placeholder="Input Phone Number" required="">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" :value="data.address" placeholder="Input Address" required="">
                    </div>
                    <div class="form-group">
                      
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
@endsection

@section('js')
<!-- Datatables & plugins -->
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
  $(function () {
    $("#example1").DataTable({
      // "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

<!-- CRUD Vue js -->

  <script type="text/javascript">
    var controller = new Vue({
      el: '#controller',
      data: {
        data : {},
        actionUrl : '{{ url('authors') }}',
        editStatus :false
      },
      mounted: function () {

      },
      methods: {
        addData() {
          this.data = {};
          this.actionUrl = '{{ url('authors') }}';

          $('#modal-default').modal();

        },
        editData(data) {
          this.data = data;
          this.editStatus = true;
          this.actionUrl = '{{ url('authors') }}'+'/'+data.id; 
          $('#modal-default').modal();

        },
        deleteData(id) {
          this.actionUrl = '{{ url('authors') }}'+'/'+id;
          if (confirm("Are you sure?")) {
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
              location.reload();
              });
          }

        }
      }
    });
  </script>

@endsection