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
	<div class="container" id="publisherVue">
		<div class="row">
			<div class="card w-100 overflow-auto">
				<div class="card-header">
					<a href="#" @click="addData()" class="btn btn-sm btn-primary">Create new publisher</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="dataTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Total Books</th>
								<th>created at</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($publishers as $key => $publisher)
							<tr>
								<td class="text-center">{{ $key + 1 }}</td>
								<td>{{ $publisher->name }}</td>
								<td>{{ $publisher->email }}</td>
								<td>{{ $publisher->phone_number }}</td>
								<td>{{ $publisher->address }}</td>
								<td style="text-align: center">{{ count($publisher->books) }}</td>
								<td>{{ date('H:i:s - d F Y', strtotime( $publisher->created_at ))}}</td>
								<td class="d-flex" style="gap: .5rem">
									<a href="#" @click="editData({{ $publisher }})"  class="btn btn-sm btn-warning text-white">Edit</a>
									<a href="#" @click="deleteData({{ $publisher->id }})"  class="btn btn-sm btn-danger text-white">Delete</a>
									{{-- <form action="{{ url('publishers/'.$publisher->id) }}" method="POST">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
									</form> --}}
								</td>
							</tr>	
							@endforeach
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
						<h4 class="modal-title">@{{ editStatus == false ? 'Create ' : 'Edit ' }} Publisher</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form :action="actionUrl" autocomplete="off" method="POST">
						@csrf
						<input v-if="editStatus" type="hidden" name="_method" value="PATCH">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label for="name">publisher's Name</label>
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
		$(function() {
			$("#dataTable").DataTable();
		})
	</script>
	<script>
		var app = new Vue({
			el: "#publisherVue",
			data: {
				data: {},
				actionUrl: '',
				editStatus: false
			},
			methods: {
				addData() {
					this.data = []
					this.editStatus = false
					this.actionUrl = '{{ url('publishers') }}'
					$('#modal-crud').modal();
				},
				editData(data) {
					this.data = data
					this.editStatus = true
					this.actionUrl = '{{ url('publishers') }}' + '/' + data.id
					$('#modal-crud').modal();
				},
				deleteData(id) {
					this.actionUrl = '{{ url('publishers') }}' + '/' + id
					if (confirm('Are you sure?')) {
						axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
							location.reload();
						})
					}
				}
			}
		})
	</script>
@endsection