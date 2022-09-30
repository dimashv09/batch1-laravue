@extends('layouts.admin')
@section('header', 'Member')

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
          
          <div class="card-tools">
            <a href="#" @click="addData()"  class="btn btn-sm btn-primary pull-left">Create New Member</a>
          </div>

          <div class="col-md-2">
            <select class="form-control" name="sex">
              <option value="0">All Gender</option>
              <option value="F">Female</option>
              <option value="M">Male</option>
            </select>
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

                   <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" :value="data.name" class="form-control" placeholder="Input Name" required="">
                    </div>

                    <div class="form-group">
                      <label>Gender</label>
                      <select name="gender" id="gender" class="form-control">
                        <option :selected="data.gender" value="">--Choose Gender--</option>
                        <option :selected="data.gender" value="Pria">Male</option>
                        <option :selected="data.gender" value="Wanita">Female</option>
                      </select>
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

                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>

              </div>
            </form>

          </div>
        </div>
      </div>

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
  var actionUrl = '{{ url('members') }}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderable: true},
    {data: 'name', class: 'text-center', orderable: true},
    {data: 'gender', class: 'text-center', orderable: true},
    {data: 'email', class: 'text-center', orderable: true},
    {data: 'phone_number', class: 'text-center', orderable: true},
    {data: 'address', class: 'text-center', orderable: true},
    {render: function(index, row, data, meta) {
        return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
            Edit
            </a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
            Delete
            </a>`;
          }, orderable: false, width: '200px', class:'text-center'},
    ];
</script>

<script src="{{ asset('js/data.js') }}"></script>
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
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>
@endsection