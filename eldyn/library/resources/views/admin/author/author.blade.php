@extends('layouts.admin')
@section('title', 'authors')
@section('wrapper-title', 'authors')

@section('css')
	
@endsection

@section('content')
	<div class="container" id="authorVue">
		<div class="row">
			<div class="card w-100 overflow-auto">
				<div class="card-header">
					<a href="#" @click="addData()" class="btn btn-sm btn-primary">Create new author</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
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
							@foreach ($authors as $key => $author)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $author->name }}</td>
								<td>{{ $author->email }}</td>
								<td>{{ $author->phone_number }}</td>
								<td>{{ $author->address }}</td>
								<td style="text-align: center">{{ count($author->books) }}</td>
								<td>{{ date('H:i:s - d F Y', strtotime( $author->created_at ))}}</td>
								<td class="d-flex" style="gap: .5rem">
									<a href="#" @click="editData({{ $author }})"  class="btn btn-sm btn-warning text-white">Edit</a>
									<a href="#" @click="deleteData({{ $author->id }})"  class="btn btn-sm btn-danger text-white">Delete</a>
									{{-- <form action="{{ url('authors/'.$author->id) }}" method="POST">
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
				<div class="card-footer clearfix">
					<ul class="pagination pagination-sm m-0 float-right">
						<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Modal create -->
		<div class="modal fade" id="modal-crud">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">CRUD</h4>
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
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
@endsection

@section('js')
	<script>
		var app = new Vue({
			el: "#authorVue",
			data: {
				data: {},
				actionUrl: '',
				editStatus: false
			},
			methods: {
				addData() {
					this.data = []
					this.editStatus = false
					this.actionUrl = '{{ url('authors') }}'
					$('#modal-crud').modal();
				},
				editData(data) {
					this.data = data
					this.editStatus = true
					this.actionUrl = '{{ url('authors') }}' + '/' + data.id
					$('#modal-crud').modal();
				},
				deleteData(id) {
					this.actionUrl = '{{ url('authors') }}' + '/' + id
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