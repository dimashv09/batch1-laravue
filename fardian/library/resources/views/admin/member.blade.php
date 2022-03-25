@extends('layouts.admin')
@section ('header', 'Member')

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
                <a href="#" @click="addData()" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Member</a>
              </div>
              <div class="col-md-2">
                <select class="form-control" name="gender">
                  <option value="3">All Type Sex</option>
                  <option value="F">Female</option>
                  <option value="M">Male</option>
                </select>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-stripted table-bordered">
                  <thead>
                    <tr>
                      <th style ="width: 10x">No.</th>
                      <th class ="text-center">Name</th>
                      <th class ="text-center">Gender</th>
                      <th class ="text-center">Phone Number</th>
                      <th class ="text-center">Address</th>
                      <th class ="text-center">Email</th>
                      <th class ="text-center">Created At</th>
                      <th class ="text-center">Action</th>
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
                          <input placeholder="Min 5 Character" type="text" class="form-control" name="name" :value="data.name" required="">
                        </div>
                        <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="gender" value="M">
                        <label for="radioPrimary1">Male</label>
                        </div><br>
                        <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="gender" value="F">
                        <label for="radioPrimary1">Female</label>
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
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" :value="data.email" required="">
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default">Save Changes</button>
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
      {data: 'date', class: 'text-center', orderable: false},
      {render: function (index, row, data, meta){
        return `
        <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
        Edit
        </a>
        <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
        Delete
        </a>`;
          }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<!-- CRUD JS -->
<script src="{{ asset('js/data.js') }}"></script>
<!-- Filter JS -->
<script type="text/javascript">
  $('select[name=gender]').on('change', function() {
    gender = $('select[name=gender]').val();

    if (gender == 0){
      _this.table.ajax.reload();
    }else{
     _this.table.ajax.url(actionUrl+'?gender='+gender).load();
    }
  });
</script>
@endsection