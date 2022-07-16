@extends('layouts.admin')
@section('header', 'Data User')
@section('content')
@section('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
 @endsection

<div id="controller">
	  <div class="card">
	  <div class="card-header">
	    <a href="#" @click="addData()" class="btn btn-primary btn-sm pull-right">+ Create New User</a>
	  </div>
	  <!-- /.card-header -->
	  <div class="card-body">
	    <table id="datatables" class="table table-bordered table-striped">
	      <thead>
	      <tr>
	        <th>No</th>
	        <th>Name</th>
	        <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
	        <th>Jabatan</th>
	        <th>Action</th>
	      </tr>
	      </thead>
	    </table>
	  </div>
	</div>


        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
                <div class="modal-header">
                  <h4 class="modal-title">Default Modal</h4>
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
                    <label>Phone</label>
                    <input type="number" name="phone" :value="data.phone" class="form-control" placeholder="Input Phone" required="">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" :value="data.address" class="form-control" placeholder="Input Address" required="">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password"  :value="data.password" class="form-control" placeholder="Input Password" required="">
                  </div>
                  <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" :value="data.password" class="form-control" placeholder="Input Password" required="">
                    
                  </div>
                   <div class="form-group">
                    <label>Jabatan</label>
                    <select name="role" :value="data.role" class="form-control">
                      <option value="">--Pilih Jabatan--</option>
                       <option value="manager">Manager</option>
                       <option value="admin">Admin</option> 
                       <option value="kasir">Kasir</option>  
                    </select>
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
@endsection
@section('js')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Page specific script -->

<script>
	var actionUrl = '{{ url('users') }}';
	var apiUrl = '{{ url('api/users') }}';

	var columns = [
		{data: 'DT_RowIndex', class: 'text-center', orderable: true },
		{data: 'name', class: 'text-center', orderable: true },
		{data: 'email', class: 'text-center', orderable: true },
    {data: 'phone', class: 'text-center', orderable: true },
    {data: 'address', class: 'text-center', orderable: true },
		{data: 'role', class: 'text-center', orderable: true },
		{render: function(index, row, data, meta ){
			return `
				<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
				Edit
                </a>
				<a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                Delete</a>
			`

		}, orderable: false, width: '200px', class: 'text-center'},
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
					_this.table = $('#datatables').DataTable({
						ajax: {
							url: _this.apiUrl,
							type: 'GET',
						},
						columns: columns
					}).on('xhr', function() {
						_this.datas = _this.table.ajax.json().data;
					});
				},
               addData() {
                this.data = {};
                this.actionUrl = '{{ url('users') }}';
                $('#modal-default').modal();
                editStatus: false;
               },
               editData(event, row){
               	this.data = this.datas[row];
               	this.editStatus = true;
               	$('#modal-default').modal();
               },
               deleteData(event, id) {
                    if (confirm("Are you sure ?")) {
                        $(event.target).parents('tr').remove();
                            axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                            // location.reload();
                            alert('Data has been removed');
                    });
                }
             },
               submitForm(event, id){
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
               },
			}
		});
 
</script>
@endsection


