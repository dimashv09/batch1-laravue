@extends('layouts.admin')
@section('title', 'Publishers')
@section('wrapper-title', 'Publishers')

@section('css')
    <!-- DataTables -->
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
					<a href="#" @click="addData()" class="btn btn-sm btn-primary">Create New Publisher</a>
				</div>
					<!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped w-100">
						<thead>
						<tr>
							<th width= "30px">NO.</th>
								<th class="text-center">Name</th>
								<th class="text-center">Email</th>
								<th>Phone Number</th>
								<th class="text-center">Address</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade show" id="modalmadul">
		<div class="modal-dialog">
          <div class="modal-content">
			  <form method="post" :action="actionUrl"autocomplete="off" @submit="submitForm($event,data.id)">
            <div class="modal-header">
              <h4 class="modal-title">Publisher</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				@csrf

				<input type="hidden" name="_method" value="PUT" v-if="editStatus">

						<div class="form__group">
						<label>Name</label>
						 <input type="text" class="form-control" name="name" :value="data.name"required="">
						</div>
						<div class="form__group">
						 <label>Email</label>
						 <input type="text" class="form-control" name="email":value="data.email" required="">
						 <div class="form__group">
						</div>
						 <label>Phone Number</label>
						 <input type="text" class="form-control" name="phone_number":value="data.phone_number" required="">
						 <div class="form__group">
						</div>
						 <label>Address</label>
						 <input type="text" class="form-control" name="address":value="data.address" required="">
						 <div class="form__group">
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
var actionUrl = "{{ url('publishers') }}";
		var apiUrl = "{{ url('api/publishers') }}";

		var columns = [{
		        data: 'DT_RowIndex',
		        class: 'text-center',
		        orderable: false
		    },
		    {
		        data: 'name',
		        class: 'text-center',
		        orderable: false
		    },
		    {
		        data: 'email',
		        class: 'text-center',
		        orderable: true
		    },
		    {
		        data: 'phone_number',
		        class: 'text-center',
		        orderable: true
		    },
		    {
		        data: 'address',
		        class: 'text-center',
		        orderable: true
		    },
		    {
				render: function (index, row, data, meta) {
					return `
						<button onclick="publisherVue.editData(event, ${meta.row})"  class="btn btn-sm btn-warning text-white">Edit</button>
						<button onclick="publisherVue.deleteData(event, ${data.id})"  class="btn btn-sm btn-danger text-white">Delete</button>
					`;
				},
				orderable: false,
				width: '160px',
				class: 'text-center'
			}
		];
		var publisherVue = new Vue({
			el: "#controller",
			data: {
				dataList: [],
				data: {},
				actionUrl,
				apiUrl,
				editStatus: false
			},
			mounted() {
				this.datatable();
			},
			methods: {
				datatable() {
					const _this = this;
					_this.table = $('#datatable').DataTable({
						ajax: {
							url: _this.apiUrl,
							type: 'GET'
						},
						columns,
					}).on('xhr',function() {
						_this.dataList = _this.table.ajax.json().data;
					})
				},
				addData() {
					this.data = {};
					this.actionUrl='{{ url('publishers') }}';
					this.editStatus = false;
					$('#modalmadul').modal();
				},
				editData(event, row) {
					this.data = this.dataList[row]
					this.editStatus = true
					$('#modalmadul').modal();
				},
				deleteData(event, id) {
					if (confirm('Are you sure?')) {
						$(event.target).parents('tr').remove();
						axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
							location.reload();
					    });
                    }
				},
				submitForm(event, id) {
					event.preventDefault()
					const _this = this
					var url = ! this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
					axios.post(url, new FormData($(event.target)[0])).then(response => {
						$('#modalmadul').modal('hide')
						_this.table.ajax.reload();
					})
				}
			}
		})
</script>
@endsection
