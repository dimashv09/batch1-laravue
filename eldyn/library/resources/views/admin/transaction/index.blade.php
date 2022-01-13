@extends('layouts.admin')
@section('title', 'Transactions')
@section('wrapper-title', 'Transactions')

@section('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    {{-- @role('employee') --}}
	<div class="container" id="transactionsVue">
		<div class="row">
			<div class="card w-100 overflow-auto">
				<div class="card-header">
					<a href="{{ url('transactions/create') }}" class="btn btn-sm btn-primary">Create new transaction</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="dataTable" class="table table-bordered table-striped w-100">
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Date Start</th>
								<th>Date End</th>
								<th>Member Name</th>
								<th>Rental Term (days)</th>
								<th>Total Books</th>
								<th>Total Cost</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
		</div>

		<!-- Modal create -->
		<div class="modal fade" id="modal-crud">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">@{{ editStatus == false ? 'Create ' : 'Edit ' }} Author</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form :action="actionUrl" autocomplete="off" method="POST" @submit="submitForm($event, data.id)">
						@csrf
						<input v-if="editStatus" type="hidden" name="_method" value="PATCH">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label for="name">author's Name</label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Lorem Ipsum" :value="data.name">
									@error('name')
										<div class="text-danger mt-1">*{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="phone_number">Phone Number</label>
									<input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="012-345-678" :value="data.phone_number">
									@error('phone_number')
										<div class="text-danger mt-1">*{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@exampl.com"  :value="data.email">
									@error('email')
										<div class="text-danger mt-1">*{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="phone_number">Address</label>
									<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="5, Buana Street, Antares" :value="data.address">
									@error('address')
										<div class="text-danger mt-1">*{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">@{{ editStatus == false ? 'Create' : 'Edit' }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
    {{-- @endrole --}}
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
		var actionUrl = "{{ url('transactions') }}";
		var apiUrl = "{{ url('api/transactions') }}";

		var columns = [
			{ data: "DT_RowIndex", name: "DT_RowIndex" },
            { data: "start", name: "start" },
            { data: "end", name: "end" },
            { data: "member", name: "member" },
            { data: "period", name: "period" },
            { data: "quantity", name: "quantity" },
            { data: "total_payment", name: "total_payment" },
            { data: "status", name: "status" },
            { data: "action", name: "action", orderable: false, searchable: false },
		];

		var transactionsVue = new Vue({
			el: "#transactionsVue",
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
					_this.table = $('#dataTable').DataTable({
						ajax: this.apiUrl,
						columns,
					})
				},
				addData() {
					this.data = []
					this.editStatus = false
					$('#modal-crud').modal();
				},
				editData(event, row) {
					this.data = this.dataList[row]
					this.editStatus = true
					$('#modal-crud').modal();
				},
				deleteData(event, id) {
                    Swal.fire({
						title: 'Delete!',
						text: 'Are you sure want to delete this data?',
						icon: 'question',
						showCancelButton: true,
						cancelButtonColor: '#3085d6',
						confirmButtonColor: '#d33',
						cancelButtonText: 'Cancel',
						confirmButtonText: 'Delete',
						reverseButtons: true
					}).then((result) => {
						if (result.isConfirmed) {
							axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
								$(event.target).parents('tr').remove();
								Swal.fire('Deleted!', '', 'success')
							})
						}
					});
				},
				submitForm(event, id) {
					const _this = this
					event.preventDefault();
					var url = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
					axios.post(url, new FormData($(event.target)[0])).then(response => {
						$('#modal-crud').modal('hide')
						_this.table.ajax.reload();
					})
				}
			}
		})
	</script>
@endsection
